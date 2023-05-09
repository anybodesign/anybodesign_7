<?php if ( !defined('ABSPATH') ) die();
	
// ACF Blocks

add_action('acf/init', 'block_videojs_init');
function block_videojs_init() {

	if( function_exists('acf_register_block') ) {

		// videojs block Text
		
		acf_register_block(array(
			'name'				=> 'videojs',
			'title'				=> __('Video JS Player', 'anybodesign'),
			'category'			=> 'media',
			'icon'				=> 'editor-video',
            'mode'				=> 'auto',
            //'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'videojs', 'projets' ),
            'render_template'   => FS_THEME_DIR . '/blocks/block-videojs/templates/block-videojs-tpl.php',
			'enqueue_assets'	=> 'ad_videojs_assets',
			'example' 			=> array(
									'attributes'		=> array(
										'mode'			=> 'preview',
										'data'			=> array(
											'__is_preview'	=> true,
										),
									)
			),
		));
		
	}	
}

// Load assets
	
function ad_videojs_assets() {

	wp_register_style( 
		'video-js-css', 
		FS_THEME_URL . '/blocks/block-videojs/css/video-js.css', 
		array(), 
		'8.3.0', 
		'screen'
	);
    wp_register_script( 
	    	'video-js', 
	    	FS_THEME_URL . '/blocks/block-videojs/js/video.min.js',
	    	array('jquery'), 
	    	'8.3.0', 
	    	true
    );

	wp_enqueue_style( 'video-js-css' );
	wp_enqueue_script( 'video-js' );
		    
}