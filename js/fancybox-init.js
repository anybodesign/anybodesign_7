jQuery(document).ready(function($) {
	
	$().fancybox({
		selector : '.fancypop',
		buttons : [
			'close'
		],
		beforeShow: function(){
			$('body').css({'overflow-y':'hidden'});
		},
		afterClose: function(){
			$('body').css({'overflow-y':'visible'});
		}
	});
	
	//$('.page-wrap').find("a:has(img)").attr('data-fancybox', '');
	$('body:not(.home) .page-wrap').find('figure a:has(img)').addClass('fancypop');
	
});