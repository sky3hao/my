<?php
	ob_start();
	header('Content-Type:text/html;charset=utf-8');
	try{
		$pdo=new PDO('mysql:host=localhost;dbname=yii_movie_sae;port=3306','root','123');
	}
	catch(Exception $e){
		echo "数据库连接失败:".$e->getMessage();
		exit;
	}
/*
	//获取豆瓣电影中的id获取信息
	if(!isset($_GET['id'])){
		exit('没有豆瓣电影id');
	}
	
*/
	/**
	 * 从caiji_movie_id  中获取id 
	 */
	if(!@$_GET['start_id']):
		//显示一个form
	?>
		<form action="" method="get">
			开始的采集id：start_id<br/>
			<input type="text" name="start_id" value="1"/><br/>
			结束采集的id：end_id<br/>
			<input type="text" name="end_id" /><br/>
			密码：<br/>
			<input type="password" name="pass" /><br/>
			<input type="submit"/><br/>
		</form>
		
	<?php
	exit();
	endif;
	//设置一个简单的pass 防止别人采集
	$pass='wenzhenlin';
	if(@$_GET['pass']!=$pass){
		exit('密码错误');
	}
	
	//才能够 caiji_movie_id 中的start_id(包括本身) 结束在end_id(不包含本身)
	$start_id=intval($_GET['start_id']);
	$end_id=intval($_GET['end_id']);
	if($start_id>=$end_id){
		exit('结束!');						
	}
	
	$sql="select `movie_id` from `caiji_movie_id` where id>=:start_id limit 1";
	$stat=$pdo->prepare($sql);
	$stat->execute(array(
			':start_id'=>$start_id,
			));
	$data=$stat->fetch();
	if($data===false){
		$arr = $stat->errorInfo();
		print_r($arr);
		//执行失败
		exit("从caiji_movie_id表查找movie_id失败 | start_id=$start_id");
	}
	
	//电影的id
	$id=$data['movie_id'];
	$start_id=$start_id+1;	
	//输出正在获取的电影豆瓣id
	echo "<b style='color:green'>当前获取的电影豆瓣id为:$id</b><br/>";
	
	include 'Collect.class.php';
	
	$apikey='0e0a7a0d9be9193b2a1f6e28d3bb4bb1';
	$collect=new Collect($id,$apikey);
	$collect->connect('localhost','3306','yii_movie_sae','root','123');
	$collect->start();
	header("Refresh: 2; url=index.php?start_id=$start_id&end_id=$end_id&pass=$pass");
	//关闭数据库
	$pdo=null;
	ob_end_flush();
?>