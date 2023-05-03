<?php if ( !defined('ABSPATH') ) die();
/**
 * The main template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Anybodesign
 * @since 7.0
 * @version 1.0
 */ 
	if ( is_post_type_archive( 'projet' ) || is_tax( 'type-creation' ) ) {
		$class = 'the-projects';
	} else {
		$class = 'the-posts';
	}
get_header(); ?>

				<?php get_template_part( 'template-parts/page', 'banner' ); ?>
				
				<div class="page-wrap">
					
					<div class="page-content">
							
						<?php if ( have_posts() ) : // The Loop ?>
							
						<div id="posts_list" class="<?php echo esc_attr($class); ?>">
							<?php 
								while ( have_posts() ) : the_post();
									if ( is_post_type_archive( 'projet' ) || is_tax( 'type-creation' ) ) {
										get_template_part( 'template-parts/project', 'block' );
									} else {
										get_template_part( 'template-parts/post', 'block' );
									}
								endwhile;
							?>
						</div>
						
						<?php get_template_part( 'template-parts/post', 'pagination' ); ?>
						
						<?php
						else:
							get_template_part( 'template-parts/nothing' );
						endif; 
						?>
					</div>
					
				</div>

<?php get_footer(); ?>