<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18/07/14
 * Time: 12:28
 */
?>
<section class="col-md-12 biblioteca publicacoes livros_section">
				<?php if ( is_user_logged_in() ) {
    // Verifica se user está logado e seta uma variavel pra comparar o CUSTOM POST FIELD assim não preciso fazer 2 querys pra cada
    $compare_value = array( 'sim', 'nao' );
} else {
    $compare_value = array( 'nao' );
}
				$args = array(
                    'tax_query'  => array(
                        array(
                            'taxonomy'         => 'categorias',
                            'field'            => 'slug',
                            'terms'            => 'series-e-livros',
                            'include_children' => true,
                            'posts_per_page'   => 10,
                        ),
                    ),
                    'meta_query' => array(
                        array(
                            'key'     => 'isprivate',
                            'value'   => $compare_value,
                            'compare' => 'IN',
                        ),
                    ),
                );
				$series = new WP_Query( $args ); ?>
<header class="section-title">
    <h3>Séries e livros</h3>
    <a href="http://dev.matheusgimenez.com/polis/publicacoes" class="col-md-1 shape-todos">Ver todos</a>
</header>
<ul class="slider_area livros">
    <?php while ( $series->have_posts() ) :
        $series->the_post(); ?>
        <div class="cada-publicacao-area col-md-2">
            <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'slider-publicacoes-thumb' );
                } else {
                    ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/default-publicacoes-thumb.jpg" alt="<?php the_title(); ?>" />
                <?php } ?>
                <img class="hover-icon" src="<?php echo get_template_directory_uri(); ?>/img/image-hover.png">
            </a>
            <div class="download">
                <?php
                if(!emptyReturn(get_campoPersonalizado('anexo'))){
                    $download_id = get_campoPersonalizado('anexo');

                    echo '<a href="'.wp_get_attachment_url($download_id).'" download>Download</a>';
                }
                ?>
            </div>
        </div>
    <?php endwhile; ?>
</ul>
    <div class="clear"></div>
    <div id="prev-biblioteca-series" class="prev"></div>
    <div id="next-biblioteca-series" class="next"></div>


</section>
<section class="col-md-12 publicacoes atividades biblioteca">
    <?php
    $args = array(
        'tax_query'  => array(
            array(
                'taxonomy'         => 'categorias',
                'field'            => 'slug',
                'terms'            => 'documentos-e-textos',
                'include_children' => true,
                'posts_per_page'   => 10,
            ),
        ),
        'meta_query' => array(
            array(
                'key'     => 'isprivate',
                'value'   => $compare_value,
                'compare' => 'IN',
            ),
        ),
    );
    $series = new WP_Query( $args ); ?>
    <header class="section-title">
        <h3>Documentos e textos</h3>
        <a href="http://dev.matheusgimenez.com/polis/publicacoes" class="col-md-1 shape-todos">Ver todos</a>
    </header>
    <ul class="slider_documentos publicacoes atividades biblioteca">
        <?php while ( $series->have_posts() ) :
            $series->the_post(); ?>
            <li class="item">
                <a href="<?php the_permalink(); ?>" class="post">
                    <div class="post_container">
                        <div class="thumb">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium');
                            } else {
                                echo '<img src="' . theme() . '/img/thumb-equipe.png">';
                            } ?>
                        </div><!-- thumb -->

                        <div class="col-md-12 description">
                            <h3><?php the_title(); ?></h3>
                            <?php echo resumo(130); ?>
                            <span class="leia" href="<?php the_permalink(); ?>">Leia mais</span>
                        </div><!-- .description -->
                    </div>
                    <!-- post_container -->
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
    <div class="clear"></div>
    <div id="prev-biblioteca-docs" class="prev"></div>
    <div id="next-biblioteca-docs" class="next"></div>

</section>
<section class="col-md-12 publicacoes atividades biblioteca">
    <?php
    $args = array(
        'tax_query'  => array(
            array(
                'taxonomy'         => 'categorias',
                'field'            => 'slug',
                'terms'            => 'institucionais',
                'include_children' => true,
                'posts_per_page'   => 10,
            ),
        ),
        'meta_query' => array(
            array(
                'key'     => 'isprivate',
                'value'   => $compare_value,
                'compare' => 'IN',
            ),
        ),
    );
    $series = new WP_Query( $args ); ?>
    <header class="section-title">
        <h3>Institucionais</h3>
        <a href="http://dev.matheusgimenez.com/polis/publicacoes" class="col-md-1 shape-todos">Ver todos</a>
    </header>
    <ul class="slider_institucional atividades">
        <?php while ( $series->have_posts() ) :
            $series->the_post(); ?>
            <li class="item">
                <a href="<?php the_permalink(); ?>" class="post">
                    <div class="post_container">
                        <div class="thumb">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium');
                            } else {
                                echo '<img src="' . theme() . '/img/thumb-equipe.png">';
                            } ?>
                        </div><!-- thumb -->

                        <div class="col-md-12 description">
                            <h3><?php the_title(); ?></h3>
                            <?php echo resumo(130); ?>
                            <span class="leia" href="<?php the_permalink(); ?>">Leia mais</span>
                        </div><!-- .description -->
                    </div>
                    <!-- post_container -->
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
    <div class="clear"></div>
    <div id="prev-biblioteca-institucionais" class="prev"></div>
    <div id="next-biblioteca-institucionais" class="next"></div>

</section>
