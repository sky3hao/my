<?php
/*
 * email验证页
*
* @ silenceper@gmail.com
*   2012_09_26
* */
defined('IN_TS') or die('Access Denied.');
require_once("config.php");

switch($ts){
	case "":
		$email = $_GET['email'];
		
		$isemail = $new['pubs']->findCount('user',array(
			'email'=>$email,
		));
		
		if($isemail > 0){
		
			$title = "绑定微博帐号";
			include "html/email.html";
		
		}else{
			header("Location: ".SITE_URL."index.php");
		}
		break;
		
	//执行
	case "do":
		$email = trim($_POST['email']);
		$pwd = trim($_POST['pwd']);
		
		$strUser = $new['pubs']->find('user',array(
			'email'=>$email,
		));
		
		if($pwd == ''){
			qiMsg("密码不能为空！");
		}elseif($strUser['pwd'] != md5($strUser['salt'].$pwd)){
			qiMsg("密码输入有误！");
		}else{
		
			//绑定帐号
			$new['pubs']->create('user_open',array(
				'userid'=>$strUser['userid'],
				'sitename'=>'weibo',
				'openid' => $_SESSION['wb_uid'],
				'access_token'=>$_SESSION['wb_token']['access_token'],
			));
		
			$userData = $new['pubs']->find('user_info',array(
				'email'=>$email,
			));
			
			//发送系统消息(恭喜注册成功)
			$userid = $userData['userid'];
			$username = $userData['username'];
			
			$msg_userid = '0';
			$msg_touserid = $userid;
			$msg_content = '亲爱的 '.$username.' ：<br />恭喜你成功绑定新浪微博登录信息。<br />现在你除了可以用Email登录，同时还可以使用新浪微博登录！<br />感谢你对ThinkSAAS的支持！';
			aac('message',$db)->sendmsg($msg_userid,$msg_touserid,$msg_content);
			
			$_SESSION['tsuser']	= $userData;
		
			header("Location: ".SITE_URL);
			
		}
		
		break;
}