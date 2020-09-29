<?php get_header(); ?>

<!-- begin Banner -->
<section class="default-page-banner page-banner">
    <div class="container">
        <div class="banner-content wow fadeInUp">
            <h1><?php echo get_the_title( get_the_ID() ); ?></h1>
        </div>
    </div>
</section><!--  /end of Banner -->

<section class="blog-page page-content">
    <div class="container-fluid">   
        <div class="row">
            <div class="col-md-7 col-sm-7 col-xs-12">
                <?php 

                while(have_posts()) : the_post() ; ?>
                    <div class="post">
                        <h2 class="post-title"><?php the_title(); ?></h2>

                        <div class="data">
                            <p><span class="far fa-clock"></span><?php echo get_the_date(); ?> </p>
                            <p class="author"> <?php _e('by', 'dakota'); ?> <?php the_author(); ?></p>
                        </div>

                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail(null, array('class'=> 'img-responsive')); ?>
                        <?php endif; ?>
                        <?php the_content(); ?>
                    </div>
                    
                <?php endwhile; wp_reset_postdata(); ?>

                <div class="post-comments">
                    <?php 
                        if ( comments_open() ) {
                            comments_template();
                        }
                    ?>
                </div>

            </div><!-- /col-8 -->

            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="sidebar">
                    <?php echo get_sidebar('sidebar-1'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="post-pagination">
                    <?php echo previous_post_link( '%link', '< Previous' ); ?>
                    <?php echo next_post_link( '%link', 'Next >' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>