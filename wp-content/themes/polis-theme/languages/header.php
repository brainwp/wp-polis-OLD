<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Polis Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<div class="container shadow">
	<header class="col-md-12 header">
		<div class="col-md-6 left">  <!-- logo -->
			<img src="<?php bloginfo('template_url');?>/img/logo.png">
		</div>
		<form class="col-md-5 left description">
			<p>
				<?php echo of_get_option('frase-head'); ?>
			</p>
			<label class="left">Busque conteudo</label>
			<input type="search" placeholder="Digite e aperte enter">
			<span class="glyphicon glyphicon-search"></span> <!-- icone de search !-->
		</form>
	</header>
	<nav class="col-md-12 nav">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav>