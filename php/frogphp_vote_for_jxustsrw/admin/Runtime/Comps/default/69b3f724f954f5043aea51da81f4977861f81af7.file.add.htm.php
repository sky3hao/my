<?php /* Smarty version Smarty-3.1.13, created on 2013-04-04 09:48:43
         compiled from ".\admin\Tpl\default\Index\add.htm" */ ?>
<?php /*%%SmartyHeaderCode:6252515cd8ea952106-96584006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69b3f724f954f5043aea51da81f4977861f81af7' => 
    array (
      0 => '.\\admin\\Tpl\\default\\Index\\add.htm',
      1 => 1365040122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6252515cd8ea952106-96584006',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_515cd8ea9e7c60_99059945',
  'variables' => 
  array (
    '__URL__' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515cd8ea9e7c60_99059945')) {function content_515cd8ea9e7c60_99059945($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="container" style="width:658px">
     <div>
         <div class="box main">
         	<h3 class="book_title">
             	<span class="book_title_bg_left"></span>
             	<span>添加投票</span>
                 <span class="book_title_bg_right"></span>
             </h3>
             <div class="clear"></div>
             <div id="chapter_list">
             	<form action="<?php echo $_smarty_tpl->tpl_vars['__URL__']->value;?>
/checkAdd" method="post">
				   <table class="table" style="text-align:center" align="center">
				   		<tbody>
				   			<tr><th>标题：</th><td><input type="text" name="title" size="35"/></td></tr>
				   			<tr><th>作者：</th><td><input type="text" name="author" size="35"/></td></tr>
				   			<tr><th>链接：</th><td><input type="text" name="link" size="35"/></td></tr>
				   			<tr><td colspan="2"><input type="submit" class="btn" value="添加"/></td></tr>
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