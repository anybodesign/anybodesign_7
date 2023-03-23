<?php if ( !defined('ABSPATH') ) die(); ?>

	<?php // The Skiplinks ?>
	
	<div class="skiplinks">
		<a href="#site_main"><?php esc_html_e('Go to main content', 'anybodesign'); ?></a>
		<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
		<a href="#site_nav"><?php esc_html_e('Go to main menu', 'anybodesign'); ?></a>
		<?php endif; ?>
	</div>