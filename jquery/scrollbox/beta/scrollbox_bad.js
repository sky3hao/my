;$(function(){
	var methods={
		init:function(settings){
			 return this.each(function(){
					//合并参数
					this.opt=$.extend(true,{},$.fn.scrollbox.defaults,settings);
					//ul li 被div包含
					methods.wrap_ul.call(this);
					var i=0;
					var timer;
				
					function scroll(that){
						if( i >= that.opt.n){
							that.box.css({'left':'0px'});	
							i=0;
						}
						that.box.animate({'left':-that.opt.scroll_width*i+'px'},1000);	
						i++;
						setTimeout(function(){scroll(that)},that.opt.autospeed);
					}
					scroll(this);
				});
			},
		wrap_ul:function(){
			var that=$(this);
			that.find('ul').wrap('<div></div>');
			//包含ul的 div
			var box=that.find('div').eq(0);
			this.box=box;
			//单个li 的数量
			this.opt.li_num=box.find('ul> li').length;
			//单个li 的宽度   需要在样式中获取
			this.opt.li_width=box.find('ul > li:eq(0)').width();
			//单个li 的高度
			this.opt.li_height=box.find('ul > li:eq(0)').height();

			if(this.opt.scroll_height==null){
				this.opt.scroll_height=this.opt.li_height;
			}
			
			if(this.opt.scroll_width==null){
				this.opt.scroll_width=this.opt.li_width*this.opt.n;
			}
			
			that.css({'position':'relative','width':this.opt.scroll_width+'px','overflow':'hidden','height':this.opt.scroll_height});
			
			//li float:left 这里不设置 float:left   否则 获取li的长度将变为 最外层的div的宽度 所以float 在 html中设置
			//box.find('ul li').css({'float':'left'});
			
			//设置box的样式
			box.css({'position':'absolute','width':this.opt.li_width*this.opt.li_num+'px'});
		},
	};

	//scrollbox
	$.fn.scrollbox=function(method){
		if(methods[method]){
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		}else if(typeof method === 'object' || !method){
			return methods.init.apply( this, arguments );
		}else{
			$.error( 'Method ' + method + ' does not exist on jQuery pulgin' ); 
		}
	};
	//默认配置
	$.fn.scrollbox.defaults={
		//一次显示几个 li
		'n':3,
		// $(this)的height
		'scroll_height':null,
		'scroll_width':null,
		'scroll_speed':3000,
	}
});
