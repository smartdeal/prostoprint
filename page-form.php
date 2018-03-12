<?php 
/*
Template Name: Расчет стоимости
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

            <div class="f-ui-form f-ui-form_mega js-form-ui js-form-mega">
                <?php echo do_shortcode( '[contact-form-7 id="720" title="Расчет стоимости"]' ); ?>
            </div>         

            <?php if ('' !== get_post()->post_content): ?>
                <div class="content__body">
                    <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
                </div>            
            <?php endif ?>            

        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
