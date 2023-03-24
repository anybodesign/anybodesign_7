<?php if ( !defined('ABSPATH') ) die();
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package WordPress
 * @subpackage Anybodesign
 * @since 7.0
 * @version 1.0
 */
?>
					<aside class="page-sidebar widget-area" role="complementary">
						
						<?php 
							if ( ( is_home() || is_singular('post') || is_category() ) && is_active_sidebar( 'widgets_area1' ) ) { 
								dynamic_sidebar( 'widgets_area1' ); 
							} 
						?>
						
					</aside>