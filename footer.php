<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Anybodesign
 * @since 7.0
 * @version 1.0
 */
?>
	</main> <?php // END content ?>
		
	<?php if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) { ?>
		
		<footer role="contentinfo" id="site_foot">
			<div class="row inner">
				<?php
					get_template_part( 'template-parts/footer', 'content' );
				?>
			</div>
		</footer>
		
		<?php get_template_part( 'template-parts/footer', 'back2top' ); ?>
		
	<?php } ?>	

</div> <?php // END wrapper ?>

<?php wp_footer(); ?>

</body>
</html>