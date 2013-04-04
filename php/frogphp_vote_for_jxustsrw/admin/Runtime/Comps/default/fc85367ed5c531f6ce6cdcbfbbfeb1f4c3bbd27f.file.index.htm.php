<?php /* Smarty version Smarty-3.1.13, created on 2013-04-04 10:05:52
         compiled from ".\admin\Tpl\default\Index\index.htm" */ ?>
<?php /*%%SmartyHeaderCode:22258515c3dde864f88-13035861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc85367ed5c531f6ce6cdcbfbbfeb1f4c3bbd27f' => 
    array (
      0 => '.\\admin\\Tpl\\default\\Index\\index.htm',
      1 => 1365041150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22258515c3dde864f88-13035861',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_515c3dde8ef616_46376002',
  'variables' => 
  array (
    'models' => 0,
    'model' => 0,
    '__URL__' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c3dde8ef616_46376002')) {function content_515c3dde8ef616_46376002($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="container" style="width:658px">
     <div>
         <div class="box main">
         	<h3 class="book_title">
             	<span class="book_title_bg_left"></span>
             	<span>投票管理</span>
                 <span class="book_title_bg_right"></span>
             </h3>
             <div class="clear"></div>
             <div id="chapter_list">
				<ul>
                	<?php  $_smarty_tpl->tpl_vars['model'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['model']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['models']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['model']->key => $_smarty_tpl->tpl_vars['model']->value){
$_smarty_tpl->tpl_vars['model']->_loop = true;
?>
                        <li>
                            <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['model']->value['link'];?>
"><span style="color:red">（票数:<span id="count_<?php echo $_smarty_tpl->tpl_vars['model']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['model']->value['count'];?>
</span>）</span>【<?php echo $_smarty_tpl->tpl_vars['model']->value['author'];?>
】<?php echo $_smarty_tpl->tpl_vars['model']->value['title'];?>
</a>
                        	<a href="<?php echo $_smarty_tpl->tpl_vars['__URL__']->value;?>
/change/id/<?php echo $_smarty_tpl->tpl_vars['model']->value['id'];?>
"  class=" btn btn-mini vote_btn" style="margin-left:5px;width:auto" >编辑</a><a href="<?php echo $_smarty_tpl->tpl_vars['__URL__']->value;?>
/delete/id/<?php echo $_smarty_tpl->tpl_vars['model']->value['id'];?>
" class="btn btn-mini vote_btn" style="margin-left:2px;width:auto;" onclick="return confirm('你确认要删除吗？')">删除</a>
                        </li>
                     <?php } ?>
                  </ul>             	
             </div>
             
            <!-- 分页 -->
          	<div class="pagination pagination-centered">
          		<ul>
          			<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

          		</ul>
          	</div>
         </div>
     </div>
     <div class="clear"></div>
 </div>
<?php echo $_smarty_tpl->getSubTemplate ("./footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>