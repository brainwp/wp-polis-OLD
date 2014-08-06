<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/08/14
 * Time: 17:32
 */
// WP_Query arguments
global $wpdb;
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array (
    'post_type'              => 'noticias',
    'posts_per_page'         => '80',
    'paged'                  => $paged
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
    header( 'Location: '.get_bloginfo('url').'/migrate/page/'. (int) $paged + 1 ) ;
}
else{
    echo 'nao tem essa pagina';
}
?>