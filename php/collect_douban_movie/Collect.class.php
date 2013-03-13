<?php 
/**
 * Collect.class.php
 * @author silenceper
 * @version 1.0
 * 
 *  操作数据库使用PDO扩展
 *  $date 2013-03-07 22:40
 *  
 *  example:
 *  include 'Collect.class.php';
	$apikey='0e0a7a0d9be9193b2a1f6e28d3bb4bb1';
	$collect=new Collect($id,$apikey);
	$collect->connect('localhost','3306','yii_movie_sae','root','123');
	$collect->start();
	start collect
 *  
 *  
 *  
 *  
 */
class Collect{
	//电影id
	private $id;
	//豆瓣 api 
	private $api='http://api.douban.com/v2/movie/subject/';
	//豆瓣  简单的api
	private $api_simple='http://api.douban.com/v2/movie/';
	
	//连接信息
	private $link = null;
	//PDOStatement 预处理信息
	private $PDOStatement = null;
	//最近一条sql
	public $sql='';
	//结果条数
	public $numRows;
	//最后插入的id
	public $lastInsID;
	
	//fetch_data
	public $data=null;
	//fetch_data_simple
	public $data_simple=null;
	
	//$picture_150
	public $picture_150;
	
	//构造方法  
	public function __construct($id,$apikey=null){
		$this->id=intval($id);
		$this->api=$this->api.$id;
		$this->api_simple=$this->api_simple.$id;
		//加上apikey
		if($apikey){
			$this->api.='?apikey='.$apikey;
			$this->api_simple.='?apikey='.$apikey;
		}
	}

	/**
	 * 数据库连接  PDO
	 *
	 */
	public function connect($host,$port,$dbname,$user,$pass){
		$dsn="mysql:host=$host;port=$port;dbname=$dbname;";
		try{
			$this->link=new PDO($dsn,$user,$pass);
		}catch(PDOException $e){
			exit($e->getMessage());
		}
	}
	
	/**
	 * 开始执行
	 */
	public function start(){
		//查看此电影的id是否已经存在数据库表 movie_movie 当中
		if($this->check_movie($this->id)){
			$this->trace('此豆瓣id已经存在数据库中',3);
		}
		
		//fetch url  获取两个url信息 不能够混淆
		$this->fetch_url($this->api,$this->api_simple);
		//开启事物
		$this->link->beginTransaction();
		try{
			if(!$this->data || !$this->data_simple){
				throw new Exception('无法获取豆瓣api数据');
				exit('无法获取豆瓣api数据');
			}
			//插入movie_movie表中
			if(!$this->insert_movie()){
				throw new Exception('插入movie_movie表失败！');
			}else{
				$this->trace('插入movie_movie成功!');
			}	
			//插入movie_movie表的id primary key
			$movie_id=$this->lastInsID;
			//插入 movie_tag 和 movie_movie_tag 表中
			if(!$this->insert_tag($movie_id)){
				throw new Exception('插入movie_tag表和movie_movie_tag表失败！');
			}else{
				$this->trace('插入movie_tag和movie_movie_tag成功!');
			}
			
			//插入movie_people 和 movie_movie_people  演员  导演
			if(!$this->insert_people($movie_id)){
				throw new Exception('插入movie_people表和movie_movie_people表失败！');
			}else{
				$this->trace('插入movie_people和movie_movie_people成功!');
			}
			
			//上述数据库操作成功之后再  存储图片
			$arr=pathinfo($this->picture_150);
			$path=substr($arr['dirname'], -11).'/';
			$img_name=$arr['basename'];
			if(!$this->save_image($this->data->images->large,'150','',$path,$img_name)){
				throw new Exception('保存图片失败!');
			}else{
				$this->trace('保存图片成功!');
			}
			//commit
			$this->link->commit();
			$this->trace('此次操作成功!');
		}catch (Exception $e){
			//rollback
			$this->link->rollback();
			//保存失败的电影id
			$this->save_error($this->id);
			echo $e->getMessage();
		}
		
	}
	/**
	 * 保存错误的为采集完成的豆瓣id
	 */
	private function save_error($id){
		$date=date('Y-m-d H:i:s');
		$sql="insert into insert_error(`movie_id`,`date`) values('{$id}','{$date}')";
		if(!$this->execute($sql)){
			$this->trace('保存为采集的豆瓣id在insert_error表中失败',3);
		}
	}
	/**
	 * 
	 * 
	 */
	public function insert_people($movie_id){
	/*============演员==========*/
		$casts=$this->data->casts;
		foreach($casts as $cast){
			$cast_douban_id=$cast->id;
			$cast_name=$cast->name;
			//有的people 是没有id的所以讲id设置null Strng
			if(!$cast_douban_id){
				$cast_douban_id='null';
			}	
			//在movie_people 中查找是否已经存在这个people
			$people_id=$this->check_people($cast_name);
			if(!$people_id){
				$cast_name=addslashes($cast_name);
				//没有找到
				$sql="insert into `movie_people`(`name`,`douban_id`) values('{$cast_name}','{$cast_douban_id}')";
				if(!$this->execute($sql)){
					return false;
				}
				$people_id=$this->lastInsID;
			}	
			
			//插入movie_movie_people中
			$sql="insert into `movie_movie_people`(`movie_id`,`people_id`,`role`) values('{$movie_id}','{$people_id}','1')";
			if(!$this->execute($sql)){
				return false;
			}
		}
			
	/*===============导演============*/
		$directors=$this->data->directors;
		foreach ($directors as $director){
			$director_douban_id=$director->id;
			$director_name=$director->name;
			//有的people 是没有id的所以讲id设置null Strng
			if(!$director_douban_id){
				$director_douban_id='null';
			}	
			//在movie_people 中查找是否已经存在这个people
			$people_id=$this->check_people($director_name);
			if(!$people_id){
				$director_name=addslashes($director_name);
				//没有找到
				$sql="insert into `movie_people`(`name`,`douban_id`) values('{$director_name}','{$director_douban_id}')";
				if(!$this->execute($sql)){
					return false;
				}
				$people_id=$this->lastInsID;
			}	
			
			//插入movie_movie_people中
			$sql="insert into `movie_movie_people`(`movie_id`,`people_id`,`role`) values('{$movie_id}','{$people_id}','2')";
			if(!$this->execute($sql)){
				return false;
			}
		}
			
		
		return true;
		
	}
	/**
	 * 检查people 能否在 movie_people找到 如果能够找到返回 id  否则返回false
	 */
	private function check_people($name){
		$sql="select id from movie_people where name='{$name}'";
		$result=$this->query($sql);
		if($result){
			return $result[0]['id'];
		}else{
			return false;
		}
	}
	
	
	
	/**
	 * insert_movie function
	 * 
	 * sql:
	 * insert into `movie_movie`(`title`,`original_title`,`aka`,`country`,`language`,`year`,`length`,`description`,`average`,`douban_id`,`picture`,`subtype`,`large_picture`) 
							values(:title,:original_title,:aka,:country,:language,:year,:length,:description,:average,:douban_id,:picture,:subtype,:large_picture)
	 *	
	 */
	private function insert_movie(){
		//title
		$title=addslashes($this->data->title);
		//电影的名字都没有  肯定是获取错误了
		if(!$title){
			return false;
		}
		//original_title
		$original_title=addslashes($this->data->original_title);
		if(is_null($original_title)){
			$original_title=$title;
		}
		
		//“又名”  aka  是数组形式 转为 字符串  和 /
		$aka=@implode('/',$this->data->aka);
		$aka=addslashes($aka);
		if(is_null($aka)){
			$aka='null';
		}
		
		//countries 数组形式 只是获取第0个
		$countries=$this->data->countries;
		$country=addslashes($countries[0]);
		if(is_null($country)){
			$country='null';
		}
		
		//language
		$language=$this->data_simple->attrs->language;
		$language=@implode('/',$language);
		if(!$language){
			$language='null';
		}
		
		//length
		$length=@$this->data_simple->attrs->movie_duration;
		$length =@implode('/',$length);
		if(!$length){
			$length='null';
		}
		
		//year 
		$year=addslashes($this->data->year);
		if(!$year){
			$year='null';
		}
		
		//description  电影描述
		$description=rtrim($this->data->summary,'©豆瓣');
		//将\n 转为<br/>  注意此次是 双引号  不能够改  单引号
		$description=addslashes(str_replace("\n", '<br/>', $description));
		
		if(!$description){
			$description='null';
		}
		
		//average 评分
		$average=$this->data->rating->average;
		if(is_null($average)){
			$average='null';
		}
		
		//subtype   movie  tv
		$subtype=addslashes($this->data->subtype);
		if(!$subtype){
			$subtype='null';
		}
		
		//date
		$date=time();
		
		$image=$this->data->images->large;
		//大图： 暂时使用豆瓣链接
		$large_picture=$image;
		
		//需要保存的 图片名称  待所有数据库操作成功之后再进行  保存图片
		$width='150';
		$height='';
		$path='/'.date('Y').'/'.date('m').'/'.date('d').'/';
		$uniqid=uniqid(mt_rand(1,10000));
		$img_name=$uniqid."_$width.jpg";
		$this->picture_150='http://moviepic-img1.stor.sinaapp.com'.$path.$img_name;
		//形成sql
		$sql="insert into `movie_movie`(`title`,`original_title`,`aka`,`country`,`language`,`year`,`length`,`description`,`average`,`douban_id`,`picture`,`subtype`,`large_picture`,`date`) 
			  values('{$title}','{$original_title}','{$aka}','{$country}','{$language}','{$year}','{$length}','{$description}','{$average}','{$this->id}','{$this->picture_150}','{$subtype}','{$large_picture}','{$date}')";
		//执行sql
		if($this->execute($sql)){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * tag 插入操作  ：
	 * movie_tag  
	 * 	sql: insert into `movie_tag`(`tag`) values(:tag_name)
	 * movie_movie_tag
	 * sql:
	 * 	insert into `movie_movie_tag`(`movie_id`,`tag_id`) values(:movie_id,:tag_id)
	 * 
	 * @param int $id movie_movie 表中的id
	 */
	public function insert_tag($id){
		//array
		$tags=$this->data_simple->tags;
		
		//Thinking
		foreach($tags as $tag){
			$tag_name=$tag->name;
			//检查此 tag是否已经在 movie_tag 表中
			$tag_id=$this->check_tag($tag_name);
			if(!$tag_id){
				$tag_name=addslashes($tag_name);
				//没有找到
				$sql="insert into `movie_tag`(`tag`) values('{$tag_name}')";
				if(!$this->execute($sql)){
					return false;
				}
				$tag_id=$this->lastInsID;
			}
			
			//插入movie_movie_tag
			$sql="insert into `movie_movie_tag`(`movie_id`,`tag_id`) values('{$id}','{$tag_id}')";	
			if(!$this->execute($sql)){
				return false;
			}
		}
		return true;
	}
	
	/**
	 * 检查tag 能否在 movie_tag找到 如果能够找到返回 id  否则返回false
	 */
	private function check_tag($tag_name){
		$sql="select id from movie_tag where tag='{$tag_name}'";
		$result=$this->query($sql);
		if($result){
			return $result[0]['id'];
		}else{
			return false;
		}
	}
	/**
	 * 将图片按width裁剪并写入SaeStorage
	 * 
	 * @param String $image
	 * @param int $width
	 * @param int $height
	 * @throws Exception
	 * @return string
	 */
	public function save_image($image,$width,$height=0,$path='/',$img_name){
		
/*
		$image_data = $this->_curl($image);
		$img = new SaeImage();
		$img->setData( $image_data );
		if($height==0){
			$img->resize($width); 			//设置 width=140 height自由
		}else{
			$img->resize($width,$height); 	//设置 width=140 height=$height
		}
		$new_data = $img->exec('jpg');
		
		//写入临时目录
		file_put_contents( SAE_TMP_PATH . $img_name , $new_data );
		$s = new SaeStorage();
		$up_name=$path.$img_name;
		//上传至Storage
		$s->upload( 'img1' , $up_name , SAE_TMP_PATH . $img_name );
		if($s->errno()!=0){
			//错误
			throw new Exception("电影id:{$this->id} 的图片{$width}px写入SaeStorage失败");
		}
		//获取图片路径
		$picture=$s->getUrl( 'img1' , $up_name );
		return $picture;
*/
	$url="http://moviepic.sinaapp.com/saveimg.php?pass=wzl&path=$path&img_name=$img_name&image=$image";
	$res=$this->_curl($url);
	if($res=='false'){
		return false;	
	}
	
	return 'http://moviepic-img1.stor.sinaapp.com'.$path.$img_name;
	
	}
	
	/**
	 * 查看此电影的id是否已经存在数据库表 movie_movie 当中
	 * @param int $id
	 * @return boolean
	 */
	public function check_movie($id){
		$sql="select `id` from `movie_movie` where `douban_id`='{$this->id}'";
		$result=$this->query($sql);
		if($result){
			//此豆瓣id已经存在数据库中
			return true;			
		}else{
			return false;
		}
		
	}
	
	/**
	 * fetch_url  
	 * 
	 * @param String $api
	 * @param String $api_simple
	 */
	public function fetch_url($api,$api_simple){
		$data=$this->_curl($api);
		$this->data=json_decode($data);
		$data=null;
		$data=$this->_curl($api_simple);
		$this->data_simple=json_decode($data);
	}
	
	/**
	 * curl 封装
	 * @param String $api
	 * @return mixed
	 */
	private function _curl($api){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api);
		//证书验证false
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		
		curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_USERAGENT,"collect/1.0");
		$rep = curl_exec($ch);
		//curl 错误
		if($rep === false){
			//$this->trace("CURL获取$api错误:".curl_error($ch),3);
			return false;
		}
		curl_close($ch);
		return $rep;
	}
	
	/**
	 * 执行没有结果集的sql语句
	 * 
	 * @param String $str
	 * @return boolean
	 */
	public function execute($str){
		if ( !$this->link ) return false;
		$this->queryStr = $str;
		//释放前次的查询结果
		if ( !empty($this->PDOStatement) ) $this->free();
		$this->PDOStatement	=	$this->link->prepare($str);
		if(false === $this->PDOStatement) {
			$this->error();
			return false;
		}
		$result	=	$this->PDOStatement->execute();
		if ( false === $result) {
			$this->error();
			return false;
		} else {
			$this->numRows = $result;
			if(preg_match("/^\s*(INSERT\s+INTO|REPLACE\s+INTO)\s+/i", $str)) {
				$this->lastInsID = $this->link->lastInsertId();
			}
			//$this->trace($str,2);
			return true;
		}
		
	}
	
	/**
	 * query  执行返回有结果集的信息
	 * 
	 * @param String $str
	 * @return boolean
	 */
	public function query($str){
		if ( !$this->link ) return false;
		$this->sql = $str;
		//释放前次的查询结果
		if ( !empty($this->PDOStatement) ) $this->free();
		$this->PDOStatement = $this->link->prepare($str);
		if(false === $this->PDOStatement) $this->error();
		$result =   $this->PDOStatement->execute();
		if(false === $result) {
			$this->error();
			return false;
		} else {
			//$this->trace($str,2);
			return $this->getAll();
		}
	}
	
	/**
	 * 获取结果集中所有数据
	 * 
	 * @return array
	 */
	public function getAll(){
		$result =   $this->PDOStatement->fetchAll(constant('PDO::FETCH_ASSOC'));
		$this->numRows = count( $result );
		return $result;
	}
	
	/**
	 * 释放查询的结果集
	 */
	public function free() {
        $this->PDOStatement = null;
    }
    
	/**
	 * 数据库操作错误信息
	 * 
	 */
    public function error() {
    	if($this->PDOStatement) {
    		$error = $this->PDOStatement->errorInfo();
    		$this->error = $error[2];
    	}else{
    		$this->error = '';
    	}
    	if('' != $this->queryStr){
    		$this->error .= "\n [ SQL语句 ] : ".$this->queryStr;
    	}
    	//return $this->error;
    	throw new Exception($this->error);
    }
	
	/**
	 * 输出trace信息
	 * $mes string  需要输出的trace信息
	 * $code  int  错误类型 
	 * 
	 * 1:正常的trace信息  green 
	 * 2：错误信息 red
	 * 
	 */
    private function trace($mes,$code=1){
    	switch ($code){
    		case 1:
    			echo "<b style='color:green'>{$mes}</b><br/>";
    			break;
    		case 2:
    			echo "<b style='color:#0054BD'>sql:{$mes}</b><br/>";
    			break;
    		case 3:
    			echo "<b style='color:red'>{$mes}</b><br/>";
    			exit();
    		default:
    			echo "<b style='color:green'>{$mes}</b><br/>";
    	}
    }
	
}
?>