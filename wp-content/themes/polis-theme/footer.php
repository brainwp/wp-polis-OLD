<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Polis Theme
 */
?>
</div><!-- content-bg -->
<footer id="footer" class="col-md-12">
	<div class="col-md-2 menu institucional">
		<a class="title">Institucional</a>
		<?php wp_nav_menu( array('theme_location' => 'footer-institucional' )); ?>
	</div>
	<div class="col-md-2 menu institucional">
		<a class="title">Áreas de atuação</a>
		<?php wp_nav_menu( array('theme_location' => 'footer-atuacao' )); ?>
	</div>
	<div class="col-md-2 menu institucional">
		<a class="title">Projetos</a>
		<?php wp_nav_menu( array('theme_location' => 'footer-projetos' )); ?>
	</div>
	<div class="col-md-2 menu institucional">
		<a class="title">Biblioteca</a>
		<?php wp_nav_menu( array('theme_location' => 'footer-biblioteca' )); ?>
	</div>
	<div class="col-md-2 apoio">
		<a class="title">Apoio</a>
		<a href="<?php echo of_get_option( 'footer-apoio-link' );?>">
			<img src="<?php echo of_get_option( 'footer-apoio-img' );?>">
		</a>
	</div>
	<div class="col-md-2 apoio">
		<a class="title">Realização</a>
		<a href="<?php echo of_get_option( 'footer-realizacao-link' );?>">
			<img src="<?php echo of_get_option( 'footer-realizacao-img' );?>">
		</a>
	</div>
	<div class="col-md-12 footer">
		<div class="col-md-6 endereco">
			<h3><?php bloginfo( 'name' ); ?></h3>
			<p><?php echo of_get_option( 'footer-endereco' ); ?> • Tel. <?php echo of_get_option( 'telefone' ); ?></p>
		</div>
		<div class="pull-right social">

			<?php if (is_active_sidebar('widgets-redes-sociais')) : ?>
			    <?php dynamic_sidebar('widgets-redes-sociais'); ?>
			<?php endif; ?>

		</div>
	</div>
</footer>
</div> <!-- container shadow -->
<div id="map-bg"></div>
<?php wp_footer(); ?>
</body>
</html>
