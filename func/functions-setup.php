<?php 

function new_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );
    register_nav_menus( array(
            'primary' => __( 'Главное меню', 'ivanych' ), 
            'secondary' => __( 'Второстепенное меню', 'ivanych' ), 
            'footer' => __( 'Футер меню', 'ivanych' ), 
        ) 
    );
    if ( function_exists( 'add_image_size' ) ) { 
    //     add_image_size( 'middle', 300, 300, false ); 
        // add_image_size( 'thumb1024', 1024 );
        add_image_size( 'thumb1920', 1920 );

    }

}
add_action( 'after_setup_theme', 'new_setup' );


if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Настройки сайта',
        'menu_title'    => 'Настройки сайта',
        'redirect'  => false
    ));
    
}

add_action( 'pre_get_posts', 'my_change_sort_order'); 
    function my_change_sort_order($query){
        if(is_post_type_archive( 'product' ) || is_post_type_archive( 'service' )):
           $query->set( 'order', 'ASC' );
           $query->set( 'orderby', 'menu' );
        endif;    
    };


// disable update plugin ACF

function filter_plugin_updates( $value ) {
    unset( $value->response['advanced-custom-fields-pro/acf.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

// Add a widget to the dashboard.
function shortcodes_add_dashboard_widgets() {
    wp_add_dashboard_widget(
                 'shortcodes_dashboard_widget',         // Widget slug.
                 'Полезная информация',         // Title.
                 'shortcodes_dashboard_widget_function' // Display function.
        );  
}
add_action( 'wp_dashboard_setup', 'shortcodes_add_dashboard_widgets' );

function shortcodes_dashboard_widget_function() {
    echo 'Шорткоды для отображения информации в контенте страниц, записей и т.д.:<br>';
    echo '[get_tel] - Показать телефон. <a href="'.home_url().'/wp-admin/admin.php?page=acf-options-nastrojki-sajta">Редактируется</a> в настройках<br>';
    echo '[get_email] - Показать email. <a href="'.home_url().'/wp-admin/admin.php?page=acf-options-nastrojki-sajta">Редактируется</a> в настройках<br>';
    echo '[get_work_examples] - Показать примеры выполненных работ на страницах услуг и товаров.<br>';
    echo 'Изменить заголовок и СЕО-тексты на странице архива услуг и товаров <a href="'.home_url().'/wp-admin/admin.php?page=acf-options-nastrojki-sajta">можно в настройках</a><br>';
}


// Move Yoast to bottom
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

// add_action('init', function () {
//      add_rewrite_rule('portfolio/?$','index.php?pagename=portfolio', 'top');
//      flush_rewrite_rules();
// }, 1000);


function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}
