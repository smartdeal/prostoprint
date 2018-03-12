<?php 
/*
Template Name: Вакансии
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="content content_about" itemscope itemtype="http://schema.org/Article">
            <div class="content__title">
                <h1 itemprop="headline"><?php the_custom_title(); ?></h1>
            </div>    

            <?php if ('' !== get_post()->post_content): ?>
                <div class="content__body">
                    <div class="content__txt" itemprop="articleBody"><?php the_content(); ?></div>
                </div>            
            <?php endif ?>            

            <?php $vacancy = get_field('vacancy'); ?>
            <?php if ($vacancy && is_array($vacancy)): ?>
                <div class="b-accord b-accord_vacancy content-block">
                    <div class="b-accord__items">
                        <?php foreach ($vacancy as $key => $value): ?>
                            <div class="b-accord__item">
                                <div class="b-accord__header">
                                    <div class="b-accord__title"><?php echo $value['name'] ?></div>
                                    <div class="b-accord__title-btns">
                                        <a href="#" class="btn_c2 btn_vacancy js-btn-vacancy">Откликнуться на вакансию</a>
                                        <a href="#" class="btn-accordeon-more js-btn-accordeon-more"></a>
                                    </div>
                                </div>
                                <?php 
                                    $vacancy_responsibility =  $value['responsibility'];
                                    $vacancy_requirements =  $value['requirements'];
                                    $vacancy_conditions =  $value['conditions'];
                                ?>
                                <div class="b-accord__desc">
                                    <div class="b-vacancy__body">
                                        <?php if ($vacancy_responsibility): ?>
                                            <div class="b-vacancy__item">
                                                <div class="b-vacancy__title">Обязанности:</div>
                                                <div class="b-vacancy__desc"><?php echo $vacancy_responsibility ?></div>
                                            </div>
                                        <?php endif ?>
                                        <?php if ($vacancy_requirements): ?>
                                            <div class="b-vacancy__item">
                                                <div class="b-vacancy__title">Требования:</div>
                                                <div class="b-vacancy__desc"><?php echo $vacancy_requirements ?></div>
                                            </div>
                                        <?php endif ?>
                                        <?php if ($vacancy_conditions): ?>
                                            <div class="b-vacancy__item">
                                                <div class="b-vacancy__title">Условия</div>
                                                <div class="b-vacancy__desc"><?php echo $vacancy_conditions ?></div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <?php the_contact_form_vacancy(); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif ?>            
        </div>
    <?php endwhile ?>
<?php endif; ?>

<?php get_footer(); ?>
