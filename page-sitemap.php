<?php 
/*
Template Name: Карта сайта
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="content content_sitemap" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    

            <?php if ('' !== get_post()->post_content): ?>
                <div class="content__body">
                    <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
                </div>            
            <?php endif ?>            

            <?php $pay_type = get_field('pay_type'); ?>
            <?php if ($pay_type && is_array($pay_type)): ?>
                <div class="b-pay content-block">
                    <div class="b-pay__items js-slick js-slider-pay">
                        <?php foreach ($pay_type as $key => $value): ?>
                            <div class="b-pay__item">
                                <div class="b-pay__inner">
                                    <div class="b-pay__title">
                                        <div class="b-pay__icon <?php echo $value['icon'] ?>"></div>
                                        <div class="b-pay__caption"><?php echo $value['caption'] ?></div>
                                    </div>
                                    <?php $pay_items = $value['items']; ?>
                                    <?php if ($pay_items && is_array($pay_items)): ?>
                                        <div class="b-pay-desc">
                                            <?php foreach ($pay_items as $value2): ?>
                                                <div class="b-pay-desc__item">
                                                    <?php if ($value2['icon']): ?>
                                                        <div class="b-pay-desc__icon <?php echo $value2['icon'] ?>"></div>
                                                    <?php endif ?>
                                                    <div class="b-pay-desc__caption"><?php echo $value2['caption'] ?></div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif ?>            
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif ?>            

            <?php the_contact_form(); ?>
        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
