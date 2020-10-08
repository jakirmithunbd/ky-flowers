
<?php
$bg = get_the_post_thumbnail_url(get_the_ID()) ? get_the_post_thumbnail_url(get_the_ID()) : get_theme_file_uri( '/assets/images/about-banner.jpg' ); 
 
?>
<section class="page-banner" style="background: url(<?php echo $bg; ?>);">
    <div class="container">
        <div class="col-md-12">
            <div class="section-title text-center">
                <h2 class="wow fadeInUp"><?php echo get_the_title(); ?></h2>
                <p class="wow fadeInUp"><?php echo get_field('page_header_description'); ?></p>
            </div>
        </div>
    </div>
</section>