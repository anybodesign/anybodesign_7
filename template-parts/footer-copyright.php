<?php if ( !defined('ABSPATH') ) die(); ?>
			
				<div class="footer-copyright">				
					
					<p>
						<?php echo esc_html('&copy;'); echo date(' Y '); echo esc_html(bloginfo('name')).'.'; ?>
						
						<a class="wp-love" href="//wordpress.org"><?php esc_html_e('Powered by WordPress!', 'anybodesign'); ?></a>
					</p>
					
					<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
					<nav role="navigation" aria-label="<?php esc_attr_e('Footer Menu', 'anybodesign'); ?>">
					<?php wp_nav_menu( array(
							'theme_location'	=> 	'footer_menu',
							'menu_class'		=>	'footer-menu',
							'container'			=>	false
							));
					?>
					</nav>
					<?php endif; ?>
					
				</div>