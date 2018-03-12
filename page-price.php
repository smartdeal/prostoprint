<?php 
/*
Template Name: Прайс
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="content content_price" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    

            <?php if ('' !== get_post()->post_content): ?>
                <div class="content__body content__body_price">
                    <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
                </div>            
            <?php endif ?>            

            <?php $price = get_field('price'); ?>
            <?php if ($price && is_array($price)): ?>
                <div class="b-accord b-accord_price content-block">
                    <div class="b-accord__items">
                        <?php foreach ($price as $key => $value): ?>
                            <div class="b-accord__item">
                                <div class="b-accord__header">
                                    <div class="b-accord__title"><?php echo $value['caption'] ?></div>
                                    <div class="b-accord__title-btns">
                                        <a href="#" class="btn-accordeon-more js-btn-accordeon-more"></a>
                                    </div>                                
                                </div>
                                <div class="b-accord__desc"><?php echo $value['table'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif ?>            

            <?php $text_block = get_field('text-block'); ?>
            <?php if ($text_block): ?>
                <div class="content-block content-block__txt_price"><?php echo $text_block; ?></div>
            <?php endif ?>

            <hr>

            <?php the_contact_form(); ?>

            <?php $text_block = get_field('text-block_2'); ?>
            <?php if ($text_block): ?>
                <div class="content-block content-block__txt_price_2"><?php echo $text_block; ?></div>
            <?php endif ?>

        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
