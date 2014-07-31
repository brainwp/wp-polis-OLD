<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29/07/14
 * Time: 19:21
 */
global $wpdb;

global $wp_query, $_query;
get_header();?>

<section class="col-md-12 content perfil projetos-main cpt-publicacoes">
    <div class="header-area col-md-12">
        <h1><?php echo $_query->cpt; ?></h1>
    </div>
</section>
<section class="col-md-12 atividades archive-publicacoes">
    <?php $count = ''; ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('area-slider',$_query->cpt); ?>
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