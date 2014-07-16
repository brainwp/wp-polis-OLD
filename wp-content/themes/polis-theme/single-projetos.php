<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Polis Theme
 */

get_header(); ?>

	<section class="col-md-12 content-single-areas projetos-single">

		<?php while ( have_posts() ) : the_post(); ?>
        <?php $single_id = get_the_ID(); ?>
		<header>
			<h1><?php top_term( 'categorias' ); ?></h1><span class="marcador">•</span><span><?php cpt_name(); ?></span><span class="marcador">•</span><span><?php echo terms( 'tipos' ); ?></span>
		</header><!-- header -->

		<article class="col-md-12 pull-left">
			<div class="thumb">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'slider-publicacoes-thumb' );
				} else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/default-publicacoes-thumb.jpg" alt="<?php the_title(); ?>" />
				<?php } ?>
			</div><!-- thumb -->
			<div class="content">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<div class="meta">
                    <h2>Equipe</h2>
                    <?php if ( get_field( 'projetos_repeater', $single_id ) ): ?>
                        <?php while ( has_sub_field( 'projetos_repeater', $single_id ) ): ?>
                            <span><?php the_sub_field( 'projetos_nome' ); ?></span>
                            <span><?php the_sub_field( 'projetos_email' ); ?></span>
                            <span><?php the_sub_field( 'projetos_telefone' ); ?></span>
                        <?php endwhile; ?>
                    <?php endif; ?>
				</div><!-- meta -->
			</div><!-- content -->
		</article>

		<?php endwhile; // end of the loop. ?>

    </section>
    <section class="col-md-12 slider-single-areas projetos-single">

    	<h2>Outros <?php echo terms( 'tipos' ); ?></h2>

    	<div id="carousel" class="col-md-12 list_carousel responsive">
			<?php
			$arg = array(
				'post_type'			=> array( 'projetos' ),
                'orderby'			=> 'date',
				'order'				=> 'ASC',
                'post__not_in'      => array($single_id),
				'posts_per_page'	=> 15
			);?>
			<ul id="slider2">
				<?php
				$publicacoes = new WP_Query( $arg ); ?>
				<?php while ( $publicacoes->have_posts() ) :
					$publicacoes->the_post(); ?>
					<li class="item">
						<a href="<?php the_permalink(); ?>">

							<div class="hover"></div>

							<?php
							if ( has_post_thumbnail() ) {
								$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider-publicacoes-thumb', true );
								echo '<img src="' . $thumb_url[0] . '"/>';
							} else {
                                echo '<img src="' . get_bloginfo('template_url') . '/img/default-publicacoes-thumb.jpg " />';
							}
							?>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
		</div><!-- carousel -->

		<div id="prev-publicacao" class="prev"></div>
		<div id="next-publicacao" class="next"></div>

		<div class="clear"></div>

		<div class="todos-full"><a class="btn-todos-full" href="<?php echo home_url(); ?>/biblioteca">Veja todas as publicações ou faça uma busca</a></div>

    </section>
<?php get_footer(); ?>