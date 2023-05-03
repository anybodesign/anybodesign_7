<?php if ( !defined('ABSPATH') ) die();

	$projects = get_field('projects');

?>
			<section class="acf-block--projects alignfull">
				<div class="acf-block-container">
					<?php if ( $projects ) {
						foreach ($projects as $p) : ?>
						
						<article id="post-<?php the_ID($p->ID); ?>" <?php post_class('project-block'); ?>>
							<?php if ( '' != get_the_post_thumbnail($p->ID) ) {
								$img_id = get_post_thumbnail_id($p->ID);
								$img_url = wp_get_attachment_image_src( $img_id, 'thumbnail' );
								$img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
							?>
							<a href="<?php echo get_the_permalink($p->ID); ?>" rel="nofollow">
								<figure role="group">
									<img src="<?php echo $img_url[0]; ?>" alt="<?php echo $img_alt; ?>">
									
									<figcaption>
										<h2 class="post-title">
											<?php echo get_the_title($p->ID); ?>
										</h2>						
									</figcaption>
								</figure>
							</a>
							<?php } ?>
						</article>	
						
						<?php endforeach; ?>
					<?php } ?>
				</div>
			</section>