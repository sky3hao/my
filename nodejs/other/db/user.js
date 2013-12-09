var db=require('./db2');
db.query('select * from user',function(err,rows){
	if(err) throw err;
	console.log(rows);
});

var name='silenceper';
//db.query('select * from user where name='+db.pool.escape(name),function(err,rows){
//	console.log(rows);
//})

db.query('select * from user where name=?',name,function(err,rows,fields){
	console.log(rows);
})
