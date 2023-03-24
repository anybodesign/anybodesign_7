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
							<?php if ( $comment > 0 ) : ?>
							<div class="post-meta">
							
								<p class="meta-comments">
									<a href="<?php the_permalink() ?>#comments">
										<?php printf( _n( '%s comment', '%s comments', $comment, 'anybodesign' ), $comment ); ?>
									</a>
								</p>
	    						
							</div>
							<?php endif; ?>