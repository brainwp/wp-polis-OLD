<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Polis Theme
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php cpt_name(); ?>
				</h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<div class="each-video col-md-3">
				<div class="content">
                <a href="<?php the_permalink(); ?>">
                    <?php
                    if (has_post_thumbnail()) {
                        $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'slider-publicacoes-image', true);
                        echo '<img src="' . $thumb_url[0] . '"/>';
                    } else {
                        echo '<img src="'  . get_bloginfo('template_url') . '/img/default/thumb-default-videos.jpg"/>';
                    }
                    ?>
                    <div class="col-md-12 resumo">
                        <h2 class="title"><?php the_title(); ?></h2>
                    </div><!-- .resumo -->
                </a>
                </div>
			</div><!-- each-video -->

			<?php endwhile; ?>

			<?php polis_theme_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
