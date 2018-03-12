<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="ru-RU">
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo get_template_directory_uri(); ?>/favicon.png" rel="shortcut icon" type="image/png">
    <?php wp_head(); ?> 
  <meta name="google-site-verification" content="GI_PJ6XhxyToTvAQRueiy2Q6Ay-dTjN35qrWQsSvdGk" />
  <meta name="yandex-verification" content="b5e89b564c5eb407" />
</head>

<?php 

    $with_sidebar = true;
    $body_classes = '';
    if (is_front_page())
        $with_sidebar = false;
    if (!$with_sidebar)
        $body_classes .= ' page-without-sidebar';

?>

<body id="to-top" <?php body_class($body_classes); ?>>
    <?php the_field('option_code_top','option'); ?>

<div class="header">
    <div class="header__menu-wrap">
        <div class="container">
            <div class="header__menu js-header-menu">
                <?php 
                    if (function_exists('wp_nav_menu')) {
                        $add_menu = '<ul class="topmenu">';
                        $add_menu .= '<li id="menu-item-0000" class="menu-item wide menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-0000"><a href="'.home_url().'">Просто Принт</a>';
                        $add_menu .= wp_nav_menu( array( 'menu' => 5,   'container' => '', 'fallback_cb' => '', 'menu_class' => 'sub-menu', 'echo' => false ) );
                        $add_menu .='</li>';
                        $add_menu .= '<li id="menu-item-0001" class="menu-item wide menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-0001"><a href="/service/">Услуги печати</a>';
                        $add_menu .= wp_nav_menu( array( 'menu' => 6,   'container' => '', 'fallback_cb' => '', 'menu_class' => 'sub-menu', 'echo' => false ) );
                        $add_menu .='</li>';
                        $add_menu .= '<li id="menu-item-0002" class="menu-item wide menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-0002"><a href="/product/">Товары</a>';
                        $add_menu .= wp_nav_menu( array( 'menu' => 7,   'container' => '', 'fallback_cb' => '', 'menu_class' => 'sub-menu', 'echo' => false ) );
                        $add_menu .='</li>';
                        $add_menu .= wp_nav_menu( array( 'menu' => 2,   'container' => '', 'fallback_cb' => '', 'items_wrap' => '%3$s', 'menu_class' => '', 'echo' => false ) );
                        $add_menu .='</ul>';
                        echo($add_menu); 
                    }; 
                ?>
                <a class="header__call-btn btn js-get-popup-form" href="#popup-form_feedback">Заказать звонок</a>
            </div>
        </div>
    </div>
    <div class="header__inner">
        <div class="container">
            <div class="header__top">
                <div class="header__logo">
                    <?php if (!is_front_page()) { ?><a href="<?php echo home_url(); ?>"><?php } ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-main.png" alt="">
                    <?php if (!is_front_page()) { ?></a><?php } ?>
                </div>
                <div class="header__inside">
                    <div class="header__tagline"><strong>Печать символики и логотипов на одежду и другую продукцию</strong> с доставкой по Москве и РФ</div>
                    <div class="header__center">
                        <?php if ($main_email = get_field('option_email','option')): ?>
                            <a href="mailto:<?php echo $main_email ?>" class="header__email"><?php echo $main_email ?></a>
                        <?php endif; ?>
                        <?php if ($main_tel = get_field('option_tel','option')): ?>
                            <a class="header__tel" href="<?php the_tel_link($main_tel) ?>"><?php echo $main_tel; ?></a>
                        <?php endif; ?>
                        <div class="header__search">
                            <form class="header__search-form" role="search" method="get" action="/">
                                <input class="header__search-input" type="search" placeholder="Например, сигнальные жилеты" value="" name="s">
                            </form>
                        </div>
                    </div>
                </div>
                <a class="mmenu-btn js-mmenu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="main-layout">
    <?php get_template_part( 'inc/inc-get-calc' ); ?>
    <div class="content__inner">
            <?php if (!is_front_page()): ?>
                <div class="container">
            <?php endif; ?>
                <div class="content__wrap">
                    <?php if (!is_front_page()) get_sidebar(); ?>
                    <div class="main-layout__content">
                        <?php if ( !is_front_page() && function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumbs">','</div>'); } ?>
                        <?php if (is_front_page()) { get_template_part( 'inc/inc-slider-main' ); } ?>