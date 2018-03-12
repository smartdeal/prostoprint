<?php 

function get_tel_func( $atts ){
    if ($main_tel = get_field('option_tel','option')) $out = $main_tel;
        else $out = '';
    return $out;
}
add_shortcode('get_tel', 'get_tel_func');

function get_email_func( $atts ){
    if ($main_email = get_field('option_email','option')) $out = $main_email;
        else $out = '';
    return $out;
}
add_shortcode('get_email', 'get_email_func');

function get_work_examples_func( $atts ){
    return get_gallery('Примеры выполненных работ');
}
add_shortcode('get_work_examples', 'get_work_examples_func');

function get_post_grid_func($atts) {
    $a = shortcode_atts( array(
        'title' => '',
        'type' => 'product',
        'count' => '-1'
    ), $atts );
    return get_post_grid($a['type'],$a['count'],$a['title']);
}
add_shortcode('get_post_grid','get_post_grid_func');