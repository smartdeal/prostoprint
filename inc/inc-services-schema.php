<?php $schema = get_field('bullet-items',487); ?>
<?php if ($schema): ?>
    <div class="content-block b-interaction">
        <div class="b-interaction__title content-block__title"><?php echo get_the_title(487) ?></div>
        <div class="b-bullet__items js-slick js-slider-interaction">
            <?php foreach ($schema as $key => $value): ?>
                <div class="b-bullet__item b-bullet__item_<?php echo $key+1 ?>">
                    <div class="b-bullet__img-wrap">
                        <div class="b-bullet__num"><?php echo $key+1 ?></div>
                        <div class="b-bullet__img"></div>
                    </div>
                    <div class="b-bullet__txt"><?php echo $value['desc'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>      