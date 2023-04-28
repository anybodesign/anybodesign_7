<?php if ( !defined('ABSPATH') ) die(); 
	
	$categories = get_the_category();
	$terms = get_the_terms( $post->ID, 'type-creation' ); 
?>
					
							<nav class="breadcrumbs-nav" role="navigation" aria-label="<?php esc_attr_e('Breadcrumbs', 'anybodesign'); ?>">
								<ul class="cat-menu">
									
								<?php if (is_singular('post')) { ?> 
									
									<li class="cat-item">
										<?php esc_html_e('Posted on ','anybodesign'); the_time('d.m.Y');  esc_html_e(' in','anybodesign'); ?>
									</li>
									
									<li class="cat-item">
										<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
											Blog
										</a>
									</li>
									<?php if ( ! empty( $categories ) ) { ?>
									<li class="cat-item">
										<a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
											<?php echo esc_html( $categories[0]->name ); ?>
										</a>
									</li>
									<?php } ?>
									
								<?php } ?>
									
									
								<?php if (is_singular('projet')) { ?> 
									
									<li class="cat-item">
										<?php esc_html_e('Posted in','anybodesign'); ?>
									</li>
										
										<?php
										if ( $terms && ! is_wp_error( $terms ) ) : 
											$taxo_links = array();
												foreach ( $terms as $term ) {
													$taxo_links[] = '<a href="'.esc_url( home_url( '/' ) ).'portfolio-anybodesign/#'.$term->slug.'">'.$term->name.'</a>';
												}
											$taxlinks = join( " — ", $taxo_links );
										endif; ?>										
									
									<li class="cat-item">
										<a href="<?php echo esc_url( home_url( '/portfolio-anybodesign/' ) ); ?>">Portfolio</a>
									</li>
									<?php if ( has_term('archives', 'type-creation') ) { ?>
									<li class="cat-item">
										<a href="<?php echo esc_url( home_url( '/creations/archives/' ) ); ?>">Archives</a>
									</li>
									<?php } else { ?>
									<li class="cat-item">
										<?php echo $taxlinks; ?>
									</li>
									<?php } ?>
									
								<?php } ?>
									
								</ul>
							</nav>