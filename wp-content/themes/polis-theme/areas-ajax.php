<?php

function areaAjax() {

	if ( isset( $_GET['areaAjax'] ) && isset( $_GET['areaCatAjax'] ) && isset( $_GET['areaSlider'] ) ) {

		$area   = $_GET['areaAjax'];

		$slider = $_GET['areaSlider'];

		$cat    = $_GET['areaCatAjax'];

		if ( $slider == 'noticias' ):

			?>

			<?php

			$args     = array(

				'post_type' => 'noticias',

				'tax_query' => array(

					array(

						'taxonomy'         => 'areas',

						'field'            => 'id',

						'terms'            => $cat,

						'include_children' => true,

						'posts_per_page'   => 8,

					)

				)

			);

			$noticias = new WP_Query( $args ); // exclude category

			while ( $noticias->have_posts() ) : $noticias->the_post(); ?>
                <?php get_template_part('area-slider','noticias'); ?>
            <?php endwhile; ?>

		<?php endif; ?>

		<?php

		if ( $slider == 'publicacoes' ):

			?>

			<?php

			$args        = array(

				'post_type' => 'publicacoes',

				'tax_query' => array(

					array(

						'taxonomy'         => 'areas',

						'field'            => 'id',

						'terms'            => $cat,

						'include_children' => true,

						'posts_per_page'   => 10,

					)

				)

			);

			$publicacoes = new WP_Query( $args ); ?>

			<?php while ( $publicacoes->have_posts() ) :

			$publicacoes->the_post(); ?>
            <?php get_template_part('area-slider','publicacoes'); ?>
		<?php endwhile; ?>

		<?php endif; ?>

		<?php

		if ( $slider == 'acoes' ):

			?>

			<?php

			$args     = array(

				'post_type' => 'acoes',

				'tax_query' => array(

					array(

						'taxonomy'         => 'areas',

						'field'            => 'id',

						'terms'            => $cat,

						'include_children' => true,

						'posts_per_page'   => 10,

					)

				)

			);

			$noticias = new WP_Query( $args ); // exclude category

			while ( $noticias->have_posts() ) : $noticias->the_post(); ?>
                <?php get_template_part('area-slider','acoes'); ?>
            <?php endwhile; ?>

		<?php endif; ?>

		<?php

		die();

	}

}



add_action( 'init', 'areaAjax', 1 );

?>
