jQuery(document).ready(function($) {
	
	$('.portfolio').on('change', function() {
		var hash = $('.portfolio:checked').map(function() {
    		return this.value;
    	}).toArray();
		var parent = $('.page-wrap');
		
    	hash = hash.join("-");
    	location.hash = hash;
		// alert(hash);
		parent.removeClass('graphisme').removeClass('web-design').removeClass('motion-design');
		parent.addClass(this.value);
	});
	
	if (location.hash !== '') {
		var hash = location.hash.substr(1).split('-');
    	hash.forEach(function(value) {
    		$('input[value=' + value + ']').prop('checked', true);
			$('.page-wrap').addClass(value);
    	});
	}
	
	$('#reset').on('click', function() {
		history.pushState('', document.title, window.location.pathname);
		$('.page-wrap').removeClass('graphisme').removeClass('web-design').removeClass('motion-design');
	});
	
});