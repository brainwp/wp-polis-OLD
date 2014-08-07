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
    'post_type'              => 'noticias',
    'posts_per_page'         => '999999999999',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $post_id = get_the_ID();
        $hora = '00:00:00';
        $field_mgr = get_field('mgr_data');
        $_table = 'wp_posts';
        if (is_multisite()) {
            $_table = 'wp_' . get_current_blog_id() . '_posts';
        }
        $data = $field_mgr . ' ' . $hora;

        $wpdb->update($_table, array('post_date' => $data), array('id' => $post_id));
    }
    echo 'sucesso?';
}
?>