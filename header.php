<?php if ( !defined('ABSPATH') ) die();
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Anybodesign
 * @since 7.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="wrapper">

	<?php 
		if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) {
			get_template_part('template-parts/header', 'skiplinks');
		}
		get_template_part('template-parts/header', 'wrapper');
	?>

	<main class="content-area" role="main" id="site_main">