<?php 
/*
Template Name: Доставка
Template Post Type: page
*/
?>
<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="content content_delivery" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    
            <?php if ('' !== get_post()->post_content): ?>
                <div class="content__body">
                    <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
                </div>            
            <?php endif ?>

            <?php $bullets = get_field('bullet-items'); ?>
            <?php if ($bullets): ?>
                <div class="b-bullet b-bullet_delivery content-block">
                    <div class="b-bullet__body">
                        <div class="b-bullet__items js-slick js-about-worth">
                            <?php foreach ($bullets as $key => $value): ?>
                                <div class="b-bullet__item b-bullet__item_<?php echo $key+1 ?>">
                                    <?php if ($value['caption']): ?>
                                        <div class="b-bullet__caption js-bullet-caption"><span><?php echo $value['caption'] ?></span></div>
                                    <?php endif ?>
                                    <div class="b-bullet__img-wrap">
                                        <div class="b-bullet__img"></div>
                                    </div>
                                    <div class="b-bullet__txt"><?php echo $value['desc'] ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>                    
                    </div>
                </div>
            <?php endif ?>            

            <?php $page_content = get_field('page_content'); ?>
            <?php if ($page_content): ?>
                <div class="b-page-content content-block">
                     <div class="content__txt" itemprop="articleBody"><?php echo  $page_content; ?></div>
                </div>
            <?php endif ?>
            <?php $page_contacts_social = get_field('page-contacts-social'); ?>
            <?php if ($page_contacts_social): ?>
                <div class="b-contacts-social">
                    <span class="b-contacts-social__caption">Мы в соц.сетях:</span>
                <?php foreach ($page_contacts_social as $key => $value): ?>
                    <a href="<?php echo $value['social-link'] ?>" class="b-contacts-social__icon <?php echo $value['social-icon'] ?>"></a>
                <?php endforeach ?>
                </div>
            <?php endif ?>

            <?php $delivery_services = get_field('delivery-services'); ?>
            <?php if ($delivery_services && is_array($delivery_services)): ?>
                <div class="b-delivery-services content-block">
                    <div class="b-delivery-services__body">
                        <div class="b-delivery-services__items">
                            <?php foreach ($delivery_services as $key => $value): ?>
                                <div class="b-delivery-services__item">
                                    <div class="b-delivery-services__img">
                                        <img data-aload="<?php echo $value['logo']['sizes']['medium'] ?>" alt="">
                                    </div>
                                    <div class="b-delivery-services__desc">
                                        <div class="b-delivery-services__name"><?php echo $value['caption'] ?></div>
                                        <div class="b-delivery-services__tel"><?php echo $value['tel'] ?></div>
                                        <a class="b-delivery-services__link" href="<?php echo $value['link'] ?>"><?php echo $value['site'] ?></a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>            

            <?php $benefits = get_field('list-numbered'); ?>
            <?php if ($benefits && is_array($benefits)): ?>
                <div class="b-benefits content-block">
                    <div class="title-line">Преимущества доставки транспортными компаниями</div>
                    <div class="b-benefits__body">
                        <div class="b-numered-list-two">
                            <ol>
                                <?php foreach ($benefits as $key => $value): ?>
                                    <li><?php echo $value['item'] ?></li>
                                <?php endforeach; ?>
                            </ol>
                        </div>                    
                    </div>
                </div>
            <?php endif ?>            

            <?php $text_blue = get_field('text-blue'); ?>
            <?php if ($text_blue): ?>
                <div class="b-text-blue b-text-blue_delivery content-block"><?php echo $text_blue; ?></div>
            <?php endif ?>            
            <hr>
            <?php the_contact_form(); ?>
        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
