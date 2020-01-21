/*
Autor: Carlos Alberto Rodriguez Laiton
*/
(function($){
	$.fn.scrollcarousel = function(options) {
		var defaults = {
			animationTime: 500,
			quantity:5,
			sizes : new Array(),
		}
		$(this).each(function(){
			var element = $(this);
			var settings = $.extend({}, defaults, options);
			var interval ;
			/*element.find(".right_scroll").click(function(){rotate('Right');});
			/*element.find(".left_scroll").click(function(){rotate('Left');});*/
			element.find(".left_scroll").on("mousedown",function(){ interval = setInterval(function(){rotate('Left');},100); });
			element.find(".left_scroll").on("mouseup",function(){ clearInterval(interval); });

			element.find(".right_scroll").on("mousedown",function(){ interval = setInterval(function(){rotate('Right');},100); });
			element.find(".right_scroll").on("mouseup",function(){ clearInterval(interval); });
			function init(){
				defineWidth();
			}
			function defineWidth(){
            
				if(settings.sizes.length === 0){
					width = (element.find('.scrollcarousel_inner').outerWidth()/settings.quantity);
				} else {
					widthWindow= $(window).width();
					current='';
					higher='';
					$.each(settings.sizes,function(k,v){
						if(parseInt(k)>= parseInt(widthWindow)){
							if(parseInt(k)<parseInt(current) || current == ''){
								current = k;
							}
						}
						if(higher=='' || parseInt(k) >parseInt(higher)){
							higher = k ;
						}
					});
					if(current!='' && parseInt(higher) >= parseInt($(window).width()) ){
						if(parseInt(settings.sizes[current])>0){
							width = (element.find('.scrollcarousel_inner').outerWidth()/settings.sizes[current]);
						}else{
							width = (element.find('.scrollcarousel_inner').outerWidth()/settings.quantity);
						}
					}else{
						width = (element.find('.scrollcarousel_inner').outerWidth()/settings.quantity);
					}
                }
                var elementos = element.find('ul li').length;
                element.find('ul').css({'width': (width*elementos)+"px" });
				element.find('ul li').css({'width': width+"px" });
			}

			function rotate(direction){
				var item_width = parseInt(element.find('ul li').outerWidth()) + parseInt(element.find('ul li').css("marginLeft"))+ parseInt(element.find('ul li').css("marginRight"));
                var actual = element.find('.scrollcarousel_inner').scrollLeft();
                var final = element.find('.scrollcarousel_inner ul').width() -  element.find('.scrollcarousel_inner').width(); 
                if(direction=='Left'){
                    if(actual != 0){
                        var left_indent = actual - item_width;
                        element.find('.scrollcarousel_inner:not(:animated)').animate({'scrollLeft' : left_indent},settings.animationTime);
                        element.find(".right_scroll").removeClass("disable");
                        element.find(".left_scroll").removeClass("disable");
                    } else {
                        element.find(".left_scroll").addClass("disable");
                    }
			
				}else{
					if(actual < final){
                        var left_indent = actual + item_width;
                        element.find('.scrollcarousel_inner:not(:animated)').animate({'scrollLeft' : left_indent},settings.animationTime);
                        element.find(".right_scroll").removeClass("disable");
                        element.find(".left_scroll").removeClass("disable");
                    } else {
                        element.find(".right_scroll").addClass("disable");
                    }
				}
			}

			init();
			$( window ).resize(function() { defineWidth();});
		});
	}

})(jQuery);