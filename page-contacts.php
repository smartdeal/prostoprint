<?php 
/*
Template Name: Контакты
Template Post Type: page
*/
?>
<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="content content_contacts" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    
            <?php 
                $page_contacts_tel = get_field('page-contacts-tel'); 
                $page_contacts_adr = get_field('page-contacts-adr'); 
                $page_contacts_email = get_field('page-contacts-email'); 
                $page_contacts_time = get_field('page-contacts-time'); 
            ?>
            <?php if ($page_contacts_tel || $page_contacts_adr || $page_contacts_email || $page_contacts_time): ?>
                <div class="b-contacts content-block">
                    <?php if ($page_contacts_tel): ?>
                        <div class="b-contacts__item">
                            <div class="b-contacts__icon b-contacts__icon_tel"></div>
                            <div class="b-contacts__text"><a href="tel:<?php echo preg_replace("/[^0-9+]/","",$page_contacts_tel); ?>"><?php echo $page_contacts_tel; ?></a><span>Многоканальный</span></div>
                        </div>
                    <?php endif ?>
                    <?php if ($page_contacts_adr): ?>
                        <div class="b-contacts__item">
                            <div class="b-contacts__icon b-contacts__icon_adr"></div>
                            <div class="b-contacts__text"><?php echo $page_contacts_adr; ?></div>
                        </div>
                    <?php endif ?>
                    <?php if ($page_contacts_email): ?>
                        <div class="b-contacts__item">
                            <div class="b-contacts__icon b-contacts__icon_email"></div>
                            <div class="b-contacts__text b-contacts__text_email"><a href="mailto:<?php echo $page_contacts_email; ?>"><?php echo $page_contacts_email; ?></a><span>Почта для заказов</span></div>
                        </div>
                    <?php endif ?>
                    <?php if ($page_contacts_time): ?>
                        <div class="b-contacts__item">
                            <div class="b-contacts__icon b-contacts__icon_time"></div>
                            <div class="b-contacts__text"><?php echo $page_contacts_time; ?></div>
                        </div>
                    <?php endif ?>
                </div>
            <?php endif ?>
            <?php /* $page_contacts_social = get_field('page-contacts-social'); ?>
            <?php if ($page_contacts_social): ?>
                <div class="b-contacts-social">
                    <span class="b-contacts-social__caption">Мы в соц.сетях:</span>
                <?php foreach ($page_contacts_social as $key => $value): ?>
                    <a href="<?php echo $value['social-link'] ?>" class="b-contacts-social__icon <?php echo $value['social-icon'] ?>"></a>
                <?php endforeach ?>
                </div>
            <?php endif */?>
            <?php if (get_the_content()): ?>
                <div class="content__body">
                    <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
                </div>
            <?php endif ?>

            <?php // the_managers(); ?>

            <?php $page_contacts_walk = get_field('page-contacts-imgs-walk'); ?>
            <?php $page_contacts_auto = get_field('page-contacts-imgs-auto'); ?>
            <?php if ($page_contacts_walk || $page_contacts_auto): ?>
                <div class="b-page-contacts-imgs content-block">
                    <div class="title-line title-line_blue"><span>Пункты приема и выдачи заказов</span></div>
                    <div class="b-page-contacts-imgs__body">
                        <?php if ($page_contacts_walk) the_slider_with_thumb($page_contacts_walk, 'Как пройти от м. Преображенская площадь'); ?>
                        <?php if ($page_contacts_auto) the_slider_with_thumb($page_contacts_auto, 'Как пройти от ближайшей остановки'); ?>
                    </div>
                </div>
            <?php endif ?>            

            <?php $page_contacts_lat = get_field('page-contacts-lat'); ?>
            <?php $page_contacts_long = get_field('page-contacts-long'); ?>
            <?php if ($page_contacts_lat && $page_contacts_long): ?>
                <div class="b-page-contacts-map content-block">
                    <div class="title-line title-line_blue"><span>Мы на Яндекс.карте</span></div>
                    <div class="b-page-contacts-map__body"><div id="map"></div></div>
                </div>
                <hr>
            <?php endif; ?>
            
            <?php the_contact_form(); ?>

        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
