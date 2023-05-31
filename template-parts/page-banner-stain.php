<?php if ( !defined('ABSPATH') ) die(); 
	$img = get_the_post_thumbnail_url( $post->id, 'full' );
	$img_alt = get_field('featured_alt');
	
	if ($img_alt) {
		$bg = 'style="background-image: url('.esc_url($img_alt).');"';
	} else if ($img) {
		$bg = 'style="background-image: url('.esc_url($img).');"';
	} else {
		$bg = null;
	}
?>
					<div class="featured-image-container">
						<div class="featured-image" <?php echo $bg; ?>></div>
					</div>