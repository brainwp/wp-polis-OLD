<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/08/14
 * Time: 17:32
 */
// WP_Query arguments
global $wpdb;
$args = array (
    'post_type'              => array('acoes','noticias'),
    'posts_per_page'         => '999999999999',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $post_id = get_the_ID();

        update_post_meta($post_id, 'in_home_slider', 'nao');
    }
    echo 'sucesso?';
}
?>