<?php get_header(); ?>
<?php
$bg = get_the_post_thumbnail_url(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID()) : get_theme_file_uri( '/assets/images/page-banner.jpg' ); 
 
?>
<section class="page-banner">
    <div class="container-fluid">
        <div class="row align-center">
            <div class="col-sm-4 banner-title-wrapper">
                <div class="text-center text-uppercase page-title"><?php the_title(); ?></div>
            </div>
            <div class="col-sm-8 media-wrapper">
                <div class="media">
                    <img src="<?php echo $bg; ?>" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
</section>