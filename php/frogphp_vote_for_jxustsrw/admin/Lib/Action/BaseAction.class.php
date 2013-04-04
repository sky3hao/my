<?php
/**
 * 基础控制器
 * 
 * @author silenceper
 *
 */
class BaseAction extends Action{
	protected function _initialize(){
		//session判断
		if(!isset($_SESSION) || $_SESSION['flag'] !='admin'){
			$this->redirect('public/index');
		}
	}
}

?>