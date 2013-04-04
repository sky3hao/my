<?php /* Smarty version Smarty-3.1.13, created on 2013-04-04 19:54:59
         compiled from ".\web\Tpl\default\Index\index.htm" */ ?>
<?php /*%%SmartyHeaderCode:6466515bee5ea8e510-65328159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c88458b4bb9c1eef48bba6bdcb661132774e71f' => 
    array (
      0 => '.\\web\\Tpl\\default\\Index\\index.htm',
      1 => 1365065177,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6466515bee5ea8e510-65328159',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_515bee5eb19738_69537136',
  'variables' => 
  array (
    'title' => 0,
    '__BASE__' => 0,
    'models' => 1,
    'model' => 1,
    'page' => 1,
    '__URL__' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bee5eb19738_69537136')) {function content_515bee5eb19738_69537136($_smarty_tpl) {?><!DOCTYPE HTML>
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
	<div class="header">
    	<div class="nav">
    		<span class="index_text">
    			<a href="http://www.jxustsrw.cn" target="_blank">树人网</a>
    		</span>
    		<!-- 
    		<span class="article_text">
    			<a href="" target="_blank">文章</a>
    		</span>
    		 -->
    	</div>
    </div>
	<div class="container">
        <div class="left">
            <div class="box main">
            	<h3 class="book_title">
                	<span class="book_title_bg_left"></span>
                	<span>投票 </span>
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
                        	<input style="float:right;margin-top:8px;font-size:12px;" type="button" value="投一票" class="btn btn-mini vote_btn" style="margin-left:15px" onclick="_vote(<?php echo $_smarty_tpl->tpl_vars['model']->value['id'];?>
)"/>
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
        <div class="right">
        	<div class="box box1">
        		<h4>投稿邮箱：</h4>
	        	<div class="vote_info">
	        		shurenwangwenxue@163.com<br/>
	        		2372231595@qq.com<br/>
	        	</div>
        	</div>
        	<div class="box box1">
        		<h4>关于投票：</h4>
	        	<div class="vote_info">
	        		每个人有一次投票机会！
	        	</div>
        	</div>
        	<div class="box box1">
        		<h4>活动简介：</h4>
	        	<div class="vote_info">
	        		<b>征文主题：</b><br/>
	        			(1)中国梦·理工梦·学子梦<br/>
	        			(2)情<br/>
	        		<b>投票时间:</b><br/>
	        			4月5日 - 4月28日<br/>
	        		<b>评分方式:</b><br/>
	        			专家评委评分占70%,树人网网络平台评分占30%<br/>
	        	</div>
        	</div>
        	<div class="box box2">
        		<h4>分享：</h4>
	        	<div class="vote_info">
	        		<!-- Baidu Button BEGIN -->
					<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
					<a class="bds_qzone"></a>
					<a class="bds_tsina"></a>
					<a class="bds_tqq"></a>
					<a class="bds_renren"></a>
					<a class="bds_t163"></a>
					<span class="bds_more"></span>
					</div>
					<script type="text/javascript" id="bdshare_js" data="type=tools&amp;mini=1&amp;uid=18863" ></script>
					<script type="text/javascript" id="bdshell_js"></script>
					<script type="text/javascript">
					document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
					</script>
					<!-- Baidu Button END -->
	        	</div>
        	</div>
        	
        	
        </div>
        <div class="clear"></div>
    </div>
    <div class="footer">
    	<div class="copyright">
        	&copy;  2013 江西理工大学树人网   Designed By <a href="http://www.ttzxnet.com" target="_blank" style="color:#FFF">SilencePer</a>
        </div>
    </div>
<script>
	function _vote(id){
		//ajax投票
		$.post("<?php echo $_smarty_tpl->tpl_vars['__URL__']->value;?>
/do_vote",{ id: id }, function(data) {
			  var info=eval("("+data+")");
			  if(info.code==1){
				  //投票成功
				  //原始投票数
				  var count=$('#count_'+id).text();
				  count=Number(count)+1;
				  $('#count_'+id).text(count);
				  alert(info.mesg);
			  }else{
				  //投票失败
				  alert(info.mesg);
			  }
			});
	}
</script>
<div style="display:none">
<script src="http://s25.cnzz.com/stat.php?id=4770973&web_id=4770973" language="JavaScript"></script>
</div>
</body>
</html>
<?php }} ?>