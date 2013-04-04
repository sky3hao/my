<?php /* Smarty version Smarty-3.1.13, created on 2013-04-03 22:30:31
         compiled from "E:\host\vhosts\test\Core\Frogphp\Tpl\success.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6653515c3d078562f9-14985870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cc010a633fb65e7df5af2ba98e44e0ce43cfe1e' => 
    array (
      0 => 'E:\\host\\vhosts\\test\\Core\\Frogphp\\Tpl\\success.tpl',
      1 => 1343478055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6653515c3d078562f9-14985870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'waitSecond' => 0,
    'jumpUrl' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_515c3d07919d34_98403122',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c3d07919d34_98403122')) {function content_515c3d07919d34_98403122($_smarty_tpl) {?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title>页面提示</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='Refresh' content='<?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
;URL=<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
'>
<style>
html, body{margin:0; padding:0; border:0 none;font:14px Tahoma,Verdana;line-height:150%;background:white}
a{text-decoration:none; color:#174B73; border-bottom:1px dashed gray}
a:hover{color:#F60; border-bottom:1px dashed gray}
div.message{margin:10% auto 0px auto;clear:both;padding:5px;border:1px solid silver; text-align:center; width:45%}
span.wait{color:blue;font-weight:bold}
span.success{color:blue;font-weight:bold}
div.msg{margin:20px 0px}
</style>
</head>
<body>
<div class="message">
	<div class="msg">
	<span class="success">操作成功!<?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span>

	</div>
	<div class="tip">
		页面将在 <span class="wait"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</span> 秒后自动跳转，如果不想等待请点击 <a href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">这里</a> 跳转
	</div>
</div>
</body>
</html>
<?php }} ?>