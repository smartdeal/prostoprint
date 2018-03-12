<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="content content_index" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_title(); ?></h1>
            </div>    
            <div class="content__body">
                <?php if (has_post_thumbnail()): ?>
                    <img class="content__img" data-aload="<?php echo kama_thumb_src( 'w=830 &q=60', wp_get_attachment_image_url(get_post_thumbnail_id(),'full') ); ?>">
                <?php endif; ?>
                <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
            </div>
        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
