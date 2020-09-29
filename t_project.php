
<?php 
/*
Template Name: Projet Progress
*/
get_header(); ?>

<?php echo get_template_part( 'template-parts/page-header' ); ?>

<section class="steps">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="step-title text-center">
                    <h2><?php the_field('steps_description'); ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="step-wrapper">
                    <h2 class="text-center"><?php the_field('steps_titile'); ?></h2>

                    <div class="step-item-wrapper">

                        <?php $steps = get_field('steps'); if($steps) : foreach ($steps as $step) : ?>
                        <div class="step <?php echo $step['select_status']; ?>">
                            <div class="icon">
                                <div class="icon-wrapper">
                                    <img src="<?php echo $step['icon']; ?>" alt="">
                                </div>
                                <p><?php echo $step['text']; ?></p>
                            </div>

                            <div class="icon-bar"><span class="fas fa-check"></span></div>
                        </div>
                        <?php endforeach; endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sliders-wrapper">
    <div class="container">
        <div class="sliders">
            <?php $sliders = get_field('sliders'); if($sliders) : foreach ($sliders as $slider) : ?>
            <div class="media">
                <img src="<?php echo $slider['image']['url']; ?>" class="img-responsive" alt="<?php echo $slider['image']['title']; ?>">
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>