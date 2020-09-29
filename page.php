<?php get_header(); ?>

<?php echo get_template_part( 'template-parts/page-header' ); ?>

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