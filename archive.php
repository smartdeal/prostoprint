<?php get_header(); ?>

<?php  
    $cur_post_type = get_post_type();
?>
<div class="content__title">
    <?php 
        $term_id = get_queried_object()->term_id;
        $term_title = get_field('title','category_'.$term_id);
        if (!$term_title) { $term_title = get_the_archive_title(); }
        $archive_title = get_field($cur_post_type.'_title', 'option');
        $archive_seo1 = get_field($cur_post_type.'_seo1', 'option');
        $archive_seo2 = get_field($cur_post_type.'_seo2', 'option');
        if ($archive_title) $term_title = $archive_title;
    ?>
    <h1><?php echo $term_title; ?></h1>
</div>    
<div class="content__body">
    <?php if (have_posts()): ?>
        <?php if ($archive_seo1): ?>
            <div class="content__seo content__seo_1"><?php echo $archive_seo1 ?></div>
        <?php endif; ?>
        <div class="content__list">
            <div class="b-news">
                <?php while (have_posts()): the_post(); 
                if ( ('product' == $cur_post_type || 'service' == $cur_post_type) && $post->post_parent )
                    continue;
                    $post_title = get_the_title(); 
                    $post_link = get_the_permalink();
                ?>
                <div class="b-news__item<?php if (!has_post_thumbnail()) echo ' b-news__item_without-img'?>" itemscope itemtype="http://schema.org/Article">
                    <?php if (has_post_thumbnail()): ?>
                        <a class="b-news__link" href="<?php echo $post_link; ?>" title="Перейти на страницу <?php echo $post_title; ?>">
                            <div data-aload class="b-news__img" style="background-image:url(<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(),'medium'); ?>);"></div>
                        </a>
                    <?php endif; ?>
                    <div class="b-news__body">
                        <a href="<?php echo $post_link; ?>" class="b-news__title" itemprop="headline" title="Перейти на страницу <?php echo $post_title; ?>"><?php echo $post_title; ?></a>
                        <?php if (get_the_excerpt()): ?>
                            <div class="b-news__txt" itemprop="articleBody"><?php the_excerpt(); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="b-news____btn-wrap">
                        <a href="<?php echo $post_link; ?>" class="b-news__btn-more btn" title="Перейти на страницу <?php echo $post_title; ?>">Подробнее</a>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
        <?php $pagi = paginate_links(array('prev_text' => '', 'next_text' => '')); ?>
        <?php if ($pagi): ?>
            <div class="pagi"><?php echo $pagi; ?></div>
        <?php endif; ?>
        <?php if ($archive_seo2): ?>
            <div class="content__seo content__seo_2"><?php echo $archive_seo2 ?></div>
        <?php endif; ?>    
    <?php endif; ?>
</div>

<?php get_footer(); ?>
