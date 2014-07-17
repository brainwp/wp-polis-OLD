<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 22/05/14
 * Time: 11:10
 */
get_header(); ?>
    <section class="col-md-12 content text-center">
        <p class="description">
            <?php echo of_get_option('frase-intro-home'); ?>
        </p>

        <p class="description text-areas">
            Áreas de atuação do Pólis
        </p>
    </section>
    <section class="col-md-12 content atuacao">
        <div class="col-md-4 left">
            <div class="col-md-10 reforma">
                <p class="title">Reforma Urbana</p>

                <div class="col-md-12 description">
                    <?php echo of_get_option('frase-reformaurbana-home'); ?>
                </div>
                <a class="col-md-5 saiba left text-center" href="<?php echo home_url(); ?>/area/reforma-urbana">Saiba
                    mais</a>
            </div>
            <div class="col-md-10 inclusao">
                <p class="title">Inclusão e Sustentabilidade</p>

                <div class="col-md-12 description">
                    <?php echo of_get_option('frase-inclusao-home'); ?>
                </div>
                <a class="col-md-5 saiba left text-center"
                   href="<?php echo home_url(); ?>/area/inclusao-e-sustentabilidade">Saiba mais</a>
            </div>
        </div>
        <div class="col-md-4 pull-right right">
            <div class="col-md-10 democracia pull-right right">
                <p class="title">Democracia e Participação</p>

                <p class="description">
                    <?php echo of_get_option('frase-democracia-home'); ?>
                </p>
                <a class="col-md-5 saiba left text-center"
                   href="<?php echo home_url(); ?>/area/democracia-e-participacao">Saiba mais</a>
            </div>
            <div class="col-md-10 cidadania pull-right right">
                <p class="title">Cidadania Cultural</p>

                <p class="description">
                    <?php echo of_get_option('frase-cidadania-home'); ?>
                </p>
                <a class="col-md-5 saiba left text-center" href="<?php echo home_url(); ?>/area/cidadania-cultural">Saiba
                    mais</a>
            </div>
        </div>
        <div class="col-md-12 clear"></div>
        <div class="col-md-10 col-md-offset-1 consultoria-alert">
            <img src="<?php bloginfo('template_url'); ?>/img/consultoria-alert.png">
            <!-- trocar pelo png transparente depois -->
            <span>Interessado nos serviços de consultoria da Pólis?</span>
            <a class="pull-right right" href="<?php echo home_url(); ?>/contato">Entre em contato</a>
        </div>

        <div class="linha-tracejada"></div>

    </section>
    <section class="col-md-12 content news">
        <div class="col-md-12">
            <div class="section-title">
                <h3>Notícias e Ações</h3>
                <a href="#" class="col-md-1 shape-todos">Ver todos</a>
            </div>
        </div>

        <article id="slider-news" class="carousel slide col-md-7" data-ride="carousel">
            <div class="carousel-inner">
                <?php $slider_query = new WP_Query(array(
                    'post_type' => array('acoes', 'noticias'),
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'posts_per_page' => 6
                ));?>
                <?php $_i = 0; ?>
                <?php while ($slider_query->have_posts()) :
                $slider_query->the_post(); ?>
            <?php if ($_i == 0){ ?>
                <div class="item active">
                    <?php
                    }
                    else{
                    ?>
                    <div class="item">
                        <?php } ?>

                        <div class="thumb">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('slider-news-image');
                                } else {
                                    echo '<img src="' . get_bloginfo('template_url') . '/img/default700x200.jpg " />';
                                } ?>
                            </a>
                            <?php $terms = terms('areas'); ?>
                            <?php $class_term = explode(", ", $terms); ?>
                            <?php $bg_term = sanitize_title($class_term[0]); ?>
                            <?php if (!is_area($bg_term)) {
                                $bg_term = 'default';
                            } ?>
                            <div class="news-terms bg-<?php echo $bg_term; ?>">
                                <?php echo $terms; ?>
                            </div>
                        </div>
                        <!-- thumb -->
                        <div class="left type"><?php echo get_post_type(); ?></div>
                        <h3><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h3>

                        <div class="texto">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="more">Leia Mais</a>
                    </div>
                    <?php
                    $_i++;
                    endwhile;
                    ?>
                </div>
                <div id="slider-news-controle" class="pagination">
                    <div class="carousel-indicators">
                        <?php for ($i = 0; $i < 6; $i++) {
                            if ($i == 0) {
                                echo '<a class="active" href="#slider-news" data-slide-to="' . $i . '">' . $i . '</a>';
                            } else {
                                echo '<a href="#slider-news" data-slide-to="' . $i . '">' . $i . '</a>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
        </article>
        <section class="col-md-5 pull-right">
            <?php if (is_active_sidebar('widgets-boletim-home')) : ?>
                <?php dynamic_sidebar('widgets-boletim-home'); ?>
            <?php endif; ?>
            <div class="col-md-12 canal">
                <div class="col-md-6">
                    <p>Canal Pólis</p>
                    Conheça nosso novo canal!
                    <a href="#" class="col-md-8 btn-ao-vivo">Ao vivo</a>
                </div>
                <a href="<?php echo home_url(); ?>/videos" class="full-link"></a>
            </div>
        </section>
    </section>
    <div class="clear-mob"></div>
    <section class="col-md-12 content publicacoes">

        <div class="linha-tracejada"></div>

        <div class="section-title">
            <h3>Publicações</h3>
            <a href="<?php echo home_url(); ?>/publicacoes" class="col-md-1 shape-todos">Ver todos</a>
        </div>
        <div id="hide-ajax" style="display: none"></div>
        <div id="carousel" class="col-md-12 list_carousel responsive">
            <?php $arg = array(
                'post_type' => array('publicacoes'),
                'orderby' => 'date',
                'ordr' => 'ASC',
                'posts_per_page' => 15
            );
            ?>
            <ul id="slider2">
                <?php
                $publicacoes = new WP_Query($arg);
                ?>
                <?php while ($publicacoes->have_posts()) :
                    $publicacoes->the_post();
                    ?>
                    <li class="item">
                        <a href="<?php the_permalink(); ?>">

                            <div class="hover"></div>

                            <?php
                            if (has_post_thumbnail()) {
                                $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'slider-publicacoes-thumb', true);
                                echo '<img src="' . $thumb_url[0] . '"/>';
                            } else {
                                echo '<img src="' . get_bloginfo('template_url') . '/img/default-publicacoes-thumb.jpg' . '" />';
                            }
                            ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <!-- carousel -->

        <div id="prev-publicacao" class="prev"></div>
        <div id="next-publicacao" class="next"></div>

        <div class="clear"></div>

        <div class="todos-full"><a class="btn-todos-full" href="<?php echo home_url(); ?>/biblioteca">Veja todas as
                publicações ou faça uma busca</a></div>

    </section>
    <section class="col-md-12 content widgets-home">

        <div class="linha-tracejada"></div>

    </section>
<?php get_footer(); ?>