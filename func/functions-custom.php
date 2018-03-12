<?php 

function the_footer_useful(){
    $cat_slug = 'useful';
    $cat_name = get_category_by_slug($cat_slug)->cat_name; 
    $arr_cat_name = explode(' ',$cat_name);
    $arr_cat_name[0] = '<span class="red">'.$arr_cat_name[0].'</span>';
    $cat_name = implode(' ',$arr_cat_name);
    $out = '';
    $param = array(
        'title' => $cat_name,
        'category_slug' => $cat_slug,
        'posts_per_page' => 4,
        'class' => 'footer-news',
    );
    echo get_news_func($param);
}
function the_relative_news(){
    $param = array(
        'title' => '<span class="red">Похожие </span>записи',
        'category_slug' => 'news',
    );
    echo get_news_func($param);    
}

function get_news_func($param = array()){
    $param_default = array(
        'class' => 'relative-news',
        'posts_per_page' => 3,
        'title' => 'Новости',
        'category_slug' => 'news'
    );
    $param_default = array_merge($param_default, $param);
    $arg =  array(
        'orderby'      => 'rand',
        // 'orderby'      => 'menu_order',
        // 'order'        => 'ASC',
        'posts_per_page' => $param_default['posts_per_page'],
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => $param_default['category_slug']
    );

    $query = new WP_Query($arg);
    if ($query->have_posts() ):
        $out .= '<div class="'.$param_default['class'].' news-content"><div class="container">';
        $out .= '<div class="'.$param_default['class'].'__title news-content__title block-title">'.$param_default['title'].'</div>';
        $out .= '<div class="b-news b-news_content js-slick js-news-content">';
        while ( $query->have_posts() ): 
            $query->the_post();    
            if (has_post_thumbnail()) $img_src = wp_get_attachment_image_url(get_post_thumbnail_id(),'medium');
                else $img_src = get_template_directory_uri().'/img/placeholder.jpg';
            $out .= '<div class="b-news__item"><div class="b-news__inner"><a class="b-news__link" href="'.get_the_permalink().'" title="'.get_the_title().'">';
            $out .= '<div class="b-news__title" data-mh="news-group">'.get_the_title().'</div>';
            $out .= '<div class="b-news__img" style="background-image:url('.$img_src.');"></div>';
            $out .= '<div class="b-news__txt">'.get_the_excerpt().'</div>';
            $out .= '<div class="b-news__btn_more btn">Подробнее</div>';
            $out .= '</a></div></div>';
        endwhile;
        $out .= '</div></div></div>';
    endif;
    wp_reset_postdata();
    return $out;
}

function the_last_news($num){
    $out = '';
    $arg =  array(
        'posts_per_page' => $num,
        'post_type' => 'post',
        'post_status' => 'publish',
        // 'category_name' => 'news'
    );
    $query = new WP_Query($arg);
    if ($query->have_posts() ):
        $out .= '<div class="b-news">';
        while ( $query->have_posts() ): 
            $query->the_post();    
            $out .= '<div class="b-news__item"><a class="b-news__link" href="'.get_the_permalink().'" title="'.get_the_title().'">';
            if (has_post_thumbnail()) $img_src = wp_get_attachment_image_url(get_post_thumbnail_id(),'medium');
                else $img_src = get_template_directory_uri().'/img/placeholder.jpg';
            $out .= '<div class="b-news__img" style="background-image:url('.$img_src.');"></div>';
            $out .= '<div class="b-news__body"><div class="b-news__title">'.get_the_title().'</div><div class="b-news__txt">'.get_the_excerpt().'</div></div>';
            $out .= '</a></div>';
        endwhile;
        $out .= '<a class="b-news__btn_more btn" href="'.home_url().'/useful/">Смотреть все новости</a></div>';
    endif;
    wp_reset_postdata();
    echo $out;
}

function get_custom_title(){
    $title = get_field('page_title');
    if (!$title) $title = get_the_title();
    return $title;
}

function the_custom_title(){
    echo get_custom_title();
}

function the_managers(){
    $out = '';
    $managers = get_field('managers',135);
    if ($managers): 
        $out .= '<div class="b-managers content-block">';
        $out .= '<div class="title-line title-line_blue"><span>Отдел по работе с клиентами:</span></div>';
        $out .= '<div class="b-managers__body">';
        $out .= '<div class="b-managers__items js-slick js-slider-managers">';
        foreach ($managers as $key => $value): 
            $out .= '<div class="b-managers__item"><div class="b-managers__inner"><div class="b-managers__img-wrap">';
            $out .= '<div class="b-managers__name">'.$value['name'].'<span>доб '.$value['dob'].'</span></div>';
            if ($value['img']) $img_src = $value['img']['sizes']['medium'];
                else $img_src = get_template_directory_uri().'/img/placeholder-man.jpg';
            $out .= '<div class="b-managers__img" style="background-image:url('.$img_src.')"></div></div>';
            $out .= '<a class="b-managers__email" href="mailto:'.$value['email'].'">'.$value['email'].'</a></div></div>';
        endforeach;
        $out .= '</div></div></div>';
        echo $out;
    endif;
}

$slider_with_thumb_count = 0;
function the_slider_with_thumb($imgs, $title = ''){
    global $slider_with_thumb_count;
    $out = '';
    if (is_array($imgs)): 
        $out .= '<div class="b-slider-with-thumb">';
        if ($title) {
            $out .= '<div class="b-slider-with-thumb__title">'.$title.'</div>';
        }
        $out .= '<div class="b-slider-with-thumb__body">';
        $out .= '<div class="b-slider-big__wrap"><div class="b-slider-big js-slick js-slider-big js-slider-big-'.$slider_with_thumb_count.'">';
        foreach ($imgs as $key => $value):
            $out .= '<div class="b-slider-big__item"><div class="b-slider-big__img" style="background-image:url('.$value['sizes']['large'].')"></div></div>';
        endforeach;
        $out .= '</div></div>';
        $out .= '<div class="b-slider-thumb__wrap"><div class="b-slider-thumb js-slick js-slider-big-thumb js-slider-big-thumb-'.$slider_with_thumb_count.'">';
        foreach ($imgs as $key => $value):
            $out .= '<div class="b-slider-thumb__item"><div class="b-slider-thumb__img" style="background-image:url('.$value['sizes']['thumbnail'].')"></div></div>';
        endforeach;
        $out .= '</div></div>';
        $out .= '</div></div>';
        echo $out;
        $slider_with_thumb_count++;
    endif;
}

function the_form_func($id = 0) {
    $out = '<div class="b-form">';
    $out .= '<div class="b-form__title title-line title-line_blue"><span>'.get_the_title($id).'</span></div>';
    $out .= do_shortcode( '[contact-form-7 id="'.$id.'"]' );
    $out .= '</div>';
    echo $out;
}


function the_contact_form($id = 0) {
    $clients_form = get_field('contact-form'); 
    if ($clients_form) the_form_func($clients_form);
        else if ($id != 0) the_form_func($id);
}

function the_contact_form_vacancy() {
    $clients_form = get_field('contact-form'); 
    if ($clients_form) {
        $out = '<div class="b-form b-form_vacancy">';
        $out .= do_shortcode( '[contact-form-7 id="'.$clients_form.'"]' );
        $out .= '</div>';
        echo $out;
    }
}

function the_relative($post_type = 'post' , $num = 4) {
    $out = '';
    $cur_id = get_the_ID();
    $cur_term = get_the_terms( $cur_id, 'product-type' );
    $arg = array();

    if ($cur_term) {
        $cur_term = $cur_term[0]->term_id;
        $arg = array(
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product-type',
                        'field'    => 'id',
                        'terms'    => $cur_term
                    )
                )
        );
    }

    if (!$cur_id) $arr_cur_id = '';
        else $arr_cur_id = array($cur_id);
        
    $arg =  array_merge($arg, array(
        'posts_per_page' => $num,
        'post_type' => $post_type,
        'post_status' => 'publish',
        'post__not_in' => $arr_cur_id,
        'orderby' => 'rand'
    ));

    $query = new WP_Query($arg);
    if ($query->have_posts() ):
        $out .= '<div class="b-grid__items js-slider-grid">';
        while ( $query->have_posts() ): 
            $query->the_post();    
            $out .= '<div class="b-grid-item"><a class="b-grid-item__link" href="'.get_the_permalink().'" title="'.get_the_title().'">';
            $out .= '<div class="b-grid-item__inner">';
            if (has_post_thumbnail()) $img_src = wp_get_attachment_image_url(get_post_thumbnail_id(),'medium');
                else $img_src = get_template_directory_uri().'/img/placeholder.jpg';
            $out .= '<div class="b-grid-item__img" style="background-image:url('.$img_src.');"></div>';
            $out .= '<div class="b-grid-item__caption">'.get_the_title().'</div>';
            if ($post_type == 'product' || $post_type == 'service')
                $out .= '</a><a href="#popup-form_order" class="b-grid-item__btn btn js-get-popup-form" data-title="'.get_the_title().'">Заказать в 1 клик</a>';
            else
                $out .= '<div class="b-grid-item__btn btn">Подробнее</div>';
            $out .= '</div>';
            if ($post_type != 'product' && $post_type != 'service')
                $out .= '</a>';
            $out .= '</div>';
        endwhile;
        $out .= '</div>';
    endif;    
    wp_reset_postdata();
    echo $out;
}

function the_post_grid($post_type = 'product' , $num = -1, $title = '') {
    echo get_post_grid($post_type, $num, $title);
}

function get_post_grid($post_type = 'product' , $num = -1, $title = '') {
    $out = '';
    $arg =  array(
        'posts_per_page' => $num,
        'post_type' => $post_type,
        'post_parent' => 0,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    );
    if ($post_type == 'product') $btn_css = 'btn_c2';
        else $btn_css = 'btn';
    $query = new WP_Query($arg);
    if ($query->have_posts() ):
        $out .= '<div class="b-grid b-grid_products">';
        if ($title)
            $out .= '<div class="b-grid__title">'.$title.'</div>';
        $out .= '<div class="b-grid__body">';
        $out .= '<div class="b-grid__items js-slider-grid">';
        while ( $query->have_posts() ): 
            $query->the_post();    
            $out .= '<div class="b-grid-item"><a class="b-grid-item__link" href="'.get_the_permalink().'" title="'.get_the_title().'">';
            $out .= '<div class="b-grid-item__inner">';
            if (has_post_thumbnail()) $img_src = wp_get_attachment_image_url(get_post_thumbnail_id(),'medium');
                else $img_src = get_template_directory_uri().'/img/placeholder.jpg';
            $out .= '<div class="b-grid-item__img" style="background-image:url('.$img_src.');"></div>';
            $out .= '<div class="b-grid-item__caption"><span>'.get_the_title().'</span></div><div class="b-grid-item__btn '.$btn_css.'">Подробнее</div>';
            $out .= '</div>';
            $out .= '</a></div>';
        endwhile;
        $out .= '</div></div></div>';
    endif;    
    wp_reset_postdata();
    return $out;
}

function get_gallery($title =''){
    $out = '';
    $examples = get_field('imgs'); 
    if ($examples): 
        $out .= '<div class="b-gallery-imgs content-block">';
        if ($title)
            $out .= '<div class="b-gallery-imgs__title b-grid__title">'.$title.'</div>';
        $out .= '<div class="b-gallery-imgs__items js-slick js-slider-service-examples">';
        foreach ($examples as $key => $value):
            $out .= '<div class="b-gallery-imgs__item js-magnific-popup">';
            $out .= '<a href="'.$value['sizes']['large'].'" class="b-gallery-imgs__img" data-aload style="background-image:url('.$value['sizes']['medium'].')"></a>';
            $out .= '</div>';
        endforeach;
        $out .= '</div></div>';
    endif;
    return $out;
}

function get_form_product_param() {

    $product_price = array();
    $product_price_one = array();
    $product_imgs_color = array();
    for ($i=1; $i <= 2; $i++) { 
        $product_price_one['num'] = get_field('product_price_'.$i);
        $product_price_one['desc'] = sanitize_text_field(get_field('product_price_desc_'.$i));
        $product_price[] = $product_price_one;
    }
    for ($i=1; $i <= 16; $i++) {
        $product_imgs_color_one = get_field('product_color_'.$i);
        if ($product_imgs_color_one) $product_imgs_color[] = array('medium' => $product_imgs_color_one['sizes']['medium'], 'large' => $product_imgs_color_one['sizes']['large']);
            else $product_imgs_color[] = array('medium' => '', 'large' => '');
    }
    echo '<script>var product_title = "'.get_the_title().'", product_price = ', json_encode($product_price), ', product_imgs_color = ', json_encode($product_imgs_color), ';</script>';
}

function the_tel_link($tel = '') {
    echo 'tel:'.preg_replace("/[^0-9+]/","",$tel);
}

add_action('wp_head', 'set_menu_icons_to_js');
function set_menu_icons_to_js() {
    $out = '';
    $arg =  array(
        'posts_per_page' => -1,
        'post_type' => array('service','product'),
        'post_status' => 'publish',
    );
    $query = new WP_Query($arg);
    if ($query->have_posts() ):    
        while ( $query->have_posts() ): 
            $query->the_post();    
            $icon = get_field('icon-menu');
            if ($icon) $out[get_the_ID()] = $icon;
        endwhile;
    endif;
    wp_reset_postdata();
    echo '<script>var menu_icons = '.json_encode($out).'</script>';
}

add_filter( 'nav_menu_css_class', 'wpse_menu_item_id_class', 10, 2 ); 
function wpse_menu_item_id_class( $classes, $item )
{
    if( isset( $item->object_id ) )
        $classes[] = sprintf( 'wpse-object-id-%d', $item->object_id );

    return $classes;
}