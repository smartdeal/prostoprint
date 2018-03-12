<?php 
/*
Template Name: Примеры работ
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

            <?php if ('' !== get_post()->post_content): ?>
                <div class="content__body">
                    <div class="content__txt" itemprop="articleBody">
                        <?php the_content(); ?>
                    </div>
                </div>            
            <?php endif ?>        

            <?php $exampl = get_field('exampl'); ?>
            <?php if ($exampl): ?>
                <?php foreach ($exampl as $key => $ex1): ?>
                    <div class="b-gallery-imgs b-gallery-imgs_examples content-block">
                        <?php if ($ex1['title']): ?>
                            <div class="b-gallery-imgs__title title-line_blue"><span><?php echo $ex1['title'] ?></span></div>
                        <?php endif ?>
                        <div class="b-gallery-imgs-wrap js-imgs-more">
                            <div class="b-gallery-imgs__items js-slick js-slider-service-examples">
                                <?php foreach ($ex1['imgs'] as $key => $value): ?>
                                    <div class="b-gallery-imgs__item js-magnific-popup">
                                        <a href="<?php echo $value['sizes']['large'] ?>" class="b-gallery-imgs__img" data-aload style="background-image:url(<?php echo $value['sizes']['medium'] ?>)"></a>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>

            <?php $seo_title = get_field('seo_title'); ?>
            <?php $seo_txt = get_field('seo_txt'); ?>
            <?php if ($seo_title || $seo_txt): ?>
                <div class="content-block content-block_service">
                    <?php if ($seo_title): ?>
                        <div class="title-line_blue"><span><?php echo $seo_title ?></span></div>
                    <?php endif; ?>
                    <?php if ($seo_txt): ?>
                        <div class="content__txt" itemprop="articleBody"><?php echo $seo_txt ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <hr>
        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
