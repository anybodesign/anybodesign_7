<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all singles.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Anybodesign
 * @since 7.0
 * @version 1.0
 */	
get_header(); ?>

				<?php get_template_part( 'template-parts/page', 'banner' ); ?>
				
				<div class="page-wrap">					
					<?php 
						get_template_part( 'template-parts/page', 'content' ); 
					?>
				</div>
				
<?php get_footer(); ?>