<?php defined('ABSPATH') or die(); 

function videojs_block_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group( array(
	'key' => 'group_55f74ac5b2163',
	'title' => 'Informations de la vidéo',
	'fields' => array(
		array(
			'key' => 'field_55f74ad498b00',
			'label' => 'Identifiant vidéo',
			'name' => 'video-js',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => 'Le nom du fichier vidéo sans l\'extension.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array(
			'key' => 'field_55fc1b5ba11a8',
			'label' => 'Url de base',
			'name' => 'video-url',
			'aria-label' => '',
			'type' => 'url',
			'instructions' => 'URL de base du serveur vidéo',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'https://motion.anybodesign.com',
			'placeholder' => 'https://motion.anybodesign.com',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'projet',
			),
			array(
				'param' => 'post_taxonomy',
				'operator' => '==',
				'value' => 'type-creation:motion-design',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/videojs',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );

endif;

}
add_action('acf/init', 'videojs_block_fields');