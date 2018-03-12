<?php if ('' !== get_post()->post_content): ?>
    <div class="content__body">
        <div class="content__txt b-content-more" itemprop="articleBody">
            <?php the_content(); ?>
            <a href="#" class="btn_content-more js-btn-content-more" data-text="Скрыть">Подробнее</a>
        </div>
    </div>            
<?php endif ?>        

<div class="btns-wrap_service content-block">
    <?php 
        $hide_btn = get_field('service_hide_price_btn'); 
        if (empty($hide_btn)):
    ?>
        <a href="<?php the_permalink(719) ?>" class="btn btn_service">Стоимость</a>
    <?php endif; ?>
    <a href="#form-service" class="btn_c2 btn_service js-smooth-scrolling">Заказать</a>
</div>

<?php echo get_gallery('Примеры печати'); ?>

<?php $bullets = get_field('bullet-items',448); ?>
<?php if ($bullets): ?>
    <div class="b-bullet b-bullet_benefits content-block">
        <div class="title-line title-line_red"><span>Преимущества срочной печати</span></div>
        <div class="b-bullet__body">
            <div class="b-bullet__items js-slick js-about-worth">
                <?php foreach ($bullets as $key => $value): ?>
                    <div class="b-bullet__item b-bullet__item_<?php echo $key+1 ?>">
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

<?php $content = get_field('content_block_2'); ?>
<?php if ($content): ?>
    <div class="content-block content-block_service"><?php echo $content ?></div>
<?php endif; ?>

<?php $price = get_field('price'); ?>
<?php $price_title = get_field('price_title'); ?>
<?php if ($price && is_array($price)): ?>
    <div class="b-accord b-accord_price-service content-block">
        <?php if ($price_title): ?>
            <div class="b-accord__caption"><?php echo $price_title ?></div>
        <?php endif ?>   
        <div class="b-accord__items">
            <?php foreach ($price as $key => $value): ?>
                <div class="b-accord__item">
                    <div class="b-accord__header">
                        <div class="b-accord__title"><?php echo $value['caption'] ?></div>
                        <div class="b-accord__title-btns">
                            <a href="#" class="btn-accordeon-more js-btn-accordeon-more"></a>
                        </div>                                
                    </div>
                    <div class="b-accord__desc"><?php echo $value['table'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif ?>   

<div id="form-service" class="b-form b-form_service">
    <?php 
        $form_title = get_field('form_title');
        if (!$form_title) $form_title = 'Заказать услугу - '.get_custom_title();
    ?>
    <div class="b-form__title title-line title-line_blue"><span><?php echo $form_title ?></span></div>
    <?php echo do_shortcode( '[contact-form-7 id="485" title="Форма услуги"]' ); ?>
</div>

<?php $content = get_field('content_block_3'); ?>
<?php if ($content): ?>
    <div class="content-block content-block_service"><?php echo $content ?></div>
<?php endif; ?>    
