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