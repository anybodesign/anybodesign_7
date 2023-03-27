jQuery(document).ready(function($) {
	
	
	// Responsive Main Menu

	$('#menu_toggle').click(function() {
		$(this).toggleClass('menu-opened');
			
			if ($(this).hasClass('menu-opened')) {
				$(this).attr('aria-expanded','true');
				$('.main-menu').attr('aria-hidden','false');
			} else {
				$(this).attr('aria-expanded','false');
				$('.main-menu').attr('aria-hidden','true');
			}
			
		return false;
	});

		$(window).resize(function() {
			if ($(window).width() > 996) {
		    	$('.main-menu').show().removeAttr('style').removeAttr('aria-hidden');
		    	$('.sub-menu').show().removeAttr('style');
		    	$('#menu_toggle').removeClass('menu-opened').removeAttr('aria-expanded');
			}
		});
	
	
	// A11y active label on nav items
	
	var $el = 'li.current-menu-item > a, li.current-page-ancestor > a, li.current_page_item > a, li.current_page_parent > a, li.current-cat > a';
	var $lang = 'Active';
	
	if ( $('html').attr('lang') === 'fr-FR' ) {
		$lang = 'Actif';
	}
	
	$($el).append('<span class="a11y-hidden"> - '+$lang+'</span>');


	// Toggle sidebar

	$('#sidebar_toggle').click(function() {
		$(this).toggleClass('menu-opened');
			
			if ($(this).hasClass('menu-opened')) {
				$(this).attr('aria-expanded','true');
				$('.page-sidebar').attr('aria-hidden','false');
			} else {
				$(this).attr('aria-expanded','false');
				$('.page-sidebar').attr('aria-hidden','true');
			}
			
		return false;
	});
		$(window).resize(function() {
			if ($(window).width() > 960) {
		    	$('.page-sidebar').show().removeAttr('style').removeAttr('aria-hidden');
		    	$('#sidebar_toggle').removeClass('menu-opened').removeAttr('aria-expanded');
			}
		});

	
	// Back2top (Option)
	
	$('#back2top').click(function() {
		$('body,html').animate({ scrollTop: '1px' });
		return false;
	});
		
	function back2top() {
	    var topscreen = $(this).scrollTop();
		
	    if ( topscreen >= 250 ) {
			$('body').addClass('back2top-btn');
	    } else {
	        $('body').removeClass('back2top-btn');
	    }
	}
		
	$(window).on('scroll',function() {		
		back2top();
	});
	
	// Scroll Down
	
	function scrollDown(anchorID) {
		
		var target = $(anchorID);
		var targetSpeed = 1000;
		
		$('html,body').animate({scrollTop: target.offset().top}, targetSpeed);
	}

	$('.scroll-down').on('click', function() {
		var targetID = '#site_main';
		scrollDown( targetID );
		
		return false;
	});	
	
	
	// Responsive Video Players (Youtube, Vimeo)
	
	function resizevid(){
		
		$("iframe").each(function() {
			
			if($(this).is("[src*=youtube], [src*=vimeo]")) {
				var yt_width = $(this).width();
				$( this ).attr('style','height: '+yt_width/1.77+'px');
			}
		});
	}
		
	$(window).on('load',function() {		
		resizevid();
	});	
		
	$(window).on('resize',function() {
		resizevid();
	});	
	

});