<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage Anybodesign
 * @since 7.0
 * @version 1.0
 */
?>
						<?php
							$pages = get_the_posts_pagination();
							if (! empty( $pages) ) {
								
								get_template_part('template-parts/post', 'pagination-spinner');
								get_template_part('template-parts/post', 'pagination-trigger');
								get_template_part('template-parts/post', 'pagination-nomore');
							} 
						?>
						
						<div class="pagination" id="posts_nav">
						<?php
							the_posts_pagination(array(
								'prev_text'          => __( 'Previous page', 'anybodesign' ),
								'next_text'          => __( 'Next page', 'anybodesign' ),
								'before_page_number' => '<span class="meta-nav a11y-hidden">' . __( 'Page', 'anybodesign' ) . ' </span>',
							));
						?>
						</div>
