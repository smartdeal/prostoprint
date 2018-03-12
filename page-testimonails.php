<?php 
/*
Template Name: Отзывы
Template Post Type: page
*/
?>
<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="content content_testimonails" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    
            <div class="content__body">
                <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
            </div>

            <?php $testimonails = get_field('imgs'); ?>
            <?php if ($testimonails): ?>
                <div class="b-gallery-imgs content-block">
                    <div class="b-gallery-imgs__title title-line_red">Наши благодарственные письма</div>
                    <div class="b-gallery-imgs__items js-slick js-slider-testimonails">
                        <?php foreach ($testimonails as $key => $value): ?>
                            <div class="b-gallery-imgs__item js-magnific-popup">
                                <a href="<?php echo $value['sizes']['large'] ?>" class="b-gallery-imgs__img" data-aload style="background-image:url(<?php echo $value['sizes']['medium'] ?>)"></a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>

            <?php $text_block = get_field('text-block'); ?>
            <?php if ($text_block): ?>
                <div class="b-text-block content-block">
                     <div class="content__txt" itemprop="articleBody"><?php echo $text_block; ?></div>
                     <div class="btns-block">
                         <a class="btn btn_give-feedback js-smooth-scrolling" href="#give-feedback">Написать отзыв на странице</a>
                         <a class="btn btn_vk-feedback" href="#">Написать отзыв Вконтакте</a>
                     </div>
                </div>
            <?php endif ?>

            <?php $testimonails_blocks = get_field('tesimonails'); ?>
            <?php if ($testimonails_blocks): ?>
                <div class="b-testimonails-vk content-block">
                    <div class="b-testimonails-vk__title title-line_red"><span>Отзывы в нашей группе Вконтакте</span></div>
                    <div class="b-testimonails-vk__items js-slick js-slider-testimonails-vk">
                        <?php foreach ($testimonails_blocks as $key => $value): ?>
                            <div class="b-testimonails-vk__item">
                                <div class="b-testimonails-vk__inner" data-mh="my-group">
                                    <div class="b-testimonails-vk__img-wrap">
                                        <div class="b-testimonails-vk__img" style="background-image:url(<?php echo $value['img']['sizes']['thumbnail'] ?>)"></div>
                                    </div>
                                    <div class="b-testimonails-vk__desc">
                                        <div class="b-testimonails-vk__caption"><span><?php echo $value['name'] ?></span></div>
                                        <div class="b-testimonails-vk__company"><?php echo $value['company'] ?></div>
                                        <div class="b-testimonails-vk__text"><?php echo $value['text'] ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
            <hr>
            <div id="give-feedback"></div>
            <?php the_contact_form(); ?>

            <?php $text_block = get_field('text-block_2'); ?>
            <?php if ($text_block): ?>
                <div class="content-block content-block__txt_testimonails"><?php echo $text_block; ?></div>
            <?php endif ?>            
            
        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
