$(function(){
	//计时器
	var timer;
	//li 的总共数量
	var li_num=$('.box ul li').length;
	var n=3;
	var i=0;
	var li_width=$('.box ul li').width();
	//滚动速度
	var speed=1000;
	//轮转速度
	var autospeed=4000;

	//总的 li的长度  img
	var box_width=li_width*li_num;
	$('.box').css({'width':box_width+'px','position':'absolute'});
	$('.show_box').css({'width':li_width*n});

	//btn 的li
	var btn_li_num=$('.btn ul li').length;


	//轮转
	function autoroll(){
		if(i>(li_num/n)-1){
			//复位
			$('.box').animate({'left':'0px'},speed);
			i=0;
		}
		$('.btn ul li').removeClass('cur');
		$('.btn ul li').eq(i).addClass('cur');
		$('.box').animate({'left':-i*n*li_width+'px'},speed);
		i++;
		timer=setTimeout(autoroll,autospeed);
	}

	function stoproll(){
		$('.btn ul li').click(function(){
			clearTimeout(timer);
			i=$('.btn ul li').index(this);
			autoroll();	
		});
	}

	autoroll();
	stoproll();
});
