<?php 
    //项目配置文件
    return array(
    		'DB_TYPE'               => 'mysqli',
    		
    		'DB_HOST'               => 'localhost', // 服务器地址
    		'DB_NAME'               => 'vote',          // 数据库名
    		'DB_USER'               => 'root',      // 用户名
    		'DB_PWD'                => '123',          // 密码
    		'DB_PORT'               => '3306',        // 端口
    		'DB_PREFIX'             => 'vote_',    // 数据库表前缀
    		'URL_MODEL'				=>'PATHINFO',//REWRITE  PATHINFO
    		//关闭模板缓存
    		'CACHE_START'			=>false,
    );