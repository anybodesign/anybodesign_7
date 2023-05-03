<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying the post meta.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Anybodesign
 * @since 7.0
 * @version 1.0
 */
 $comment = get_comments_number();
?>
							
							<div class="post-meta">
								
								<p class="meta-infos">
									<?php 
										esc_html_e( 'Posted ', 'anybodesign' ); 
										esc_html_e( 'on&nbsp;', 'anybodesign' ); 
										echo the_time( get_option('date_format') );
										
										if (is_home() ) {
											esc_html_e( '&nbsp;in&nbsp;', 'anybodesign' ); the_category(', '); 
										}
									?>
								</p>
								
								<?php if ( $comment > 0 ) : ?>
								<p class="meta-comments">
									<a href="<?php the_permalink() ?>#comments">
										<?php printf( _n( '%s comment', '%s comments', $comment, 'anybodesign' ), $comment ); ?>
									</a>
								</p>
								<?php endif; ?>
	    						
							</div>
							