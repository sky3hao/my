var mysql=require('mysql');
/**
 * 尝试对mysql中的query进行封装
 *    缺点 :getConnection--> 每次只能执行一条sql语句就 -->connection.end() 
 */
var query=function(){
	var args=arguments;
	var connection = mysql.createConnection({
  		host     : 'localhost',
 		user     : 'root',
  		password : '123',
		database : 'node_1'
	});

	var sql=args[0];
	connection.connect(function(err) {
		if(args.length==2){
			var callback=args[1];
			if(err) {
				connection.end();
				callback(err);
			}else{
				connection.query(sql,callback);
				connection.end();
				console.log('end the connection');
			}
		}else if(args.length==3){
			var ops=args[1];
			var callback=args[2];
			if(err) {
				connection.end();
				callback(err);
			}else{
				connection.query(sql,ops,callback);
				console.log('end the connection');
				connection.end();
			}
		}
	});
}

module.exports={
	query : query,
}
