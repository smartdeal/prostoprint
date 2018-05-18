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

function get_the_prices_func( $atts ){
    $out = '';
    $price = get_field('f-prices');
    if ($price):
    // return '$out';
        $out .= '<div class="b-the-prices">';
        foreach ($price as $key => $price1) {
            $out .= '<div class="b-the-price">';
            $price_title =  $price1['price_title'];
            if ($price_title)
                $out .= '<div class="b-the-price__title">'.$price_title.'</div>';
            $out .= '<div class="b-the-price__body">';
            $price_img =  $price1['price_img'];
            if ($price_img)
                $out .= '<img class="b-the-price__img" src="'.kama_thumb_src( 'w=300 &q=60 &rise_small=false', $price_img['url'] ).'" alt="">';
            $price_one =  $price1['price_one'];
            if ($price_one):
                $out .= '<div class="b-the-price__table"><table><tr><th>Тираж печати</th><th>Цена, руб.</th></tr>';
                foreach ($price_one as $key => $price_one1) {
                    $out .= '<tr><td>'.$price_one1['howmany'].'</td><td>'.$price_one1['amount'].'</td></tr>';
                }
                $out .= '</table></div>';
            endif;
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
        }
        $out .= '</div>';
    endif;
    return $out;
}
add_shortcode('get_the_prices', 'get_the_prices_func');
