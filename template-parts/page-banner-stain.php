<?php if ( !defined('ABSPATH') ) die(); 
	$img = get_the_post_thumbnail_url( $post->id, 'screen-hd' )
?>
					<div class="featured-image-container">
						<div class="featured-image" <?php echo 'style="background-image: url('.esc_url($img).');"'; ?>></div>
					</div>