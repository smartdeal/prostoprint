<?php get_header(); ?>

<?php if (have_posts()) { 
    while (have_posts()) { the_post();
        $post_title = get_field('page_title');
        if (!$post_title) $post_title = get_the_title();
        $post_content = get_the_content();
	}}                 
?>			

<?php 
    $main_blocks = get_field('main_blocks');
    if ($main_blocks):
?>

    <div class="b-2ban">
        <div class="container">
            <div class="b-2ban__inner">
                <?php foreach ($main_blocks as $key => $value): ?>
                    <div class="b-2ban__item b-2ban__item_<?php echo $key+1 ?>">
                        <div class="b-2ban__title"><?php echo $value['title'] ?></div>
                        <div class="b-2ban__desc"><?php echo $value['txt'] ?></div>
                        <a href="<?php echo $value['link'] ?>" class="b-2ban__btn btn">Подробнее</a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php get_template_part( 'inc/inc-why-we' ); ?>

<div class="content__title content__title_home">
    <div class="container">
        <h1><?php echo $post_title ?></h1>
    </div>
</div>

<?php if ($post_content): ?>
    <div class="content__body content__body_home">
        <div class="container">
            <div class="content__txt" itemprop="articleBody"><?php echo do_shortcode($post_content); ?></div>
        </div>
    </div>
<?php endif; ?>

<div class="b-partners-logo">
    <div class="container">
        <div class="b-partners-logo__title"><b>Работаем </b>с такими компаниями</div>
        <div class="b-partners-logo__body">
            <div class="b-partners-logo__items js-partners-logo">
                <div class="b-partners-logo__item"><div class="b-partners-logo__inner"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-1.png"></div></div>
                <div class="b-partners-logo__item"><div class="b-partners-logo__inner"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-2.png"></div></div>
                <div class="b-partners-logo__item"><div class="b-partners-logo__inner"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-3.png"></div></div>
                <div class="b-partners-logo__item"><div class="b-partners-logo__inner"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-4.png"></div></div>
                <div class="b-partners-logo__item"><div class="b-partners-logo__inner"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-5.png"></div></div>
                <div class="b-partners-logo__item"><div class="b-partners-logo__inner"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-1.png"></div></div>
                <div class="b-partners-logo__item"><div class="b-partners-logo__inner"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-2.png"></div></div>
            </div>
            <div class="b-partners-logo__arrow-prev"></div>
            <div class="b-partners-logo__arrow-next"></div>
        </div>
    </div>
</div>

<?php 
    $imgs_work_examples = get_gallery('<span class="red">Примеры </span>наших работ'); 
    if ($imgs_work_examples): ?>
        <div class="b-work-examples">
            <div class="container">
                <?php echo $imgs_work_examples; ?>
                <a class="btn btn_imgs-more" href="<?php echo home_url() ?>/work-examples">Посмотреть все работы</a>
            </div>
        </div>
    <?php endif; ?>

<?php 
    $seo_bottom = get_field('seo_bottom');
    if ($seo_bottom):
 ?>
    <div class="b-seo b-seo_grey">
        <div class="container">
            <?php echo $seo_bottom; ?>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>