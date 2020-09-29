<?php get_header(); 
/*
	Template Name: Blog
*/ 
?>
<?php
$bg = get_field('page_header_background', getPageID()) ? get_field('page_header_background', getPageID()) : get_theme_file_uri( '/assets/images/page-banner.jpg' ); 
$page_id = get_option( 'page_for_posts' );
 
?>

<section class="page-banner">
    <div class="container-fluid">
        <div class="row align-center">
            <div class="col-sm-4 banner-title-wrapper">
                <div class="text-center text-uppercase page-title"><?php _e('Blog', 'res'); ?></div>
            </div>
            <div class="col-sm-8 media-wrapper">
                <div class="media">
                    <img src="<?php echo $bg; ?>" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- begin blog-page -->
<section class="blog-page">
	<div class="container">
		<div class="row">
			<?php $active = is_active_sidebar('sidebar-1') ? 'col-md-8 col-sm-8 col-xs-12' : 'col-xs-12'; ?>
			<div class="<?php echo $active; ?>">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			    <div class="post">
                    <a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="data">
                        <p><span class="far fa-clock"></span><?php echo get_the_date(); ?></p>
                        <p class="author"><?php _e('by', 'dakota'); ?> <?php the_author(); ?></p>
                    </div>

                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(null, array('class'=> 'img-responsive')); ?>
                    <?php endif; ?>
                    <?php the_excerpt(); ?>

                    <div class="post-link">

                        <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More', 'dakota'); ?> <span class="fas fa-angle-right"></span></a>

                        <a class="comments" href="<?php the_permalink(); ?>"><span class="far fa-comment"></span> <?php comments_number(); ?></a>
                    </div>
                </div>
			<?php endwhile; endif; wp_reset_postdata(); ?>

			<?php the_posts_pagination( array (
				'mid_size'  => 2,
				'screen_reader_text' => ' ',
				'prev_text' => __( '<', 'pet' ),
				'next_text' => __( '>', 'pet' ),
			) ); ?>
			</div>

			<?php if (is_active_sidebar( 'sidebar-1' )) : ?>
			<div class="col-md-4 col-sm-4 col-xs-12">
			    <div class="sidebar">
                    <?php  dynamic_sidebar( 'sidebar-1' ); ?>
                </div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section><!--  /end of blog-page -->
<?php get_footer(); ?>