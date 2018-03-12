<?php
// The Sidebar
?>

<div class="main-layout__sidebar">
	<div class="sidebar">
		<div class="b-widget b-widget_services">
			<div class="b-widget__title"><a href="/service/"><span class="red">Услуги </span>печати</a></div>
			<div class="b-widget__body">
				<?php 
                    wp_nav_menu( array(
                        'menu' 				=> 6,
                        'depth'             => 3,
                        'container'         => 'ul',
                        'menu_class'        => 'side-menu',
                        'container_class'   => 'cont',
                        'container_id'      => '',
                    ));
				?>
			</div>
		</div>
		<div class="b-widget b-widget_products">
			<div class="b-widget__title"><a href="/product/"><span class="red">Товары</span></a></div>
			<div class="b-widget__body">
				<?php 
                    wp_nav_menu( array(
                        'menu' 				=> 7,
                        'depth'             => 3,
                        'container'         => 'ul',
                        'menu_class'        => 'side-menu',
                        'container_class'   => 'cont',
                        'container_id'      => '',
                    ));
				?>				
			</div>
		</div>
		<div class="b-widget b-widget_news">
		    <div class="b-widget__title">Новости</div>
		    <div class="b-widget__body"><?php the_last_news(3); ?></div>
		</div>
	</div>
</div>