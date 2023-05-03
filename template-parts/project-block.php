<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Anybodesign
 * @since 7.0
 * @version 1.0
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('project-block'); ?>>
						
						<?php if ( '' != get_the_post_thumbnail() ) {
							$img_id = get_post_thumbnail_id();
							$img_url = wp_get_attachment_image_src( $img_id, 'thumbnail' );
							$img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
						?>
						<a href="<?php the_permalink(); ?>" rel="nofollow">
							<figure role="group">
								<img src="<?php echo $img_url[0]; ?>" alt="<?php echo $img_alt; ?>">
								
								<figcaption>
									<h2 class="post-title">
										<?php the_title(); ?>
									</h2>						
								</figcaption>
							</figure>
						</a>
						<?php } ?>
					</article>