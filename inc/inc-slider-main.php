<?php 

$bg_slide = get_template_directory_uri().'/img/main-slide.jpg';
$main_slider = get_field('main-slider',22);
if ($main_slider):
?>

<div class="main-slider">
  <div class="main-slider__inner js-main-slider">
    <?php foreach ($main_slider as $key => $value): ?>
      <?php if ($value['img']) $bg_slide = $value['img']['sizes']['thumb1920']; ?>
      <div class="main-slider__item slider__item" style="background-image:url(<?php echo $bg_slide; ?>)">
        <div class="container">
          <div class="main-slider__inside">
            <?php if ($value['caption']): ?>
              <div class="main-slider__title"><?php echo $value['caption'] ?></div>
            <?php endif; ?>
            <?php if ($value['desc']): ?>
              <div class="main-slider__desc"><?php echo $value['desc'] ?></div>
            <?php endif; ?>
            <?php if ($value['link']): ?>
              <a href="<?php echo $value['link'] ?>" class="main-slider__btn btn">Подробнее</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php endif; ?>