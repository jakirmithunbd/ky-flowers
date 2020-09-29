
<?php 
/*
Template Name: Apartment
*/
get_header(); ?>

<?php echo get_template_part( 'template-parts/page-header' ); ?>
<section class="apartment-list-wrapper">
    <div class="container">
        <div class="apartment-lists">
            
            <?php $count = 1; $apartment_list = get_field('apartment_list'); if($apartment_list) : foreach ($apartment_list as $apartment) : 
            $class = $count % 2 == 0 ? 'reverse' : "";
            ?>

            <div class="row align-center <?php echo $class; ?>">
                <div class="col-sm-6 apartment-description wow fadeInUp">
                    <h2><?php echo $apartment['title']; ?></h2>
                    <?php echo $apartment['description']; ?>
                    <?php if ($apartment['button']): ?>
                    <a target="<?php echo $apartment['button']['target']; ?>" href="<?php echo $apartment['button']['url']; ?>" class="btn"><?php echo $apartment['button']['title']; ?><span class="glyphicon glyphicon-triangle-right"></span></a>
                    <?php endif; ?>
                </div>

                <div class="col-sm-6 apartment-media">

                    <div class="apartment-sliders">
                        <?php if ($apartment['slider_images']): foreach ($apartment['slider_images'] as $new_a_slider) : ?>
                        <div class="media-img wow fadeInUp" style="color: <?php echo $apartment['image_bg_color']; ?>; ">
                            <img src="<?php echo $new_a_slider['image']['url']; ?>" class="img-responsive" alt="">
                        </div>
                        <?php endforeach; endif ?>
                    </div>
                </div>
            </div>
            <?php $count++; endforeach; endif; ?>

        </div>
    </div>
</section>

<?php $tabs = get_field('floor_plans_content'); ?>
<section class="floor-plan">
    <div class="tab-navs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php the_field('floor_plans_title'); ?></h1>

                    <ul class="nav nav-tabs align-center">
                        <?php if ($tabs): foreach ($tabs as $key => $tab) : ?>
                        <li class="<?php if( $key == 0 ) echo 'active' ?>"><a data-toggle="tab" href="#tab_<?php echo $key; ?>"><?php echo $tab['tab_title']; ?></a></li>
                        <?php endforeach; endif ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="tab-content">
            <?php if ($tabs): foreach ($tabs as $key => $tab) : ?>
            <div id="tab_<?php echo $key; ?>" class="tab-pane fade <?php if( $key == 0 ) echo 'active in' ?>">
                <div class="row">
                    <div class="col-md-4">
                        <?php echo $tab['floor_info']; ?>
                    </div>

                    <div class="col-md-8">
                        <div class="media">
                            <img src="<?php echo $tab['image']['url']; ?>" class="img-responsive" alt="<?php echo $tab['image']['title']; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>