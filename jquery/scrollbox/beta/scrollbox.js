/**
 * $author:silenceper
 * $date 20130313
 *  图片滚动
 */
;$(function(){
	$.fn.scrollbox=function(options){
		var opts=$.extend(true,{},$.fn.scrollbox.defaults,options);
		var i=0;
		var timer;
		//将ul用div包围
		$(this).find('ul').wrap('<div></div>');
	
		var box=$(this).find('div:eq(0)');
		//li 的宽度
		var li_width=box.find('li:eq(0)').width();
		if(opts.scroll_width==null){
			opts.scroll_width=li_width*opts.n;
		}
		//li 的高度
		if(opts.scroll_height==null){
			opts.scroll_height=box.find('li:eq(0)').height();
		}
		//li的数量
		var li_num=$(this).find('ul > li').length;
		$(this).css({'position':'relative','width':opts.scroll_width+'px','height':opts.scroll_height+'px','overflow':'hidden'});
		//设置box样式
		box.css({'position':'absolute','width':li_width*li_num+'px','overflow':'hidden'});
		
		//滚动方法
		var start_scroll=function(){
			if(i >= li_num/3){
				box.animate({'left':'0px'},opts.speed);
				i=0;
			}
			//改变 btn
			$(opts.scroll_btn).find('ul > li').removeClass('cur');
			$(opts.scroll_btn).find('ul > li').eq(i).addClass('cur');
			box.animate({'left':-(i*opts.scroll_width)+'px'},opts.speed);
			i++;
			timer=setTimeout(function(){start_scroll()},opts.scroll_speed);
		};
		
		var stop_scroll=function(){
			//点击 按钮停止
			$(opts.scroll_btn).find('ul > li').click(function(){
				clearTimeout(timer);
				i=$(opts.scroll_btn).find('ul > li').index(this);
				start_scroll();
			});
		};
		start_scroll();
		stop_scroll();
	};
	$.fn.scrollbox.defaults={
		'n':3,
		'scroll_width':null,
		'scroll_height':null,
		'scroll_speed':8000,
		'scroll_btn':'#btn',
		'speed':1200,
	};
});
