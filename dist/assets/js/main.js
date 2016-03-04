// 'use strict';

// var app = (function(document, $) {

// 	var docElem = document.documentElement,
// 	$body = $('body'),
// 	_userAgentInit : function() {
// 		docElem.setAttribute('data-useragent', navigator.userAgent);
// 	},

// 	_scroll : function(){
			
// 			$('.anchor').on('click', function(event){     
// 			    event.preventDefault();
// 			    $('html,body').animate({scrollTop:$(this.hash).offset().top - 100}, 1000);
// 			});

// 			$(function(){
// 			    $('#site-header').data('size','big');
// 			});

// 			$(window).scroll(function(){
			 
// 			    if($(document).scrollTop() > 0)
// 			    {
// 			        if($('#site-header').data('size') == 'big')
// 			        {
// 			            $('#site-header').data('size','small');
// 			            $('#site-header').stop().animate({
// 			                height:'100px'
// 			            },300);
// 			        }
// 			    }
// 			    else
// 			    {
// 			        if($('#site-header').data('size') == 'small')
// 			        {
// 			            $('#site-header').data('size','big');
// 			            $('#site-header').stop().animate({
// 			                height:'0'
// 			            },300);
// 			        }  
// 			    }
// 			});
// 	},

// 	_animation : function(){
		
// 		var wow = new WOW(
// 		    {
// 		      boxClass:     'wow',      // default
// 		      animateClass: 'animated', // default
// 		      mobile:       true,       
// 		      live:         true        // default
// 		    }
// 		);

// 		wow.init();
// 	},

// 	_nav_fullscreen : function(){
		
// 		$('#toggle').on('click', function() {
// 		 alert('hole');
// 		   $(this).toggleClass('active');
// 		   $('#overlay').toggleClass('open');
// 		});
// 	},

// 	_index_post_hover : function(){

// 		var items = $('.thumbnail');
		
// 		items.on('click', function(e){
			
// 			e.preventDefault();
// 			var overlay = $(this).find('.box-overlay');

// 			overlay.addClass('show_me');
			
// 		});

// 		$(document).mouseup(function (e){

// 			var overlay = $('.show_me');

// 			if (!overlay.is(e.target) && overlay.has(e.target).length === 0){
// 		        overlay.removeClass('show_me');
// 		    }

// 		});
// 	},


//  	_init : function() {
//  		_scroll();
//  		_animation();
//  		_nav_fullscreen();
//  		_index_post_hover();

// 	};

// return {
// 	init: _init
// };
// })(document, jQuery);

// (function() {
// 	app.init();
// })();


var common = {
   

	_scroll: function(){
			
			$('.anchor').on('click', function(event){     
			    event.preventDefault();
			    $('html,body').animate({scrollTop:$(this.hash).offset().top - 150}, 1000);
			});

			var home_header_bg = $('.home #header-bg, .single #header-bg');
			var site_header = $('.home #site-header, .single #site-header');
			var logo_header = $('.home .logo_header, .single .logo_header');

			$(function(){
			    home_header_bg.data('size','big');
			});

			$(window).scroll(function(){
			 
			    if($(document).scrollTop() > 0)
			    {
			        if(home_header_bg.data('size') == 'big')
			        {
			            home_header_bg.data('size','small');
			            home_header_bg.stop().animate({
			                height:'100px'
			            },300).css('border-bottom', '2px solid #000');
			            site_header.toggleClass('header-open');
			            logo_header.toggleClass('hide');
			        }
				}
			    else
			    {
			        if(home_header_bg.data('size') == 'small')
			        {
			            home_header_bg.data('size','big');
			            home_header_bg.stop().animate({
			                height:'0'
			            },300).css('border-bottom', 'none');
			            site_header.toggleClass('header-open');
			            logo_header.toggleClass('hide');	
			        }  
				}
			});
	},

	_animation : function(){
		
		var wow = new WOW(
		    {
		      boxClass:     'wow',      // default
		      animateClass: 'animated', // default
		      mobile:       true,       
		      live:         true        // default
		    }
		);

		wow.init();
	},

	_nav_fullscreen : function(){
		
		$('#toggle').on('click', function() {
		
		   $(this).toggleClass('active');
		   $('#overlay').toggleClass('open');
		});
	},

	_index_post_hover : function(){

		var items = $('.thumbnail');
		
		$(document).on('click','.thumbnail', function(e){
			// e.preventDefault();
			var overlay = $(this).find('.box-overlay');

			overlay.addClass('show_me');
			
		});

		$(document).mouseup(function (e){

			var overlay = $('.show_me');

			if (!overlay.is(e.target) && overlay.has(e.target).length === 0){
		        overlay.removeClass('show_me');
		    }

		});

		$(document).on('click', function (event) {
 
		    var clickover = $(event.target);
		    var $navbar = $(".navbar-collapse");               
		    var _opened = $navbar.hasClass("in");

		    if ( _opened === true && !clickover.hasClass("navbar-toggle")  ) {      
		        $navbar.collapse('hide');
		        // console.log($(this));
		    }
		});

	},

	init : function() 
    {	
        common. _scroll();
 		common._animation();
 		common._nav_fullscreen();
 		common._index_post_hover();
    }

}
{
    $(window).load(function() {
        common.init();
    });
}









	



	