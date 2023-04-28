// Get header & body

var header = document.getElementById('site_head');
var body = document.getElementsByTagName('body')[0];

// Get height position of the header

var head_height = header.offsetHeight;

// Add the 'sticky-nav' class to the body when you reach the scroll position. 
// Remove 'sticky-nav' when you leave the scroll position.

function stickyhead() {
	
	if (window.innerWidth > 959) {
		if (window.pageYOffset > window.innerHeight/1.5) {
			body.classList.add('sticky-nav');
			
			if ( body.classList.contains('home') ) {
				// lol
			} else {
				body.setAttribute('style', 'padding-top:'+head_height+'px;');
			}
			
		} else {
			body.classList.remove('sticky-nav');
			
			if ( body.classList.contains('home') ) {
				// lol
			} else {
				body.removeAttribute('style');
			}
		}
	}
	
}

// When user scrolls the page

window.onscroll = function() { stickyhead(); };