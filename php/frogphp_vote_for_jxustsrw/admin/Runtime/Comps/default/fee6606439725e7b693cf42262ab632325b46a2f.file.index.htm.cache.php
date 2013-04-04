<?php /* Smarty version Smarty-3.1.13, created on 2013-04-03 22:18:20
         compiled from ".\admin\Tpl\default\Public\index.htm" */ ?>
<?php /*%%SmartyHeaderCode:5288515c39c7c1e4d6-76785517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fee6606439725e7b693cf42262ab632325b46a2f' => 
    array (
      0 => '.\\admin\\Tpl\\default\\Public\\index.htm',
      1 => 1364998695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5288515c39c7c1e4d6-76785517',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_515c39c7c761f6_28640300',
  'variables' => 
  array (
    '__URL__' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c39c7c761f6_28640300')) {function content_515c39c7c761f6_28640300($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="zh">
<head>
	<meta http-equiv="content/text" content="text/html" charset="utf-8">
<title>管理员登入-投票管理系统!</title>
	<style type="text/css">
	html {
		background-color: #E9EEF0
	}
	.wrapper {
		margin: 140px auto;
	}
	.loginBox {
		background-color: #FEFEFE;
		border: 1px solid #BfD6E1;
		border-radius: 5px;
		color: #444;
		font: 14px 'Microsoft YaHei','微软雅黑';
		margin: 0 auto;
		width: 388px
	}
	.loginBox .loginBoxCenter {
		border-bottom: 1px solid #DDE0E8;
		padding: 24px;
		padding-top:0;
	}
	.loginBox .loginBoxCenter p {
		margin-bottom: 10px
	}
	.loginBox .loginBoxButtons {
		background-color: #F0F4F6;
		border-top: 1px solid #FFF;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
		line-height: 28px;
		overflow: hidden;
		padding: 20px 24px;
		vertical-align: center;
	}
	.loginBox .loginInput {
		border: 1px solid #D2D9dC;
		border-radius: 2px;
		color: #444;
		font: 12px 'Microsoft YaHei','微软雅黑';
		padding: 8px 14px;
		margin-bottom: 8px;
		width: 310px;
	}
	.loginBox .loginInput:FOCUS {
		border: 1px solid #B7D4EA;
		box-shadow: 0 0 8px #B7D4EA;
	}
	.loginBox .loginBtn {
		background-image: -moz-linear-gradient(to bottom, #B5DEF2, #85CFEE);
		border: 1px solid #98CCE7;
		border-radius: 20px;
		box-shadow:inset rgba(255,255,255,0.6) 0 1px 1px, rgba(0,0,0,0.1) 0 1px 1px;
		color: rgb(233, 83, 25);
		cursor: pointer;
		float: right;
		font: bold 13px Arial;
		padding: 5px 14px;
	}
	.loginBox .loginBtn:HOVER {
		background-image: -moz-linear-gradient(to top, #B5DEF2, #85CFEE);
	}
	.loginBox a.forgetLink {
		color: #ABABAB;
		cursor: pointer;
		float: right;
		font: 11px/20px Arial;
		text-decoration: none;
		vertical-align: middle;
	}
	.loginBox a.forgetLink:HOVER {
		text-decoration: underline;
	}
	.loginBox input#remember {
		vertical-align: middle;
	}
	.loginBox label[for="remember"] {
		font: 11px Arial;
	}
	.errorMessage{
		color:red;
		font-size:12px;	
	}
	.head{
		width:100%;	
	}
	.head h3{
		padding:0;
		margin:0;
		height:30px;
		text-align:center;
		line-height:30px;
		padding-top:10px;
	}
	</style>
</head>
<body>
	<div class="wrapper">
		<form id="login-form" action="<?php echo $_smarty_tpl->tpl_vars['__URL__']->value;?>
/checkLogin" method="post">
			<div class="loginBox">
				<div class="head">
					<h3>普通用户登入</h3>
				</div>
				<div class="loginBoxCenter">
					<p><label for="LoginForm_email">Email</label>:
					<p><input class="loginInput" name="LoginForm[email]" id="LoginForm_email" type="text" /></p>
					<p><label for="LoginForm_password">密码</label>:
					<p><input class="loginInput" name="LoginForm[password]" id="LoginForm_password" type="password" /></p>
				</div>
				<div class="loginBoxButtons">		
					<input type="submit" class="loginBtn" name="sub" value="登入">
				</div>
			</div>
		</form>	
	</div>
</body>
</html>
<?php }} ?>