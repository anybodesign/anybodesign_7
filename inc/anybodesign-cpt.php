<?php defined('ABSPATH') or die(); 

// Flush Rewrites

function activate_ad_cpt() {
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'activate_ad_cpt' );
add_action( 'init', 'activate_ad_cpt' );


// CPT

class AD_CPT {
	
	function __construct() {	}
	
	function init() {
		add_action( 'init', array( $this, 'ad_cpt_portfolio'), 1 );
		add_action( 'init', array( $this, 'ad_custom_taxonomy'), 1 );
		
		add_filter( 'enter_title_here', array( $this, 'ad_change_title_text' ) );
	}

	/**
	*
	*	Register Custom Post Type 
	*
	**/
	
	
	function ad_cpt_portfolio() {

		$labels = array(
			'name'                  => _x( 'Portfolio', 'Post Type General Name', 'anybodesign' ),
			'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'anybodesign' ),
			'menu_name'             => __( 'Portfolio', 'anybodesign' ),
			'name_admin_bar'        => __( 'Portfolio', 'anybodesign' ),
			'archives'              => __( 'Portfolio', 'anybodesign' ),
		);
		$rewrite = array(
			'slug'                  => 'portfolio',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Portfolio', 'anybodesign' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
			'taxonomies'            => array( 'type-creation' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-carrot',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => 'portfolio-anybodesign',
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
		);
		register_post_type( 'projet', $args );
	}
	

	/**
	*
	*	Custom Enter title here
	*
	**/

	
	function ad_change_title_text( $title ) {
		$screen = get_current_screen();
		
		if( 'portfolio' == $screen->post_type ) {
			$title = __('Choose a title for this project', 'anybodesign');
		}
		
		return $title;
	}


	/**
	*
	*	Register Custom Taxonomy
	*
	**/
	
	function ad_custom_taxonomy() {
		
		$labels = array(
			'name'                       => _x( 'Creation Categories', 'Taxonomy General Name', 'anybodesign' ),
			'singular_name'              => _x( 'Creation Category', 'Taxonomy Singular Name', 'anybodesign' ),
			'menu_name'                  => __( 'Creation Categories', 'anybodesign' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'show_in_rest'               => true,
			'rewrite'                    => array( 'slug' => 'creations' ),
		);
		register_taxonomy( 'type-creation', array( 'projet' ), $args );
		
	}
	
	
}

$ad_cpt = new AD_CPT();
$ad_cpt->init();