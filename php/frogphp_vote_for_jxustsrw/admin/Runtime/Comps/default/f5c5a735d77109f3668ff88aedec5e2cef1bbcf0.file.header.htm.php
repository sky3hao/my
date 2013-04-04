<?php /* Smarty version Smarty-3.1.13, created on 2013-04-04 11:43:53
         compiled from "E:\host\vhosts\test\vote\admin\Tpl\default\Index\header.htm" */ ?>
<?php /*%%SmartyHeaderCode:4601515c42e024f4e8-23292535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5c5a735d77109f3668ff88aedec5e2cef1bbcf0' => 
    array (
      0 => 'E:\\host\\vhosts\\test\\vote\\admin\\Tpl\\default\\Index\\header.htm',
      1 => 1365047032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4601515c42e024f4e8-23292535',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_515c42e0298359_28396485',
  'variables' => 
  array (
    'title' => 0,
    '__BASE__' => 0,
    '_SESSION' => 0,
    '__URL__' => 0,
    '__APP__' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c42e0298359_28396485')) {function content_515c42e0298359_28396485($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['__BASE__']->value;?>
/public/css/main.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['__BASE__']->value;?>
/public/css/style.css" type="text/css" rel="stylesheet"/>
<script src="http://lib.sinaapp.com/js/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
	<div class="header admin_header">
		<h5 style="display:inline">欢迎 <?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['username'];?>
 登入!</h5>
    	<a href="<?php echo $_smarty_tpl->tpl_vars['__URL__']->value;?>
/add">添加投票</a>
    	<a href="<?php echo $_smarty_tpl->tpl_vars['__URL__']->value;?>
/index">投票管理</a>
    	<a href="<?php echo $_smarty_tpl->tpl_vars['__APP__']->value;?>
/Public/logout">注销</a>
    	<a href="<?php echo $_smarty_tpl->tpl_vars['__BASE__']->value;?>
" target="_blank">投票首页</a>
    </div><?php }} ?>