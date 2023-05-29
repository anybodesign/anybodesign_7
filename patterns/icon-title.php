<?php
/**
 * Title: Icon title
 * Slug: anybodesign/icon-title
 * Categories: featured
 * Keywords: Icon, Title
 * Block Types: core/image, core/heading
 */
?>
<!-- wp:columns {"className":"icon-title"} -->
<div class="wp-block-columns icon-title">
	<!-- wp:column {"width":"36px"} -->
	<div class="wp-block-column" style="flex-basis:36px">
		<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"noborder"} -->
		<figure class="wp-block-image size-large noborder">
			<img src="<?php echo esc_url( FS_THEME_URL . '/patterns/assets/icon.svg'); ?>" alt=""/>
		</figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":""} -->
	<div class="wp-block-column">
		<!-- wp:heading -->
		<h2 class="wp-block-heading">Un titre H2</h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->