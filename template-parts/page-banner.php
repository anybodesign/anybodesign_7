<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Anybodesign
 * @since 7.0
 * @version 1.0
 */
?>
					<?php 
						get_template_part( 'template-parts/page-banner', 'content' );
						
						if ( is_single() || is_singular( 'projet' ) || is_category() || is_tax( 'type-projet' ) ) {
							get_template_part( 'template-parts/page-banner', 'breadcrumbs' );
						}
						
						if ( is_home() || is_post_type_archive( 'projet' ) ) { 
							get_template_part( 'template-parts/page-banner', 'filters' ); 
						} 
					?>