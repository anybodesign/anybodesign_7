<?php if ( !defined('ABSPATH') ) die();
	
define( 'FS_THEME_VERSION', '7.0' );
define( 'FS_THEME_DIR', get_template_directory() );
define( 'FS_THEME_URL', get_template_directory_uri() );

// ------------------------
// Theme Setup
// ------------------------

if ( ! isset( $content_width ) )
	$content_width = 2048;


if ( ! function_exists( 'fs_setup' ) ) :

function fs_setup() {
	
	// I18n
	
	load_theme_textdomain( 'anybodesign', FS_THEME_DIR . '/languages' );
	
	
	// Theme Support
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	add_theme_support( 'customize-selective-refresh-widgets' );

	// Gutenberg support 
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	
	// Remove widgets blocks
	remove_theme_support( 'widgets-block-editor' );
	
	// Remove fucking patterns 
	remove_theme_support( 'core-block-patterns' );
}
endif;
add_action( 'after_setup_theme', 'fs_setup' );


// Block Patterns Example

// function fs_register_blocks_patterns() {
// 	register_block_pattern(
// 		'my-pattern',
// 		array(
//     		'title'       => __( 'My pattern', 'anybodesign' ),
//     		'description' => _x( 'Yolo', 'anybodesign' ),
//     		'content'     => '<!-- wp:paragraph {"fontSize":"large"} -->
// <p class="has-large-font-size">Etiam porta sem malesuada magna mollis euismod. Maecenas faucibus mollis interdum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper.  </p>
// <!-- /wp:paragraph -->
// 
// <!-- wp:paragraph {"fontSize":"medium"} -->
// <p class="has-medium-font-size">Nulla vitae elit libero, a pharetra augue. Curabitur blandit tempus porttitor. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
// <!-- /wp:paragraph -->',
// 		)
// 	);
// }
// add_action( 'init', 'fs_register_blocks_patterns' );


// Gutenberg editor styles

function fs_block_editor_styles() {
    wp_enqueue_style( 
    	'fs_block_editor_styles',
    	FS_THEME_URL .'/css/block-editor-style.css', 
    	false, 
    	FS_THEME_VERSION, 
    	'screen'
    );
}
add_action( 'enqueue_block_editor_assets', 'fs_block_editor_styles' );


// Gutenberg allowed blocks

function fs_allowed_blocks() {
    wp_enqueue_script(
        'byebyeblocks',
		FS_THEME_URL . '/js/byebyeblocks.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), 
        FS_THEME_VERSION
    );
}
add_action( 'enqueue_block_editor_assets', 'fs_allowed_blocks' );


//	Admin style and script

add_action('admin_enqueue_scripts', 'fs_acf_admin_css', 11 );
function fs_acf_admin_css() {
	wp_enqueue_style( 'admin-css', FS_THEME_URL . '/css/admin.css' );
}

// WordPress no bloody fullscreen

if (is_admin()) {
	function fs_disable_bloody_fullscreen() {
		$script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
		wp_add_inline_script( 'wp-blocks', $script );
	}
	add_action( 'enqueue_block_editor_assets', 'fs_disable_bloody_fullscreen' );
}

// ------------------------
// JS & CSS
// ------------------------

function fs_scripts_load() {
    if (!is_admin()) {
		
		// Register JS
		// ------------------------
			
			// Scroll-Out
			
			wp_register_script(
				'scrollout', 
				FS_THEME_URL . '/js/scroll-out.min.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			
			// IAS
			
			wp_register_script(
				'ias', 
				FS_THEME_URL . '/js/infinite-ajax-scroll.min.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			wp_register_script(
				'ias-fs-init', 
				FS_THEME_URL . '/js/infinite-ajax-scroll-init.js', 
				array('ias'), 
				FS_THEME_VERSION, 
				true
			);
			
			// Sticky Nav
			
			wp_register_script(
				'stickynav', 
				FS_THEME_URL . '/js/sticky-header.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			
			// Other stuff
			
			wp_register_script(
				'skiplink-focus-fix', 
				FS_THEME_URL . '/js/skip-link-focus-fix.js', 
				array(), 
				FS_THEME_VERSION, 
				true
			);
			
			// Main
			
		    wp_register_script( 
		    	'main', 
		    	FS_THEME_URL . '/js/main.js',
		    	array('jquery'), 
		    	FS_THEME_VERSION, 
		    	true
		    );
			
			
		// Register CSS
		// ------------------------
			
			// 
			
			
		// Enqueue JS
		// ------------------------
			
			wp_enqueue_script( 'jquery' );
			
			// IAS 
			
			$has_pages = get_the_posts_pagination();
			if (! empty( $has_pages) ) {
				if ( is_home() || is_archive() || is_search() || is_tax() ) {
					wp_enqueue_script( 'ias' );
					wp_enqueue_script( 'ias-fs-init' );
				}
			}
			
			// Scrollout 
			
			wp_enqueue_script( 'scrollout' );
			function fs_scrollout_js() {
				print '
				<script>
					ScrollOut({
						targets: "section, .post-block, hr, .wpcf7-form",
						once: true,
					});
				</script>
				';
			}
			add_action('wp_footer', 'fs_scrollout_js', 100);
			
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		    
			wp_enqueue_script( 'stickynav' );
			wp_enqueue_script( 'skiplink-focus-fix' );
			wp_enqueue_script( 'main' );			
			
			
		// Enqueue CSS
		// ------------------------
			
			// Deregister Fuckin Bullshit
			wp_dequeue_style( 'global-styles' );
			wp_deregister_style( 'global-styles' );
			
	}
}    
add_action( 'wp_enqueue_scripts', 'fs_scripts_load' );


// Main stylesheet

function fs_main_style() {
		
		wp_register_style( 
			'anybodesign-style', 
			get_stylesheet_uri(), 
			array(), 
			FS_THEME_VERSION, 
			'screen'
		);
		
		wp_enqueue_style( 'anybodesign-style' );
}
add_action( 'wp_enqueue_scripts', 'fs_main_style' );


// ------------------------
// Theme Stuff
// ------------------------


// CPT

include_once( FS_THEME_DIR . '/inc/anybodesign-cpt.php' );

// Register Navigation Menus

function fs_custom_nav_menus() {

	$locations = array(
		'main_menu' =>  esc_html__( 'Main Menu', 'anybodesign' ),
		'footer_menu' => esc_html__( 'Footer Menu', 'anybodesign' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'fs_custom_nav_menus' );

// Nav highlights fix

function fs_nav_classes( $classes, $item ) {
    
	$blogpage = get_option( 'page_for_posts' );
	$blogpage_content = get_post( $blogpage );
	
	if (is_404()) {
		$itemname = esc_html__( 'Oops! That page can&rsquo;t be found', 'anybodesign' );
	} else {
		$itemname = $blogpage_content->post_title;
	}
	
	// Remove active state on page for posts
    if( ( is_post_type_archive() || is_tax() || is_404() || is_search() || is_singular() ) && $item->title == $itemname ) {
        $classes = array_diff( $classes, array( 'current_page_parent' ) );
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'fs_nav_classes', 10, 2 );


// CPT highlights

function fs_custom_active_item_classes($classes = array(), $menu_item = false) {            
    global $post;
	if ( is_singular() ) {
    	$classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'current-menu-item' : '';
	}
    return $classes;
}
add_filter( 'nav_menu_css_class', 'fs_custom_active_item_classes', 10, 2 );


// Nav tag for widget menus

function fs_modify_nav_menu_args( $args ) {

	if( empty ( $args['theme_location'] ) ) {
		$args['container'] = 'nav';
	}
	return $args;
}
add_filter( 'wp_nav_menu_args', 'fs_modify_nav_menu_args' );


// Sub-menus Walker

include_once( FS_THEME_DIR . '/inc/subnav-walker.php' );


// Extended Search

include_once( FS_THEME_DIR . '/inc/fs-extended-search.php' );


// Archives titles

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

        $title = single_cat_title( '', false );

    } elseif ( is_tag() ) {

        $title = single_tag_title( '', false );

    } elseif ( is_post_type_archive() ) {

        $title = post_type_archive_title( '', false );
    
    } elseif ( is_tax() ) {

        $title = single_term_title( '', false );
    } 

    return $title;

});


// Excerpts lenght

function fs_custom_excerpt_length( $length ) {
	$words = get_theme_mod('ex_lenght', 24);
	return $words;
}
add_filter( 'excerpt_length', 'fs_custom_excerpt_length', 999 );


// Excerpt link

function fs_excerpt_more( $more ) {
    return sprintf( '&hellip; <a class="read-more" href="%1$s" rel="nofollow">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'anybodesign' ) . ' <span class="a11y-hidden">'.__( 'of ', 'anybodesign' ).get_the_title().'</span>'
    );
}
add_filter( 'excerpt_more', 'fs_excerpt_more' );

// Custom excerpt
// https://gist.github.com/samjbmason/4050714

function fs_share_excerpt($count, $post_id){
  $permalink = get_permalink($post_id);
  $excerpt = get_post($post_id);
  $excerpt = $excerpt->post_content;
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));

  $excerpt = $excerpt.'...';
  return $excerpt;
}

// Page excerpt

function fs_page_excerpt() {
	global $post;   
    if( $post->post_excerpt ) {
        $content = get_the_excerpt();
    } else {
		$content = null;
	}
    return $content;
}

// Image Sizes

add_image_size( 'screen-md', 720, 450, true );
add_image_size( 'screen-hd', 1440, 900, true );

function fs_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'screen-md'		=> __( 'Screen Medium', 'anybodesign' ),
        'screen-hd'		=> __( 'Screen Full', 'anybodesign' ),
    ) );
}
add_filter( 'image_size_names_choose', 'fs_custom_sizes' );


// Widgets

function fs_widgets_init() {
	register_sidebar(array(
		'name'			=>	esc_html__( 'Blog Widgets', 'anybodesign' ),
		'id'			=>	'widgets_area1',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
}
add_action( 'widgets_init', 'fs_widgets_init' );


// Custom search form

function fs_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="a11y-hidden" for="s">' . __( 'Search for:', 'anybodesign' ) . '</label>
    <input type="search" value="' . get_search_query() . '" name="s" id="s">
    <input type="submit" class="action-btn" id="searchsubmit" value="'. esc_attr__( 'Search', 'anybodesign' ) .'">
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'fs_search_form' );


// Custom comment HTML

function fs_custom_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-author avatar">
				<?php
					echo get_avatar( $comment, 192 );
				?>
			</div>

			<div class="comment-content">
				<div class="comment-author-name">
					<?php 
						printf( '<span class="fn">%s</span>', get_comment_author_link() );
					?>
				</div>
				<div class="comment-date">
					<?php 
						printf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							sprintf( __( '%1$s at %2$s', 'anybodesign' ), get_comment_date(), get_comment_time() )
						);
					?>
				</div>
				<div class="comment-author-text">
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="pending"><?php esc_html_e('Your comment is awaiting moderation.', 'anybodesign') ?></em>
					<?php endif; ?>
					
					<?php comment_text(); ?>
				</div>
			</div>
			
			<div class="reply">
				<?php comment_reply_link( array_merge($args, array(
				    'reply_text' => __('Reply', 'anybodesign'),
				    'depth'      => $depth,
				    'max_depth'  => $args['max_depth']
				    )
				)); ?>
			</div>
			<?php edit_comment_link( __( 'Edit', 'anybodesign' ), '<span class="edit-link">', '</span>' ); ?>
			
		</article>
		
<?php }


// ------------------------
// ACF
// ------------------------


if( class_exists('acf') ) {

	// Remove the WP Custom Fields meta box
	
	add_filter('acf/settings/remove_wp_meta_box', '__return_true');		
	
	// Custom blocks

	// $my_blocks = array_diff( scandir(FS_THEME_DIR . '/blocks'), array('..', '.', '.DS_Store') );
	// 
	// foreach( $my_blocks as $block ) {
	// 	include_once 'blocks/'. $block .'/'. $block .'.php';
	// 	include_once 'blocks/'. $block .'/'. $block .'-fields.php';
	// }	
	
	// Front-End ACF Functions
	
	add_filter('acf/settings/save_json', 'fs_acf_json_save_point');
	function fs_acf_json_save_point( $path ) {
	    
	    $path = FS_THEME_DIR . '/inc/acf';
	    
	    return $path;
	}
	add_filter('acf/settings/load_json', 'fs_acf_json_load_point');
	function fs_acf_json_load_point( $paths ) {
	    
	    unset($paths[0]);
		
	    $paths[] = FS_THEME_DIR . '/inc/acf';
	    
	    return $paths;
	}

	//	ACF Options page
	/*
	if (function_exists('acf_add_options_page')) {
	    
		add_action( 'init', 'fs_acf_add_options_page' );
		function fs_acf_add_options_page() {
			
			$parent = acf_add_options_page(array(
				'page_title'	=> esc_html__( 'Site Options', 'anybodesign' ),
				'menu_title'	=> esc_html__( 'Site Options', 'anybodesign' ),
				'menu_slug'		=> 'options-site',
				'capability'	=> 'edit_posts',
				'icon_url'		=> 'dashicons-admin-network',
				'redirect'		=> false,
				'position'		=> 30
			));
			acf_add_options_sub_page(array(
				'page_title' 	=> esc_html__( 'Archives Customizer', 'anybodesign'),
				'menu_title' 	=> esc_html__( 'Archives Customizer', 'anybodesign'),
				'parent_slug' 	=> $parent['menu_slug'],
				'menu_slug'		=> 'options-site-archives'
			));	
			acf_add_options_sub_page(array(
				'page_title' 	=> esc_html__( 'Social Networks', 'anybodesign'),
				'menu_title' 	=> esc_html__( 'Social Networks', 'anybodesign'),
				'parent_slug' 	=> $parent['menu_slug'],
				'menu_slug'		=> 'options-site-social'
			));
			
		}
	}
	*/
	
	// Translate ACF fields
	/*	
	function fs_custom_acf_settings_localization($localization){
	  return true;
	}
	add_filter('acf/settings/l10n', 'fs_custom_acf_settings_localization');
	
	function fs_custom_acf_settings_textdomain($domain){
	  return 'anybodesign';
	}
	add_filter('acf/settings/l10n_textdomain', 'fs_custom_acf_settings_textdomain');
	*/
}


// WP-Rocket

if (function_exists('rocket_load_textdomain')) {
	function fs_wp_rocket_add_purge_posts_to_author() {
		// gets the author role object
		$role = get_role('editor');
		
		// add a new capability
		$role->add_cap('rocket_purge_cache', true);
	}
	add_action('init', 'fs_wp_rocket_add_purge_posts_to_author', 12);
}

// Koko 

if (function_exists('maybe_collect_request')) {
	function fs_koko() {
		$role = get_role('editor');
		$role->add_cap('view_koko_analytics', true);
	}
	add_action('init', 'fs_koko', 12);
}