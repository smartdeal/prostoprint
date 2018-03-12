<?php 

function ivanych_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'News Sidebar', 'ivanych' ),
        'id'            => 'sidebar-news',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<div class="widget__title">',
        'after_title'   => '</div>',
    ) );
}
add_action( 'widgets_init', 'ivanych_widgets_init' );
