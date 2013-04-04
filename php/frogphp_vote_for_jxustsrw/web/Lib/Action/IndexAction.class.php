<?php
/**
 * @author silenceper
 * @link http://www.ttzxnet.com
 * @date 2013-04-03
 * 
 */
class IndexAction extends Action {
	/**
	 * 投票主页
	 * 
	 */
	public function index(){
		$this->assign('title','树人网文学投票  - 江西理工大学树人网');
		//查找出 文章 分页
		require_once FROG_EXTEND.'Page.class.php';
		$total=D('article')->count();
		$page=new Page($total,15);
		$page->setConfig('theme','%upPage%  %linkPage%  %downPage%');
		$page->setConfig('prev','«');
		$page->setConfig('next','»');
		$models=D("article")->order("RAND()")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('models',$models);
		$this->assign('page',$page->show());
		$this->display();
	}
	
	/**
	 * 处理投票请求
	 */
	public function do_vote(){
		//判断是否是ajax提交
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest'){
			//文章id
			$id=trim($_POST['id']);
			$ip=$this->get_user_ip();
			$data['ip']=$ip;
			//判断 用户的ip是否已经存在 如果存在 上次的评论时间距离现在是否已超过24小时
			$ip_count=D('ip')->where("ip='{$ip}'")->count();
			//投票时间
			if(date('m-d') >= '04-05' && date('m-d') <='04-28'){
				//判断ip是否已经存在
				if(intval($ip_count) < 1){
					//合法
					//count+1
					if(D('article')->where(array('id'=>$id))->setInc('count')){
						//将ip插入数据库
						$data['date']=time();
						D('ip')->add($data);
						//success
						$res['code']=1;
						$res['mesg']="投票成功!";
					}else{
						//error
						$res['code']=3;
						$res['mesg']="内部错误";
					}
					
				}else{
					//不合法  你已经评论过
					$res['code']=0;
					$res['mesg']="你已经发表过投票了!";
				}
			}else{
				//不合法  投票时间不对
				$res['code']=0;
				$res['mesg']="请注意投票时间!4月5日 - 4月28日";
			}
			echo json_encode($res);
		}else{
			//请求错误
			$this->error('错误的请求',__APP__);
		}
	}
	
	private static function get_user_ip(){
		//php获取ip的算法
		if ($_SERVER["REMOTE_ADDR"])
		{
			$ip = $_SERVER["REMOTE_ADDR"];
		}
		else
		{
			$ip = "null";
		}
		return $ip ;
	}
}