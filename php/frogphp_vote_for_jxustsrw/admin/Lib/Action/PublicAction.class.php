<?php
/**
 * 登入 注销
 * @author silenceper
 *
 */
class PublicAction extends Action{
	/**
	 * 登入界面
	 */
	public function index(){
		//已经登入
		if(isset($_SESSION) && $_SESSION['flag'] =='admin'){
			$this->redirect('index/index');
		}
		$this->display();
	}
	
	/**
	 * checkLogin
	 */
	public function checkLogin(){
		//已经登入
		if(isset($_SESSION) && $_SESSION['flag'] =='admin'){
			$this->redirect('Index/index');
		}
		if(!isset($_POST['LoginForm'])){
			$this->error('访问错误','public/index');
		}
		$LoginForm=$_POST['LoginForm'];
		$LoginForm['password']=md5(trim($LoginForm['password']));
		$user=D('admin')->where("email='{$LoginForm['email']}' AND password='{$LoginForm['password']}'")->find();
		if($user){
			//设置 session['flag']='admin'
			$_SESSION['flag']='admin';
			$_SESSION['id']=$user['id'];
			$_SESSION['email']=$user['email'];
			$_SESSION['username']=$user['username'];
			$this->success('登入成功','index/index');
		}else{
			$this->error('登入失败','public/index');
		}
	}
	
	/**
	 * 注销
	 */
	public function logout(){
		unset($_SESSION);
		session_destroy();
		$this->success('注销成功','public/index');
	}
	
}

?>