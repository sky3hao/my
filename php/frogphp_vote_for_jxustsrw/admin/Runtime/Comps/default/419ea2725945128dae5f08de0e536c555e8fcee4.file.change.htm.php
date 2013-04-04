<?php /* Smarty version Smarty-3.1.13, created on 2013-04-04 10:09:52
         compiled from ".\admin\Tpl\default\Index\change.htm" */ ?>
<?php /*%%SmartyHeaderCode:4502515ce05069b2d7-64963130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '419ea2725945128dae5f08de0e536c555e8fcee4' => 
    array (
      0 => '.\\admin\\Tpl\\default\\Index\\change.htm',
      1 => 1365041390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4502515ce05069b2d7-64963130',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_515ce05074eee1_56786198',
  'variables' => 
  array (
    '__URL__' => 0,
    'models' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515ce05074eee1_56786198')) {function content_515ce05074eee1_56786198($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="container" style="width:658px">
     <div>
         <div class="box main">
         	<h3 class="book_title">
             	<span class="book_title_bg_left"></span>
             	<span>修改投票</span>
                 <span class="book_title_bg_right"></span>
             </h3>
             <div class="clear"></div>
             <div id="chapter_list">
             	<form action="<?php echo $_smarty_tpl->tpl_vars['__URL__']->value;?>
/checkChange" method="post">
				   <table class="table" style="text-align:center" align="center">
				   		<tbody>
				   			<tr><th>标题：</th><td><input type="text" name="title" size="35" value="<?php echo $_smarty_tpl->tpl_vars['models']->value['title'];?>
"/></td></tr>
				   			<tr><th>作者：</th><td><input type="text" name="author" size="35" value="<?php echo $_smarty_tpl->tpl_vars['models']->value['author'];?>
"/></td></tr>
				   			<tr><th>链接：</th><td><input type="text" name="link" size="35" value="<?php echo $_smarty_tpl->tpl_vars['models']->value['link'];?>
"/></td></tr>
				   			<tr><input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['models']->value['id'];?>
"/></tr>
				   			<tr><td colspan="2"><input type="submit" class="btn" value="修改"/></td></tr>
				   		</tbody>
				   </table>     	
				 </form>
             </div>
         </div>
     </div>
     <div class="clear"></div>
 </div>
<?php echo $_smarty_tpl->getSubTemplate ("./footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>