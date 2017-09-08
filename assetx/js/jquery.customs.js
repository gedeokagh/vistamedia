
jQuery(document).ready(function ($) {
	jQuery.browser={};(function(){jQuery.browser.msie=false;
	jQuery.browser.version=0;if(navigator.userAgent.match(/MSIE ([0-9]+)\./)){
	jQuery.browser.msie=true;jQuery.browser.version=RegExp.$1;}})();
	// Superfish
	if ($(".sf-menu")[0]) {
		$('.sf-menu').superfish({
			delay: 100,
			animation: {
				opacity: 'show', height: 'show'
			},
			speed: 300,
			autoArrows: true
		}).lavaLamp({
			fx: "easeOutExpo", 
			speed: 600,
			setOnClick: false,
			click: function(event, menuItem) {
				return true;
			}
		});
		$('a.sf-with-ul .sub').before('<span class="sf-sub-indicator"><i class="icon-angle-down"></i></span>');
	}

	// Nice Scrollbar
		$('body').prepend('<div id="div1"></div>');
		var nice = $("html").niceScroll({zindex:1000000,cursorborder:"0px solid #ccc",cursorborderradius:"2px",cursorcolor:"#ddd",cursoropacitymin:.1}); 
		$("#div1").html($("#div1").html());
		$('[class^="scroll-"], [class*=" scroll-"]').niceScroll({zindex:1000000,cursorborder:"",cursorborderradius:"2px",cursorcolor:"#121212",scrollspeed:100,cursoropacitymin:.4}); 

	// Responsive Menu
	$(".menu-head").before('<div id="mobilepro"><i class="icon-reorder icon-remove"></i></div>');
	$(".menu-head .sf-menu li").addClass('xpopdrop');
	$('#mobilepro').click(function () {
		$('.menu-head .sf-menu').slideToggle('slow', 'easeInOutExpo').toggleClass("xactive");
		$("#mobilepro i").toggleClass("icon-reorder");
	});
	$("body").click(function() {
		$('.menu-head .xactive').slideUp('slow', 'easeInOutExpo').removeClass("xactive");
		$("#mobilepro i").addClass("icon-reorder");
	});
	$('#mobilepro, .sf-menu').click(function(e) {
		e.stopPropagation();
	});
	function checkWindowSize() {
		if ($(window).width() > 752) {
			$('.menu-head .sf-menu').css('display', 'block').removeClass("xactive");
		} else {
			$('.menu-head .sf-menu').css('display', 'none');
		}
	}
	$(window).load(checkWindowSize);
	$(window).resize(checkWindowSize);
	
	
	// Sticky
	if ($(".sticky-header")[0]){
		$(window).scroll(function(){
			var wind_scr = $(window).scrollTop();
			var window_width = $(window).width();
			if (window_width > 760) {
				if(wind_scr < 200){
					if($('#header').data('sticky') === true){
						$('#header').data('sticky', false);
						$('#header').stop(true).animate({opacity : 0}, 150, function(){
							$(this).removeClass('sticky');
							$('#header').stop(true).animate({opacity : 1}, 300);
						});
					}
				} else {
					if($('#header').data('sticky') === false || typeof $('#header').data('sticky') === 'undefined'){
						$('#header').data('sticky', true);
						$('#header').stop(true).animate({opacity : 0},150,function(){
							$(this).addClass('sticky');
							$('#header.sticky').stop(true).animate({opacity : 08}, 300);
						});
					}
				}
			}
		});
		$(window).resize(function(){
			var window_width = $(window).width();
			if (window_width < 770) {
				if($('#header').hasClass('sticky')){
					$('#header').removeClass('sticky');
				}
			}
		});
	}
	
	// alert
	$('.closemsg').click(function(e) {
		e.preventDefault();
				
		$(this).parent().slideUp();
	});
	
	// fitVids
	$("body").fitVids();
	
	// Media Elements
	$('audio,video').mediaelementplayer();
	
	// Flickr Started
    $('#flickr_widget').flickrfeed('52617155@N08','', {
        limit: 12,
        title: false,
        date: false
    });
	
	// Accordion - Only One Opened
	$(".collapse-opened").collapse({show: function(){
			this.animate({
				opacity: 'toggle', 
				height: 'toggle'
			}, 300);
		},
		hide : function() {
			
			this.animate({
				opacity: 'toggle', 
				height: 'toggle'
			}, 300);
		}
	}); 
	
	//*** Tabs on Top Jquery ***//
	$(".tab_content").hide();$("ul.tabs li:first").addClass("active").show();$(".tab_content:first").show();$("ul.tabs li").click(function(){$("ul.tabs li").removeClass("active");
	$(this).addClass("active");$(".tab_content").hide();var activeTab=$(this).find("a").attr("href");$(activeTab).fadeIn();return false});


	//*** Tabs on Bottom Jquery ***//
	$(".tab_content-bottom").hide();$("ul.tabs-bottom li:first").addClass("active").show();$(".tab_content-bottom:first").show();$("ul.tabs-bottom li").click(function(){$("ul.tabs-bottom li").removeClass("active");
	$(this).addClass("active");$(".tab_content-bottom").hide();var activeTab=$(this).find("a").attr("href");$(activeTab).fadeIn();return false});	


	//*** Tabs on Left Jquery ***//
	$(".tab_content-left").hide();$("ul.tabs-left li:first").addClass("active").show();$(".tab_content-left:first").show();$("ul.tabs-left li").click(function(){$("ul.tabs-left li").removeClass("active");
	$(this).addClass("active");$(".tab_content-left").hide();var activeTab=$(this).find("a").attr("href");$(activeTab).fadeIn();return false});


	//*** Tabs on Right Jquery ***//
	$(".tab_content-right").hide();$("ul.tabs-right li:first").addClass("active").show();$(".tab_content-right:first").show();$("ul.tabs-right li").click(function(){$("ul.tabs-right li").removeClass("active");
	$(this).addClass("active");$(".tab_content-right").hide();var activeTab=$(this).find("a").attr("href");$(activeTab).fadeIn();return false});	
	
	//*** toggle ***//
	$(".toggle").click(function() {
		var parent = $(this).parent();
		var content = $(".toggle-content",this);
			if(parent.hasClass("single-toggles")) {
				$(".toggle-title-text",parent).addClass("hover-icon");
			}
			if(content.css("display") === "none") {
				if(parent.hasClass("single-toggles")) {
					$(".toggle-content",parent).slideUp(200);
					$(".toggle-arrow i",parent).removeClass("icon-angle-down");
					$(".toggle-arrow i",parent).addClass("icon-angle-right");
					$(".toggle-title-text",parent).addClass("hover-icon");
				}
				content.slideDown(200);
				$(".toggle-title-text",this).removeClass("hover-icon");
				$(".toggle-arrow i",this).removeClass("icon-angle-right");
				$(".toggle-arrow i",this).addClass("icon-angle-down");
			}
			else {
				content.slideUp(200);
				$(".toggle-title-text",this).addClass("hover-icon");
				$(".toggle-arrow i",this).removeClass("icon-angle-down");
				$(".toggle-arrow i",this).addClass("icon-angle-right");
			}
	});
	
	// tooltip
    $('.tooltips').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
    })

    // popover
    $("[data-toggle=popover]")
      .popover()
	
});

// to top
jQuery('.totop').click(function(){
	jQuery('html, body').animate({ scrollTop: 0 }, "slow");
});


$(document).ready(function(){
	/* Custom checkable */
	$('.styled-checkbox input, .styled-radio input').iCheck({
		checkboxClass: 'icheckbox',
		radioClass: 'iradio',
		increaseArea: '20%'
	});

	$("#submit").click(function (e) {
		e.preventDefault();	
		$("#submit-btn").trigger('click');
	});
	
	/* jQuery UI - Datepicker */
	$('input.date').datepicker();
	
	$('.search-toggle').click(function(){
		//get collapse content selector
		var collapse_content_selector = $(this).attr('id');					

		//make the collapse content to be shown or hide
		var toggle_switch = $(this);
		$(collapse_content_selector).toggle(function(){
			if($(this).css('display')=='none'){
							//change the button label to be 'Show'
			toggle_switch.html('<i class="icon-search"></i>');
			}else{
							//change the button label to be 'Hide'
			toggle_switch.html('<i class="icon-search"></i>');
			}
		});
	});
});



// ##################################
// INICTIALIZE CAROUSEL DETAILS PAGE
// #################################

$(function() {
	var $carousel = $('#gallery-carousel'),
		$pager = $('#pager');

	function getCenterThumb() {
		var $visible = $pager.triggerHandler( 'currentVisible' ),
			center = Math.floor($visible.length / 2);
		
		return center;
	}

	$carousel.carouFredSel({
		responsive: true,
		items: {
			visible: 1,
			width: 800,
			height: (380/800*100) + '%'
		},
		scroll: {
			fx: 'crossfade',
			onBefore: function( data ) {
				var src = data.items.visible.first().attr( 'src' );
				src = src.split( '/large/' ).join( '/small/' );

				$pager.trigger( 'slideTo', [ 'img[src="'+ src +'"]', -getCenterThumb() ] );
				$pager.find( 'img' ).removeClass( 'selected' );
			},
			onAfter: function() {
				$pager.find( 'img' ).eq( getCenterThumb() ).addClass( 'selected' );
			}
		},
		prev: {
			button: "#prev_btn2",
			key: "left"
		},
		next: {
			button: "#next_btn2",
			key: "right"
		},	
	});
	$pager.carouFredSel({
		width: '100%',
		auto: false,
		height: 120,
		items: {
			visible: 'odd'
		},
		onCreate: function() {
			var center = getCenterThumb();
			$pager.trigger( 'slideTo', [ -center, { duration: 0 } ] );
			$pager.find( 'img' ).eq( center ).addClass( 'selected' );
		}
	});
	$pager.find( 'img' ).click(function() {
		var src = $(this).attr( 'src' );
		src = src.split( '/small/' ).join( '/large/' );
		$carousel.trigger( 'slideTo', [ 'img[src="'+ src +'"]' ] );
	});
});

jQuery(function() {

	jQuery('#carousel').carouFredSel({
		width: '100%',
		direction   : "bottom",
		scroll : 400,
		items: {
			visible: '+4'
		},
		auto: {
			items: 1,
			timeoutDuration : 4000
		},
		prev: {
			button: '#prev1',
			items: 1
		},    
		next: {
			button: '#next1',
			items: 1
		}
	});
	
	jQuery('#carousel2').carouFredSel({
		width: '100%',
		direction   : "left",
		scroll : {
	        duration : 800
	    },
		items: {
			visible: 1
		},
		auto: {
			items: 1,
			timeoutDuration : 4000
		},
		prev: {
			button: '#prev2',
			items: 1
		},    
		next: {
			button: '#next2',
			items: 1
		}
	});

	/* Quotes
	================================================== */
    $('#quotes ul').carouFredSel({
        auto: false,
        width: '100%',
        pagination: "#quotes .pager",
        responsive: true,
        scroll: {
            fx: 'uncover-fade'
        },
        swipe: {
            onMouse: true,
            onTouch: true
        },
        items: {
            height: 'variable',
            start: 0
        }
    });
	
	/*-------------------------------------------------*/
	/* = Post Carousel
	/*-------------------------------------------------*/
	try {
		$('ul.carousel-post').jcarousel({
			scroll: 1
		});
	} catch(err) {

	}
	
	//Google Maps
	var $map = $('#map');
	if( $map.length ) {
		$map.gMap({
			address: 'No: 58 A, East Madison St, Baltimore, MD, USA',
			zoom: 12,
			scrollwheel: false,
			markers: [
				{ 'address' : 'No: 58 A, East Madison St, Baltimore, MD, USA' }
			]
		});
	}
	//Google Maps End

});



$(function()
{
	$('.scroll-pane').jScrollPane({showArrows: true});
});


//------------------------------
//Counter
//------------------------------
jQuery(function($) {
	$('.countprice').countTo({
		from: 5,
		to: 36,
		speed: 1000,
		refreshInterval: 50,
		onComplete: function(value) {
			console.debug(this);
		}
	});
	$('.counthotel').countTo({
		from: 1,
		to: 53,
		speed: 2000,
		refreshInterval: 50,
		onComplete: function(value) {
			console.debug(this);
		}
	});			
});


//------------------------------
//Custom select
//------------------------------
jQuery(document).ready(function(){
	jQuery('.mySelectBoxClass').customSelect();

	/* -OR- set a custom class name for the stylable element */
	//jQuery('.mySelectBoxClass').customSelect({customClass:'mySelectBoxClass'});
});

function mySelectUpdate(){
	setTimeout(function (){
		$('.mySelectBoxClass').trigger('update');
	}, 200);
}

$(window).resize(function() {
	mySelectUpdate();
});



//------------------------------
//Add rooms
//------------------------------
function addroom2(){
	$('.room2').addClass('block');
	$('.room2').removeClass('none');
	$('.addroom1').removeClass('block');
	$('.addroom1').addClass('none');
	
}
function removeroom2(){
	$('.room2').addClass('none');
	$('.room2').removeClass('block');
	
	$('.addroom1').removeClass('none');
	$('.addroom1').addClass('block');
}
function addroom3(){
	$('.room3').addClass('block');
	$('.room3').removeClass('none');
	
	$('.addroom2').removeClass('block');
	$('.addroom2').addClass('none');
}
function removeroom3(){
	$('.room3').addClass('none');
	$('.room3').removeClass('block');
	
	$('.addroom2').removeClass('none');
	$('.addroom2').addClass('block');			
}


/* ------------------------------------ DOCUMENT.READY ------------------------------- */
$(document).ready(function() {
	"use strict";

	// filter open-close
	$('.another-toggle').each(function(){
		if( $('h5',this).hasClass('active') ){
			$(this).find('.another-toggle-inner').show();
		}
	});
	$('.another-toggle h5').click(function(){
		if( $(this).hasClass('active') ){
			$(this).removeClass('active');
			$(this).next('.another-toggle-inner').slideUp();
		} else {
			$(this).addClass('active');
			$(this).next('.another-toggle-inner').slideDown();
		}
	});
	
}); // END___ document.ready


