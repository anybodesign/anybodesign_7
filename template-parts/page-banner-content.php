<?php if ( !defined('ABSPATH') ) die(); ?>
					
					<div class="page-banner">
						<div class="inner">
							<?php 
								get_template_part( 'template-parts/page-banner', 'title' );
								if ( is_single() ) {
									get_template_part( 'template-parts/page-banner', 'stain' );
								}
							?>
						</div>
					</div>