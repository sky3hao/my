<?php
    class IndexAction extends BaseAction {
    	/**
    	 * 投票管理  显示票数
    	 * 
    	 */
       public function index(){
		       	$this->assign('title','投票管理 - 投票管理系统!');
		       	//查找出 文章 分页
		       	require_once FROG_EXTEND.'Page.class.php';
		       	$total=D('article')->count();
		       	$page=new Page($total,15);
		       	$page->setConfig('theme','%upPage%  %linkPage%  %downPage%');
		       	$page->setConfig('prev','«');
		       	$page->setConfig('next','»');
		       	$models=D("article")->order("count desc")->limit($page->firstRow.','.$page->listRows)->select();
		       	$this->assign('models',$models);
		       	$this->assign('page',$page->show());
        		$this->assign('_SESSION',$_SESSION);
				$this->display();
            }
        /**
         * 添加投票
         * 
         */
        public function add(){
        	$this->assign('title','添加投票 - 投票管理系统!');
        	$this->assign('_SESSION',$_SESSION);
        	$this->display();
        }
        
        /**
         * 检查添加投票
         * 
         */
        public function checkAdd(){
        	if(!isset($_POST)){
        		$this->error('操作失败');
        	}
        	
        	$data=array();
        	$data['title']=trim($_POST['title']);
        	$data['author']=trim($_POST['author']);
        	$data['link']=trim($_POST['link']);
        	//添加时间
        	$data['date']=time();
        	if(!$data['title'] || !$data['author'] || !$data['link']){
        		$this->error('数据不能够为空');
        	}
        	
        	if(D('article')->add($data)){
        		$this->success('添加成功','index/index');
        	}else{
        		$this->error('添加失败','add');
        	}
        }
        
        /**
         * change 
         */
        public function change(){
        	$this->assign('title','修改投票 - 投票管理系统!');
        	$this->assign('_SESSION',$_SESSION);
        	//获取id
        	if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
        		$this->error('操作失败','index/index');
        	}
        	$models=D('article')->find($_GET['id']);
        	$this->assign('models',$models);
        	$this->display();
        }
        /**
         * 
         */
        public function checkChange(){
        	if(!isset($_POST['id'])){
        		$this->error('操作失败','index/index');
        	}
        	
        	$data=array();
        	$data['id']=$_POST['id'];
        	$data['title']=trim($_POST['title']);
        	$data['author']=trim($_POST['author']);
        	$data['link']=trim($_POST['link']);
        	$data['date']=time();
        	if(!$data['title'] || !$data['author'] || !$data['link']){
        		$this->error('数据不能够为空');
        	}
        	if(D('article')->save($data)){
        		$this->success('修改成功','index/index');
        	}else{
        		$this->error('修改失败');
        	}
        	
        }
        /**
         * 删除某个投票
         * 
         */
        public function delete(){
        	$id=intval(trim($_GET['id']));
        	if(!$id){
        		$this->error('操作失败');
        	}
        	
        	//删除
        	if(D('article')->delete($id)){
        		$this->success('删除成功~');
        	}else{
        		$this->error('删除失败');
        	}
        }
}