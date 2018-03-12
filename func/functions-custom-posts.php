<?
/* 
* Add custom posts
*/

add_action( 'init', 'custom_post_type', 0 );
function custom_post_type() {

    $labels = array(
        'name'                => _x( 'Услуги', 'Post Type General Name', 'ivanych' ),
        'singular_name'       => _x( 'Услуга', 'Post Type Singular Name', 'ivanych' ),
        'menu_name'           => __( 'Услуги', 'ivanych' ),
        'parent_item_colon'   => __( 'Родит. Услуга', 'ivanych' ),
        'all_items'           => __( 'Все Услуги', 'ivanych' ),
        'view_item'           => __( 'Смотреть Услугу', 'ivanych' ),
        'add_new_item'        => __( 'Добавить новую Услугу', 'ivanych' ),
        'add_new'             => __( 'Добавить новую', 'ivanych' ),
        'edit_item'           => __( 'Редактировать Услугу', 'ivanych' ),
        'update_item'         => __( 'Обновить Услугу', 'ivanych' ),
        'search_items'        => __( 'Искать Услугу', 'ivanych' ),
        'not_found'           => __( 'Не найдено', 'ivanych' ),
        'not_found_in_trash'  => __( 'Не найдено в корзине', 'ivanych' ),
    );

    $args = array(
        'label'               => __( 'Услуги', 'ivanych' ),
        'description'         => __( '', 'ivanych' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions'),
        'taxonomies'          => array(),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 4,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );

    register_post_type( 'service', $args );

    $labels = array(
        'name'                => _x( 'Товары', 'Post Type General Name', 'ivanych' ),
        'singular_name'       => _x( 'Товар', 'Post Type Singular Name', 'ivanych' ),
        'menu_name'           => __( 'Товары', 'ivanych' ),
        'parent_item_colon'   => __( 'Родит. Товар', 'ivanych' ),
        'all_items'           => __( 'Все Товары', 'ivanych' ),
        'view_item'           => __( 'Смотреть Товар', 'ivanych' ),
        'add_new_item'        => __( 'Добавить новый Товар', 'ivanych' ),
        'add_new'             => __( 'Добавить новый', 'ivanych' ),
        'edit_item'           => __( 'Редактировать Товар', 'ivanych' ),
        'update_item'         => __( 'Обновить Товар', 'ivanych' ),
        'search_items'        => __( 'Искать Товар', 'ivanych' ),
        'not_found'           => __( 'Не найдено', 'ivanych' ),
        'not_found_in_trash'  => __( 'Не найдено в корзине', 'ivanych' ),
    );

    $args = array(
        'label'               => __( 'Товары', 'ivanych' ),
        'description'         => __( '', 'ivanych' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
        'taxonomies'          => array(),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );

    register_post_type( 'product', $args );

    $labels = array(
        'name'                => _x( 'Контент-блоки', 'Post Type General Name', 'ivanych' ),
        'singular_name'       => _x( 'Контент-блок', 'Post Type Singular Name', 'ivanych' ),
        'menu_name'           => __( 'Контент-блоки', 'ivanych' ),
        'parent_item_colon'   => __( 'Родит. Контент-блок', 'ivanych' ),
        'all_items'           => __( 'Все Контент-блоки', 'ivanych' ),
        'view_item'           => __( 'Смотреть Контент-блок', 'ivanych' ),
        'add_new_item'        => __( 'Добавить новый Контент-блок', 'ivanych' ),
        'add_new'             => __( 'Добавить новый', 'ivanych' ),
        'edit_item'           => __( 'Редактировать Контент-блок', 'ivanych' ),
        'update_item'         => __( 'Обновить Контент-блок', 'ivanych' ),
        'search_items'        => __( 'Искать Контент-блок', 'ivanych' ),
        'not_found'           => __( 'Не найдено', 'ivanych' ),
        'not_found_in_trash'  => __( 'Не найдено в корзине', 'ivanych' ),
    );

    $args = array(
        'label'               => __( 'Контент-блоки', 'ivanych' ),
        'description'         => __( '', 'ivanych' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'revisions', ),
        'taxonomies'          => array(''),
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 20,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'capability_type'     => 'page',
    );

    register_post_type( 'block', $args );


    register_taxonomy('product-type', array('product'), array(
        'labels'                => array(
            'name'              => 'Тип товара',
            'singular_name'     => 'Тип товара',
            'search_items'      => 'Искать Тип товара',
            'all_items'         => 'Все Типы товара',
            'parent_item'       => 'Родит. Тип товара',
            'parent_item_colon' => 'Родит. Тип товара:',
            'edit_item'         => 'Ред. Тип товара',
            'update_item'       => 'Обновить Тип товара',
            'add_new_item'      => 'Добавить Тип товара',
            'new_item_name'     => 'Новый Тип товара',
            'menu_name'         => 'Тип товара',
        ),
        'description'           => 'Типы товара',
        'public'                => true,
        'show_tagcloud'         => false,
        'hierarchical'          => true,
        'show_admin_column'     => false,
    ) );    

}

