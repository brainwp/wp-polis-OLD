<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/08/14
 * Time: 17:32
 */
// WP_Query arguments
global $wpdb;
$page = $_GET['pagina'];
$args = array (
    'post_type'              => array('publicacoes'),
    'posts_per_page'         => '140',
    'paged' => $page
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $post_id = get_the_ID();
        $field_content = get_the_content_publicacoes();
        $field_exp = explode('.,',$field_content);

        update_post_meta($post_id, 'publicacoes_content', $field_exp[0]);
        update_post_meta($post_id, 'publicacoes_content_bk', $field_content);
    }
    echo 'sucesso?';
}
?>