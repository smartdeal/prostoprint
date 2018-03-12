<?php 
/*
Template Name: Порядок работы
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

            <?php $terms = get_field('terms'); ?>
            <?php if ($terms && is_array($terms)): ?>
                <div class="b-terms content-block">
                    <div class="b-terms__items">
                        <?php foreach ($terms as $key => $value): ?>
                            <div class="b-terms__item">
                                <a class="b-terms__title title-line_red" href="#"><span><?php echo $value['caption'] ?></span></a>
                                <div class="b-terms__desc">
                                    <div class="b-terms__icon <?php echo $value['icon'] ?>"></div>
                                    <div class="b-terms__txt"><?php echo $value['text'] ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif ?>            

            <?php $table_caption = get_field('table_caption'); ?>
            <?php $table_table = get_field('table_table'); ?>
            <?php if ($table_caption || $table_table): ?>
                <div class="b-term-block">
                    <?php if ($table_caption): ?>
                        <div class="b-term-block__title title-line_blue"><span><?php echo $table_caption; ?></span></div>
                    <?php endif ?>            
                    <?php if ($table_table): ?>
                        <div class="b-term-block__table"><?php echo $table_table; ?></div>
                    <?php endif ?>            
                </div>
            <?php endif ?>            

            <?php if ('' !== get_post()->post_content): ?>
                <div class="content__body">
                    <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
                </div>            
            <?php endif ?>            

            <?php $text_blue = get_field('text-blue'); ?>
            <?php if ($text_blue): ?>
                <div class="b-text-blue b-text-blue_terms content-block"><?php echo $text_blue; ?></div>
            <?php endif ?>

        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
