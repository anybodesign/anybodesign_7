<?php if ( !defined('ABSPATH') ) die();
	
// ACF Blocks

add_action('acf/init', 'block_projects_init');
function block_projects_init() {

	if( function_exists('acf_register_block') ) {

		// projects block Text
		
		acf_register_block(array(
			'name'				=> 'projects',
			'title'				=> __('Projects', 'anybodesign'),
			'category'			=> 'media',
			'icon'				=> 'carrot',
            'mode'				=> 'edit',
            //'supports'			=> array( 'align' => array( 'wide', 'full' ), 'mode' => false),
            'keywords'			=> array( 'projects', 'projets' ),
            'render_template'   => FS_THEME_DIR . '/blocks/block-projects/templates/block-projects-tpl.php',
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