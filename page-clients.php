<?php 
/*
Template Name: Наши клиенты
Template Post Type: page
*/
?>
<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="content content_clients" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    
            <div class="content__body">
                <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
            </div>
            <?php $clients = get_field('clients-imgs',186); ?>
            <?php if ($clients): ?>
                <div class="b-clients-logo content-block">
                    <div class="b-clients-logo__items">
                        <?php foreach ($clients as $key => $value): ?>
                            <div class="b-clients-logo__item"><img class="b-clients-logo__img" data-aload="<?php echo $value['sizes']['medium'] ?>"></div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
            <?php $clients_blocks = get_field('page-clients-blocks'); ?>
            <?php if ($clients_blocks): ?>
                <div class="b-clients-blocks content-block">
                <?php foreach ($clients_blocks as $key => $value): ?>
                    <div class="b-clients-block">
                        <div class="b-clients-block__title title-line"><span><?php echo $value['title'] ?></span></div>
                        <div class="b-clients-block__body"><?php echo $value['txt'] ?></div>
                    </div>
                <?php endforeach ?>
                </div>
            <?php endif ?>

            <?php the_contact_form(); ?>
            
        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
