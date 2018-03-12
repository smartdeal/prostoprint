
<?php 

    $out = '';
    $arg =  array(
        'posts_per_page' => -1,
        'post_type' => get_post_type(),
        'post_parent' => get_the_ID(),
        'post_status' => 'publish',
    );
    $query = new WP_Query($arg);
    if ($query->have_posts() ):
        $out .= '<div class="b-grid b-grid_catalog"><div class="b-grid__items js-slider-grid">';
        while ( $query->have_posts() ): 
            $query->the_post();    
            $out .= '<div class="b-grid-item">';
            $out .= '<div class="b-grid-item__inner">';
            $out .= '<div class="b-grid-item__caption"><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></div>';
            if (has_post_thumbnail()) $img_src = wp_get_attachment_image_url(get_post_thumbnail_id(),'medium');
                else $img_src = get_template_directory_uri().'/img/placeholder.jpg';
            $out .= '<div class="b-grid-item__img" style="background-image:url('.$img_src.');"><a class="b-grid-item__link" href="'.get_the_permalink().'" title="'.get_the_title().'"></a></div>';
            $out .= '<a class="b-grid-item__btn btn js-get-popup-form" href="#popup-form_order" data-title="'.get_the_title().'">Заказать в 1 клик</a>';
            $out .= '</div>';
            $out .= '</a></div>';
        endwhile;
        $out .= '</div></div>';
    endif;    
    wp_reset_postdata();
    echo $out;
?>


<?php if ('' !== get_post()->post_content): ?>
    <div class="content__body">
        <div class="content__txt" itemprop="articleBody">
            <?php the_content(); ?>
        </div>
    </div>            
<?php endif ?>

<?php $content = get_field('content_block_2'); ?>
<?php if ($content): ?>
    <div class="content-block content-block_service"><?php echo $content ?></div>
<?php endif; ?>

<?php echo get_gallery('Примеры выполненных работ'); ?>

<?php get_template_part( 'inc/inc-services-schema' ) ?>