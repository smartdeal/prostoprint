<?php 
    $why = get_field('block-why',494);
    $why_title = get_field('block-why-title',494);
?>
<?php if ($why): ?>

<div class="b-why-choose b-reason">
    <div class="b-why-choose__title block-title"><?php echo $why_title ?></div>
    <div class="b-why-choose__body">
        <div class="b-bullet__items js-slick js-why-choose">
            <?php foreach ($why as $key => $value): ?>
                <div class="b-bullet__item b-bullet__item_<?php echo $key+1 ?>">
                    <div class="b-bullet__caption js-why-choose-caption"><span><?php echo $value['caption'] ?></span></div>
                    <div class="b-bullet__img-wrap">
                        <div class="b-bullet__num"><?php echo $key+1 ?></div>
                        <div class="b-bullet__img"></div>
                    </div>
                    <div class="b-bullet__txt"><?php echo $value['desc'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php endif; ?>