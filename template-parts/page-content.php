<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page or post content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Anybodesign
 * @since 7.0
 * @version 1.0
 */
?>
					<div class="page-content">
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php 
							the_content();
							
							wp_link_pages(
								array(
									'before'      => '<nav class="post-nav-links" aria-label="' . esc_attr__( 'Page', 'anybodesign' ) . '"><span class="label">' . __( 'Pages:', 'anybodesign' ) . '</span>',
									'after'       => '</nav>',
									'link_before' => '<span class="page-number">',
									'link_after'  => '</span>',
									'aria_current'     => 'page',
        							'next_or_number'   => 'number',
									'separator'        => ' ',
									'nextpagelink'     => __( 'Next page', 'anybodesign' ),
									'previouspagelink' => __( 'Previous page', 'anybodesign' ),
        							'pagelink'         => '%',
								)
							); 
						    
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						?>
						
					<?php endwhile; ?>
					</div>					