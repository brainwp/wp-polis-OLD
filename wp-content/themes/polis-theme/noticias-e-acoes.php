<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/07/14
 * Time: 14:39
 */
global $wp_query;
get_header();?>

    <section class="col-md-12 content perfil projetos-main cpt-acoes">
        <div class="header-area col-md-12">
            <h1>Notícias e Ações</h1>
        </div>
        <div class="col-md-5 intro <?php echo $_query->area_slug ?>">
            <span>Todas Notícias e Ações</span>
        </div>
    </section>
    <section class="col-md-12 atividades archive-publicacoes">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="col-md-3 post">
                <div class="post_container">
                    <div class="thumb">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium');
                        } else {
                            echo '<img src="' . get_bloginfo('template_url') . '/img/thumb-equipe.png">';
                        } ?>
                        <h3><?php the_title(); ?></h3>
                    </div>
                    <!-- thumb -->
                    <div class="col-md-12 description">
                        <?php echo resumo(140); ?>
                        <span class="leia" href="<?php the_permalink(); ?>">Leia mais</span>
                    </div>
                </div>
                <!-- post_container -->
            </a>
        <?php endwhile;
        else: ?>

        <?php endif; ?>
        <div class="container pagination">
            <div class="col-md-4 col-md-offset-4">
                <?php
                $page = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $total = $wp_query->max_num_pages;
                $big = 999999999; // need an unlikely integer
                if ($total > 1) {
                    if (!$current_page = $page)
                        $current_page = 1;
                    $format = 'page/%#%/';
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => $format,
                        'current' => max(1, $page),
                        'total' => $total,
                        'mid_size' => 3,
                        'type' => 'list',
                        'prev_text' => '<',
                        'next_text' => '>',
                    ));
                }
                ?>
            </div>
        </div>
    </section>
<?php
get_footer();
?>