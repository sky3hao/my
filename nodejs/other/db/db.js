var mysql=require('mysql');
var pool  = mysql.createPool({
  host     : 'localhost',
  user     : 'root',
  password : '123',
  database : 'node_1'
});
/**
 * 尝试对mysql pool中的query进行封装  
 * 一次执行多条query 会产生多次connection
 */
var query=function(){
	var args = arguments;
	pool.getConnection(function(err,connection){
		if(args.length==2){
			var sql=args[0];
			var callback=args[1];
			if(err){
				connection.release();
				callback(err);
			}else{
				connection.query(sql,callback);
				console.log('release db conn');
				connection.release();
			}
		}else if(args.length==3){
			var sql=args[0];
			var ops=args[1];
			var callback=args[2];
			if(err){
				connection.release();
				callback(err);
			}else{
				connection.query(sql,ops,callback);
				console.log('release db conn');
				connection.release();
			}
		}
	});
}

module.exports={
	query:query,
	pool:pool
}
