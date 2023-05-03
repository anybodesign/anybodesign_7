<?php if ( !defined('ABSPATH') ) die(); ?>
					
					<div class="page-filters">
						
						<nav class="posts-filters" role="navigation" aria-label="<?php esc_html_e('Posts filters', 'anybodesign'); ?>">
							
							<?php if ( is_home() ) { ?>
							<p class="a11y-hidden"><?php esc_html_e('Categories:', 'anybodesign'); ?></p>
							<ul class="cat-menu">
								<?php 
									$args = array(
										'title_li'	=> ''
									);
									wp_list_categories($args); 
								?>
							</ul>
							<?php } ?>
							
							<?php if ( is_post_type_archive( 'projet' ) ) { ?>
							<p class="a11y-hidden"><?php esc_html_e('Project type:', 'anybodesign'); ?></p>
							
							<form class="portfolio-filters">
								<ul class="portfolio-menu">
									
									<li class="portfolio-checkbox--reset">
										<input id="reset" type="reset" value="<?php esc_attr_e('All','anybodesign'); ?>">
									</li>
									
									<li class="portfolio-checkbox">
										<input type="radio" id="graphism" name="portfolio" class="portfolio" value="graphisme">
										<label for="graphism">
											<?php esc_html_e('Graphic design','anybodesign'); ?>
										</label>
									</li>
									<li class="portfolio-checkbox">
										<input type="radio" id="web" name="portfolio" class="portfolio" value="web-design">
										<label for="web">
											<?php esc_html_e('Web design','anybodesign'); ?>
										</label>
									</li>
									<li class="portfolio-checkbox">
										<input type="radio" id="motion" name="portfolio" class="portfolio" value="motion-design">
										<label for="motion">
											<?php esc_html_e('Motion design','anybodesign'); ?>
										</label>
									</li>
									
								</ul>
							</form>
							
							<?php } ?>
						</nav>
						
					</div>