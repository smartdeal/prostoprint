<?php 

get_header(); 

$is_catalog = false;
$product_css = 'content_product';

if ( '1' === get_field('page_template')) { // Catalog or Single service
    $is_catalog = true;
    $product_css = 'content_catalog';
}

if (have_posts()): 
    while (have_posts()): the_post();
?>

        <div class="content <?php echo $product_css ?>" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    

<?php
        if ( $is_catalog ):
            get_template_part( 'inc/inc-services-tpl-catalog' );
        else:
            get_template_part( 'inc/inc-product-tpl-single' );
        endif;
        
        get_template_part( 'inc/inc-services-relative' );
        get_template_part( 'inc/inc-why-we' );
?>
        </div>
<?php 
    endwhile;
endif;

get_footer();

?>