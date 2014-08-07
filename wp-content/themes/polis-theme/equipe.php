<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 27/05/14
 * Time: 16:04
 */
global $_query;
$page = $_query->_page;
$total_pages = $_query->total_pages;
get_header(); ?>
    <section class="col-md-12 content equipe">
        <?php

        $args = array(
            // return all fields
            'fields' => 'all_with_meta',
            'orderby'  => 'meta_value',
            'meta_key' => 'area',
            'number' => $_query->users_per_page,
            'offset' => $_query->offset, // skip the number of users that we have per page
            'exclude' => $_query->exclude
        );

        // The User Query
        $user_query = new WP_User_Query($args);
        foreach ($user_query->results as $user) {
            $_user = get_userdata($user->ID);
            $_avatar = get_avatar($user->ID, 200);
            $_area = get_field('area', 'user_' . $user->ID);
            $_area_slug_term = get_term_by('slug', $_area, 'areas');
            if ($_area != 'Equipe Pólis' && $_area != 'Institucional' && $_area != 'Outros' && $_area_slug_term->parent != 0) {
                $_top_term = get_term_by('id', $_area_slug_term->parent, 'areas');
                $_area = explode('-', trim($_top_term->slug));
                $_area = $_area_slug[0];
            }
            ?>
            <a href="<?php echo get_bloginfo('url') . '/equipe/' . $_user->user_login; ?>" class="col-md-3 user">
                <?php echo $_avatar; ?>
                <img src="<?php bloginfo('template_url') ?>/img/image-hover.png" class="hover-icon">

                <div class="col-md-12 name <?php echo $_area; ?>">
                    <?php echo $_user->first_name . ' ' . $_user->last_name; ?>
                    <small><?php echo get_field('cargo', 'user_' . $user->ID);?></small>
                </div>
            </a>
        <?php
        }
        ?>
        <div class="container pagination">
            <div class="col-md-4 col-md-offset-4">
                <?php

                $total = $total_pages;
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
<?php get_footer(); ?>