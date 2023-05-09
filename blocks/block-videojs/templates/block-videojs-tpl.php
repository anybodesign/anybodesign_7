<?php if ( !defined('ABSPATH') ) die();

	$base = get_field('video-url');
	$url = get_field('video-js');

?>
			<?php // Block preview
				if( !empty( $block['data']['__is_preview'] ) ) { ?>
				<img src="<?php echo FS_THEME_URL . '/blocks/block-videojs/assets/preview.jpg'; ?>" alt="">
			<?php } else { ?>
			<section class="acf-block--videojs">
				<div class="acf-block-container">
					<div id="videojs">
					  <video class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="100%" height="100%" poster="<?php echo esc_url($base); ?>/thumbnails/<?php echo esc_html($url); ?>.jpg" data-setup="{}">
					    <source src="<?php echo esc_url($base); ?>/videos/<?php echo esc_html($url); ?>.mp4" type='video/mp4' />
					    <source src="<?php echo esc_url($base); ?>/videos/<?php echo esc_html($url); ?>.ogv" type='video/ogg' />
						<p class="vjs-no-js">
							<?php _e('To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video', 'anybodesign'); ?></a>
					  </video>
					</div>
				</div>
			</section>
			<?php } ?>