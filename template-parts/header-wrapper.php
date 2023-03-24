<?php if ( !defined('ABSPATH') ) die(); ?>
	
	<header role="banner" id="site_head">
		<div class="row inner">	
		<?php 
			get_template_part('template-parts/header', 'brand'); 
			
			if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
				get_template_part('template-parts/header', 'nav');
			}
		?>
		</div>
	</header>