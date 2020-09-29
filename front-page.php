<?php 
/*
Template Name: Home
*/
get_header(); 

$banner = get_field('home_banner');
?>
<div class="home-banner">
    <div class="container-fluid">
        <div class="row align-center">
            <div class="col-sm-4">
                <div class="banner-content hidden-xs wow fadeInUp">
                    <p><?php echo $banner['sub_title']; ?></p>
                    <h1 class="text-uppercase"><?php echo $banner['title']; ?></h1>
                    <?php if ($banner['button']): ?>
                    <a href="<?php echo $banner['button']['url']; ?>" target="<?php echo $banner['button']['target']; ?>" class="btn"><?php echo $banner['button']['title']; ?> <span class="glyphicon glyphicon-triangle-right"></span></a>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="banner-sliders">
                    <?php if ($banner['banner_slider']): foreach ($banner['banner_slider'] as $b_slider) : ?>
                    <div class="media">
                        <?php $bg = $b_slider['bg_image'] ? $b_slider['bg_image'] : get_theme_file_uri( '/assets/images/banner.jpg' ); ?>
                        <img src="<?php echo $bg; ?>" class="img-responsive" alt="">
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="banner-content visible-xs wow fadeInUp">
                    <p><?php echo $banner['sub_title']; ?></p>
                    <h1><?php echo $banner['title']; ?></h1>
                    <?php if ($banner['button']): ?>
                    <a href="<?php echo $banner['button']['url']; ?>" target="<?php echo $banner['button']['target']; ?>" class="btn"><?php echo $banner['button']['title']; ?> <span class="glyphicon glyphicon-triangle-right"></span></a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="new-apartment">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title wow fadeInUp">
                    <h2><?php the_field('new_apartment_title'); ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="border-section-title wow fadeInUp">
        <div class="container">
            <span class="border-shape"></span>
        </div>
    </div>

    <div class="apartment-content">
        <div class="container">
            <div class="row wow fadeInUp">
                <?php the_field('new_apartment_content'); ?>
            </div>
        </div>
    </div>
</section>

<section class="apartment-list-wrapper">
    <div class="container">
        <div class="apartment-lists">
            
            <?php $count = 1; $apartment_list = get_field('new_apartment_list'); if($apartment_list) : foreach ($apartment_list as $apartment) : 
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

<?php $lbg = get_field('lifestyle_bg_image') ? get_field('lifestyle_bg_image') : get_theme_file_uri( '/assets/images/location-bg.jpg' ); ?>
<section class="location-life-style" style="background: url(<?php echo $lbg; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center wow fadeInUp">
                <?php the_field('lifestyle_content'); ?>
            </div>
        </div>
    </div>
</section>

<section class="points" id="location">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="points-wrapper">
                    <h2 class="wow fadeInUp text-uppercase"><?php the_field('points_title'); ?></h2>

                    <div class="points-items">
                        <?php $locations = get_field('locations'); if($locations) : foreach ($locations as $location) : ?>
                        <div class="point-item wow fadeInUp">
                            <div class="icon">
                                <img src="<?php echo $location['image']; ?>" class="img-responsive" alt="">
                            </div>
                            <?php echo $location['content']; ?>
                        </div>
                    <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="gmap"></div>
            </div>
        </div>
    </div>
</section>

<section class="guarantees">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 service-title align-center">
                <h1><?php the_field('guarantees_&_services_title'); ?></h1>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 align-center">
                <div class="service-type-wrapper">
                <?php $s_items = get_field('service_items'); if($s_items) : foreach ($s_items as $s_item) : ?>
                    <div class="service-type-item wow fadeInUp">
                        <div class="icon">
                            <img src="<?php echo $s_item['icon']['url']; ?>" class="img-responsive" alt="<?php echo $s_item['icon']['title']; ?>">
                        </div>
                        <div class="serviec-description">
                            <h4><?php echo $s_item['title']; ?></h4>
                            <?php echo $s_item['description']; ?>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team" id="team">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="team-s-title">
                    <h2 class="text-uppercase text-center wow fadeInUp"><?php the_field('team_title'); ?></h2>
                </div>
            </div>
        </div>

        <div class="row eq-height">
            <?php $teams = get_field('team_items'); if($teams) : foreach ($teams as $team): ?>
            <div class="col-md-6">
                <div class="team-item">
                    <div class="team-img wow fadeInUp">
                        <img src="<?php echo $team['image']; ?>" class="img-responsive" alt="">
                    </div>

                    <div class="team-meta wow fadeInUp">
                        <?php echo $team['content']; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>