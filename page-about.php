<?php 
/*
Template Name: О компании
Template Post Type: page
*/
?>
<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="content content_about" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    
            <?php if (get_field('about-target-txt')): ?>
                <div class="b-about-target content-block">
                    <div class="title-line title-line_red">Наша цель</div>
                    <div class="b-about-target__body">
                        <div class="b-about-target__txt"><?php the_field('about-target-txt'); ?></div>
                        <?php if (get_field('about-target-title')): ?>
                            <div class="b-about-target__sing"><?php the_field('about-target-title'); ?></div>
                        <?php endif ?>
                    </div>
                </div>
            <?php endif ?>
            <?php $bullets = get_field('bullet-items'); ?>
            <?php if ($bullets): ?>
                <div class="b-bullet b-bullet_about content-block">
                    <div class="title-line"><span>Наши ценности </span>и приоритеты:</div>
                    <div class="b-bullet__body">
                        <div class="b-bullet__items js-slick js-about-worth">
                            <?php foreach ($bullets as $key => $value): ?>
                                <div class="b-bullet__item b-bullet__item_<?php echo $key+1 ?>">
                                    <div class="b-bullet__img-wrap">
                                        <div class="b-bullet__img"></div>
                                    </div>
                                    <div class="b-bullet__caption js-bullet-caption"><span><?php echo $value['caption'] ?></span></div>
                                    <div class="b-bullet__txt"><?php echo $value['desc'] ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>                    
                    </div>
                </div>
            <?php endif ?>
            <div class="content__body">
                <div class="content__txt content__txt_bg-grey" itemprop="articleBody"><?php the_content(); ?></div>
            </div>
            
            <?php // the_managers(); ?>
            
            <?php
                $production_imgs = get_field('production-imgs',159); 
                $production_items = get_field('production-items',159);
            ?>
            <?php if ($production_imgs || $production_items): ?>
                <div class="b-our-production content-block">
                    <div class="title-line">Наше <span>производство</span></div>
                    <div class="b-our-production__body">
                        <?php if ($production_imgs): ?>
                            <?php the_slider_with_thumb($production_imgs); ?>
                        <?php endif; ?>
                        <?php if (is_array($production_items)): ?>
                            <div class="b-numered-list-two">
                                <ol>
                                    <?php foreach ($production_items as $key => $value): ?>
                                        <li><?php echo $value['item'] ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php $cooperation = get_field('about-cooperation-txt'); ?>
            <?php if ($cooperation): ?>
                <div class="b-about-cooperation content-block">
                    <div class="title-line"><span>Сотрудничество</span></div>
                    <div class="b-about-cooperation__body"><?php echo $cooperation; ?></div>
                </div>
            <?php endif ?>
        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
