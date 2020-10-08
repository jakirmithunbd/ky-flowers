<?php get_header(); ?>

<?php
$bg = get_field('shop_page_backgorund', get_the_ID()) ? get_field('shop_page_backgorund', get_the_ID()) : get_theme_file_uri( '/assets/images/shop-banner-bg.jpg' ); 
 
?>
<section class="page-banner woocommerce-page-title" style="background: url(<?php echo $bg; ?>);">
    <div class="container">
        <div class="col-md-12">
            <div class="section-title text-center">
                <h2 class="wow fadeInUp"><?php the_title(); ?></h2>
            </div>
        </div>
    </div>
</section>
    

<div id="primary" class="content-area">
    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-details wow fadeInUp">
                        <?php if (have_posts()): while (have_posts()): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- /primary -->

<?php get_footer(); ?>