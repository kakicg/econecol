
/* !stack ------------------------------------------------------------------- */
/* 全てのスマホで幅320px(iphone)相当に見えるようにdpiを調整 */
jQuery(document).ready(function($) {
	pageScroll();
	rollover();
	common();
});

$(function() { //IE8のalpha使用時に発生の黒枠を消す
    if(navigator.userAgent.indexOf("MSIE") != -1) {
        $('img').each(function() {
            if($(this).attr('src').indexOf('.png') != -1) {
                $(this).css({
                    'filter': 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src="' +
                    $(this).attr('src') +
                    '", sizingMethod="scale");'
                });
            }
        });
    }
});	

/* !isUA -------------------------------------------------------------------- */
var isUA = (function(){
	var ua = navigator.userAgent.toLowerCase();
	indexOfKey = function(key){ return (ua.indexOf(key) != -1)? true: false;}
	var o = {};
	o.ie      = function(){ return indexOfKey("msie"); }
	o.fx      = function(){ return indexOfKey("firefox"); }
	o.chrome  = function(){ return indexOfKey("chrome"); }
	o.opera   = function(){ return indexOfKey("opera"); }
	o.android = function(){ return indexOfKey("android"); }
	o.ipad    = function(){ return indexOfKey("ipad"); }
	o.ipod    = function(){ return indexOfKey("ipod"); }
	o.iphone  = function(){ return indexOfKey("iphone"); }
	return o;
})();

/* !rollover ---------------------------------------------------------------- */
var rollover = function(){
	var suffix = { normal : '_no.', over   : '_on.'}
	$('a.over, img.over, input.over').each(function(){
		var a = null;
		var img = null;

		var elem = $(this).get(0);
		if( elem.nodeName.toLowerCase() == 'a' ){
			a = $(this);
			img = $('img',this);
		}else if( elem.nodeName.toLowerCase() == 'img' || elem.nodeName.toLowerCase() == 'input' ){
			img = $(this);
		}

		var src_no = img.attr('src');
		var src_on = src_no.replace(suffix.normal, suffix.over);

		if( elem.nodeName.toLowerCase() == 'a' ){
			a.bind("mouseover focus",function(){ img.attr('src',src_on); })
			 .bind("mouseout blur",  function(){ img.attr('src',src_no); });
		}else if( elem.nodeName.toLowerCase() == 'img' ){
			img.bind("mouseover",function(){ img.attr('src',src_on); })
			   .bind("mouseout", function(){ img.attr('src',src_no); });
		}else if( elem.nodeName.toLowerCase() == 'input' ){
			img.bind("mouseover focus",function(){ img.attr('src',src_on); })
			   .bind("mouseout blur",  function(){ img.attr('src',src_no); });
		}
		var cacheimg = document.createElement('img');
		cacheimg.src = src_on;
	})
};

/* !pageScroll -------------------------------------------------------------- */
var pageScroll = function(){
	jQuery.easing.easeInOutCubic = function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	}; 
	$('a.scroll, .scroll a').each(function(){
		$(this).bind("click keypress",function(e){
			e.preventDefault();
			var target  = $(this).attr('href');
			var parent  = ( isUA.opera() )? (document.compatMode == 'BackCompat') ? 'body': 'html' : 'html,body';
			$(parent).animate(
				{scrollTop: targetY },
				400
			);
			return false;
		});
	});
	
	$('.pagetop a').click(function(){
		$('html,body').animate({scrollTop: 0}, 'slow','swing');
		return false;
	});
}


/* !common --------------------------------------------------- */
var common = (function(){
	//tab
	var id = getUrlParam('id');

	if($('#' + id).length > 0){
		$('.tabnaviitem').removeClass('on')
		$('[href="#' + id + '"]').addClass('on')
		$('.tabbox').hide()
		$('#' + id).show()
	}

	
	$(function(){
		$('.comtoggle').click(function(){
			if($(this).hasClass("on")){
				$(this).next().stop().slideUp(200);
				$(this).removeClass("on");
			}else{
				$(this).next().stop().slideDown(200);
				$(this).addClass("on");
			}
		});
	});
	
	$(window).on('load scroll', function () {
			var st = $(this).scrollTop();
			var showlinetop = $('.contents').offset().top;
			if(st >= showlinetop){
			$('#wrapper').addClass('show')
			}else{
				$('#wrapper').removeClass('show')
			}
	});
	
	
	$('.navbar-toggle').on('click',function(){
		var target = $(this).data('target');
		if($(target).hasClass("on")){
			$(target).stop().slideUp(200).removeClass("on");
			$(this).removeClass("on");
		}else{
			$(target).stop().slideDown(200).addClass("on");
			$(this).addClass("on");
		}
		
	});
	
	$('.menuclose').on('click',function(){
		if($('.navbar-collapse').hasClass("on")){
			$('.navbar-collapse').stop().slideUp(200).removeClass("on");
			$(this).removeClass("on");
		}else{
			$('.navbar-collapse').stop().slideDown(200).addClass("on");
			$(this).addClass("on");
		}
	});
	
	$('.menubtn').on('click',function(){
		if($('.navbar-collapse').hasClass("on")){
			$('.navbar-collapse').stop().slideUp(200).removeClass("on");
			$(this).removeClass("on");
		}else{
			$('.navbar-collapse').stop().slideDown(200).addClass("on");
			$(this).addClass("on");
		}
	});
	
	$('.menulist li a').on('click',function(){
		if($('.navbar-collapse').hasClass("on")){
			$('.navbar-collapse').stop().slideUp(200).removeClass("on");
			$(this).removeClass("on");
		}else{
			$('.navbar-collapse').stop().slideDown(200).addClass("on");
			$(this).addClass("on");
		}
	});

	$(function() {

	$(window).resize(function (event) {
		switchImage($('.visible-ts').css('display') == 'block');
	});
	switchImage($('.visible-ts').css('display') == 'block');
	function switchImage(isVisible_header) {
		$('img').each(function (index) {
			var pc = $(this).attr('src').replace('_ts.', '_pc.');
			var ts = $(this).attr('src').replace('_pc.', '_ts.');
			if (!isVisible_header) {
				$(this).attr("src",pc);
			}else {

				$(this).attr("src",ts);
			}
		});
	}
});
	
});



function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var result = window.location.search.substr(1).match(reg);
    return result ? decodeURIComponent(result[2]) : null;
}