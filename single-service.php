<?php 

get_header(); 

if (have_posts()): 
    while (have_posts()): the_post();
?>

        <div class="content content_service" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    

<?php
        if ( '1' === get_field('page_template')): // Catalog or Single service
            get_template_part( 'inc/inc-services-tpl-catalog' );
        else:
            get_template_part( 'inc/inc-services-tpl-single' );
        endif;

        get_template_part( 'inc/inc-services-relative' );
        get_template_part( 'inc/inc-why-we' );
        get_template_part( 'inc/inc-five-reason' );
?>
        </div>
<?php 
    endwhile;
endif;

get_footer();

?>