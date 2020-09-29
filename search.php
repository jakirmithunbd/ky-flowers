<?php get_header(); 
$page_id = get_queried_object_id();
?>

<section class="seach-area">
    <div class="container">
        <div class="row">
        <?php  
		$args = [
			's' => get_search_query(),
			'posts_per_page' => -1,
		];
		$loop = new WP_Query($args);

		if($loop->have_posts()) : 
        ?>
            <div id="search-result" class="col-md-12 col-sm-12">
            	<div class="search-title">
            		<h2 class="pull-left"><?php echo _e('Search Results', 'pet'); ?></h2>
            		<div class="search-form pull-right">
            			<?php echo pet_search_form(); ?>
            		</div>
            		<div class="clearfix"></div>
            	</div>
            	
				<?php
					while($loop->have_posts()) : $loop->the_post(); ?>
					<div class="search-item">
			           	<a class="search-post-title" href="<?php the_permalink();?>"><?php the_title(); ?></a>
                        <?php the_excerpt(); ?>
			   		</div>
					
			 	<?php endwhile; 
			 	wp_reset_postdata();
			 ?>
            </div>
        <?php else : ?>	
		<h2 class="text-center no-result"><?php _e('Opps! No Result Found', 'pet'); ?></h2>

		<?php endif; ?>
        </div>
        
    </div>
</section>

<?php get_footer(); ?>
