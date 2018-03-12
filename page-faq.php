<?php 
/*
Template Name: FAQ
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="content content_faq" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    

            <?php $text_blue = get_field('text-blue'); ?>
            <?php if ($text_blue): ?>
                <div class="content-block content-block_faq"><?php echo $text_blue; ?></div>
            <?php endif ?>

            <?php $faq = get_field('faq'); ?>
            <?php if ($faq && is_array($faq)): ?>
                <div class="b-accord b-accord_faq content-block">
                    <div class="b-accord__items">
                        <?php foreach ($faq as $key => $value): ?>
                            <div class="b-accord__item">
                                <a class="b-accord__title js-accord-item" href="#"><?php echo ($key+1).'. '.$value['caption'] ?><span class="b-accord__btn"></span></a>
                                <div class="b-accord__desc"><?php echo $value['txt'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif ?>            

            <?php if ('' !== get_post()->post_content): ?>
                <div class="content__body">
                    <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
                </div>            
            <?php endif ?>            

            <?php the_contact_form(); ?>
        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
