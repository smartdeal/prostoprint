<?php get_form_product_param(); ?>

<div class="f-ui-form f-ui-form_product <?php echo (get_field('product_size_disable')) ? 'f-ui-form_product-without-size' : '' ?> js-form-ui js-form-product">
    <?php echo do_shortcode( '[contact-form-7 id="618" title="Форма заказ товара"]' ); ?>
</div>

<?php if ('' !== get_post()->post_content): ?>
    <div class="content__body">
        <div class="content__txt" itemprop="articleBody">
            <?php the_content(); ?>
        </div>
    </div>            
<?php endif ?>        

<?php echo get_gallery('Примеры выполненных работ'); ?>