<?php /* Smarty version Smarty-3.1.13, created on 2013-04-03 18:38:01
         compiled from ".\web\Tpl\default\Index\index.htm" */ ?>
<?php /*%%SmartyHeaderCode:4621515be76ccb2d83-08420178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c88458b4bb9c1eef48bba6bdcb661132774e71f' => 
    array (
      0 => '.\\web\\Tpl\\default\\Index\\index.htm',
      1 => 1364984869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4621515be76ccb2d83-08420178',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_515be76cdeccc4_10497571',
  'variables' => 
  array (
    'title' => 0,
    'models' => 1,
    'model' => 1,
    'page' => 1,
    '__URL__' => 0,
  ),
  'has_nocache_code' => true,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515be76cdeccc4_10497571')) {function content_515be76cdeccc4_10497571($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link href="./public/css/main.css" type="text/css" rel="stylesheet"/>
<link href="./public/css/style.css" type="text/css" rel="stylesheet"/>
<script src="http://lib.sinaapp.com/js/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
	<div class="header">
    	
    </div>
	<div class="container">
        <div class="left">
            <div class="box main">
            	<h3 class="book_title">
                	<span class="book_title_bg_left"></span>
                	<span>文章投票 </span>
                    <span class="book_title_bg_right"></span>
                </h3>
                <div class="clear"></div>
                 
                <div id="chapter_list">
               
                	<ul>
                	<?php echo '/*%%SmartyNocache:4621515be76ccb2d83-08420178%%*/<?php  $_smarty_tpl->tpl_vars[\'model\'] = new Smarty_Variable; $_smarty_tpl->tpl_vars[\'model\']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars[\'models\']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, \'array\');}
foreach ($_from as $_smarty_tpl->tpl_vars[\'model\']->key => $_smarty_tpl->tpl_vars[\'model\']->value){
$_smarty_tpl->tpl_vars[\'model\']->_loop = true;
?>/*/%%SmartyNocache:4621515be76ccb2d83-08420178%%*/';?>

                        <li>
                            <a target="_blank" href="<?php echo '/*%%SmartyNocache:4621515be76ccb2d83-08420178%%*/<?php echo $_smarty_tpl->tpl_vars[\'model\']->value[\'link\'];?>
/*/%%SmartyNocache:4621515be76ccb2d83-08420178%%*/';?>
">【<?php echo '/*%%SmartyNocache:4621515be76ccb2d83-08420178%%*/<?php echo $_smarty_tpl->tpl_vars[\'model\']->value[\'author\'];?>
/*/%%SmartyNocache:4621515be76ccb2d83-08420178%%*/';?>
】<?php echo '/*%%SmartyNocache:4621515be76ccb2d83-08420178%%*/<?php echo $_smarty_tpl->tpl_vars[\'model\']->value[\'title\'];?>
/*/%%SmartyNocache:4621515be76ccb2d83-08420178%%*/';?>
</a>
                        	<span style="color:red">（票数:<?php echo '/*%%SmartyNocache:4621515be76ccb2d83-08420178%%*/<?php echo $_smarty_tpl->tpl_vars[\'model\']->value[\'count\'];?>
/*/%%SmartyNocache:4621515be76ccb2d83-08420178%%*/';?>
）</span>
                        	<input type="button" value="投一票" class="btn btn-mini vote_btn" style="margin-left:15px" onclick="_vote(<?php echo '/*%%SmartyNocache:4621515be76ccb2d83-08420178%%*/<?php echo $_smarty_tpl->tpl_vars[\'model\']->value[\'id\'];?>
/*/%%SmartyNocache:4621515be76ccb2d83-08420178%%*/';?>
)"/>
                        </li>
                     <?php echo '/*%%SmartyNocache:4621515be76ccb2d83-08420178%%*/<?php } ?>/*/%%SmartyNocache:4621515be76ccb2d83-08420178%%*/';?>

                   </ul>
                </div>
                <!-- 分页 -->
               	<div class="pagination pagination-centered">
               		<ul>
               			<?php echo '/*%%SmartyNocache:4621515be76ccb2d83-08420178%%*/<?php echo $_smarty_tpl->tpl_vars[\'page\']->value;?>
/*/%%SmartyNocache:4621515be76ccb2d83-08420178%%*/';?>

               		</ul>
               	</div>
            </div>
             
        </div>
        <div class="right">
        	
        </div>
        <div class="clear"></div>
    </div>
    <div class="footer">
    	<div class="copyright">
        	&copy; silencper 2013
        </div>
    </div>
<script>
	function _vote(id){
		//ajax投票
		$.post("<?php echo $_smarty_tpl->tpl_vars['__URL__']->value;?>
/do_vote",{ id: id }, function(data) {
			  //alert(data);
			  
			});
	}
</script>
</body>
</html>
<?php }} ?>