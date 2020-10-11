<?php 
/*
Template Name: Home
*/
get_header(); 

$sliders = get_field('sliders');

?>
	<div class="home-slider-wrapper">
	    <div class="home-banner">

	    	<?php if($sliders) : foreach ($sliders as $slider): 
	    		$slider_img = $slider['image'] ? $slider['image'] : get_theme_file_uri( '/assert/images/slider-1.jpg' );
	    	?>
	        <div class="slick-slide" style="background: url(<?php echo $slider_img ?>);">
	            <div class="container">
	                <div class="banner-content-wrapper">
	                    <div class="banner-content">
	                        <p data-animation="fadeInUp" data-delay="0.2s"><?php echo $slider['text']; ?></p>
	                        <div class="buttons">
	                        	<?php if($slider['button_1'] || $slider['button_2']) :

	                        		printf('<a target="%s" data-animation="fadeInUp" data-delay="0.6s" href="%s" class="btn">%s</a>', $slider['button_1']['target'], $slider['button_1']['url'], $slider['button_1']['title']);


	                        		printf('<a target="%s" data-animation="fadeInUp" data-delay="0.6s" href="%s" class="btn">%s</a>', $slider['button_2']['target'], $slider['button_2']['url'], $slider['button_2']['title']);
	                        	endif; ?>
	                        </div>
	                    </div>

	                    <?php if($slider['delivery_box']['text']) : ?>
	                    <div class="delivery-box">
	                    	<?php if ($slider['delivery_box']['occasions']): ?>
	                        <h3 class="occasions" data-animation="fadeInUp" data-delay="1s"><?php echo $slider['delivery_box']['occasions']; ?></h3>
	                    	<?php endif; ?>
	                        <div class="content" data-animation="fadeInUp" data-delay="1s">
	                            <div class="text-center">
	                                <p><?php echo $slider['delivery_box']['text']; ?></p>
	                                <h3><?php echo $slider['delivery_box']['days']; ?></h3>
	                            </div>
	                            <img src="<?php echo get_theme_file_uri( '/assets/images/delivery-circle.png' ); ?>" alt="">
	                        </div>
	                    </div>
	                <?php endif; ?>
	                </div>
	            </div>
	        </div> <!-- / slider item -->
	        <?php endforeach; endif; ?>

	    </div> <!-- / Home Banner -->
	    <div class="counter-wrapper">
	        <div class="slider-arrows-counter">
	            <span class="fas fa-caret-left"></span>
	            <div class="news__counter text-right"></div>
	            <span class="fas fa-caret-right"></span>
	        </div>
	    </div>
	</div> <!-- / Home Banner slider wapper -->

	<?php $why_choose_us = get_field('why_choose_us'); ?>
	<section class="why-choose-us">
	    <div class="container">
	    	<?php $w_section_title = $why_choose_us['section_title']; if($w_section_title['title']) : ?>
	        <div class="row">
	            <div class="col-md-12">
	                <div class="section-title text-center">
	                    <h2 class="wow fadeInUp"><?php echo $w_section_title['title']; ?></h2>
	                    <p class="wow fadeInUp"><?php echo $w_section_title['description']; ?></p>
	                </div>
	            </div>
	        </div>
	    	<?php endif; ?>

	        <div class="features">
	            <div class="row">

	            	<?php $w_items = $why_choose_us['why_us_items']; if($w_items) : foreach ($w_items as $w_item) : ?>
	                <div class="col-xs-4 col wow fadeInUp">
	                    <div class="items text-center">
	                        <img src="<?php echo $w_item['icon']['url'] ?>" alt="<?php echo $w_item['icon']['title'] ?>">
	                        <p><?php echo $w_item['text'] ?></p>
	                    </div>
	                </div>
	            	<?php endforeach; endif; ?>
	            </div>
	        </div>
	    </div>
	</section> 

	<?php echo get_sidebar('sidebar-1'); ?>

	<?php $occasions_section_bg = get_field('occasions_section_bg') ? get_field('occasions_section_bg') : get_theme_file_uri( '/assets/images/category-background.png' ); ;  ?>
	<section class="product-category" style="background: url(<?php echo  $occasions_section_bg; ?>);">
	    <div class="container">

	        <?php $occasions_section_title = get_field('occasions_section_title'); ?>
	        <div class="row">
	            <div class="col-md-12">
	                <div class="section-title text-center">
	                    <h2 class="wow fadeInUp"><?php echo $occasions_section_title['title']; ?></h2>
	                    <p class="wow fadeInUp"><?php echo $occasions_section_title['description']; ?></p>
	                </div>
	            </div>
	        </div>

	        <div class="category-slider-wrapper">
	        	<div class="slider-arrows text-right wow fadeInUp">
	        		<img class="prev" src="<?php echo get_theme_file_uri( '/assets/images/arrow-left.png' ); ?>" alt="">
	        		<span class="fas fa-circle"></span>
	        		<img class="next" src="<?php echo get_theme_file_uri( '/assets/images/arrow-right.png' ); ?>" alt="">
	        	</div>
	        
		        <div class="category-list wow fadeInUp" id="category-list">

	            	<?php $product_cats = get_terms( $args = array( 'taxonomy' => 'product_cat', 'hide_empty' => false, ) );
	            		foreach ($product_cats as $product_cat) :
	            			$term_id = $product_cat->term_id;
	            			$thumbnail_id = get_woocommerce_term_meta( $product_cat->term_id, 'thumbnail_id', true ); 
							$image = wp_get_attachment_url( $thumbnail_id ); 
	            	?>
	                <div class="category">
	                    <a class="cat-title" href="<?php echo get_term_link( $term_id ); ?>"><?php echo $product_cat->name; ?></a>
	                    <div class="cat-img">
	                        <img src="<?php echo $image; ?>" alt="">

	                        <div class="hover-content">
	                            <div class="content">
	                                <a href="<?php echo get_term_link( $term_id ); ?>" class="btn"><?php _e('Shop Now', 'ky'); ?></a>
	                            </div>
	                        </div>

	                    </div>
	                </div>
	            	<?php endforeach; ?>
		        </div>

	        </div>

	        <div class="row">
                <div class="show-now-button text-center wow fadeInUp">
                    <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="btn"><?php _e('Show All', 'ky'); ?></a>
                </div>
            </div>
	    </div>
	</section>

	<?php $obg = get_field('order_process_background'); $order_process_background = $obg['url'] ? $obg['url'] : get_theme_file_uri( '/assets/images/order-system-bg.jpg' ); ;  ?>
	<section class="order-system" style="background: url(<?php echo $order_process_background; ?>);">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12 process-item-wrapper">
	            	<?php $order_process = get_field('order_process'); if($order_process) : foreach ($order_process as $p_item) : ?>
	                <div class="process-item align-center wow fadeInUp">
	                    <div class="icon">
	                        <img src="<?php echo $p_item['icon']['url'] ?>" alt="<?php echo $p_item['icon']['title'] ?>">
	                    </div>
	                    <p><?php echo $p_item['text']; ?></p>
	                </div>
	            	<?php endforeach; endif; ?>
	            </div>
	        </div>
	    </div>
	</section>

	<section class="reviews">
	    <div class="container">

	        <?php $reviews_section_title = get_field('reviews_section_title'); ?>
	        <div class="row">
	            <div class="col-md-12">
	                <div class="section-title text-center">
	                    <h2 class="wow fadeInUp"><?php echo $reviews_section_title['title']; ?></h2>
	                    <p class="wow fadeInUp"><?php echo $reviews_section_title['description']; ?></p>
	                </div>
	            </div>
	        </div>

	        <div class="reviews-slider-wrapper">
	            <img src="<?php echo get_theme_file_uri( '/assets/images/quote.png' ); ?>" alt="">
	            <div class="reviews-slider">
	            	<?php $reviews = get_field('reviews'); if($reviews) : foreach ($reviews as $review) : ?>
	                <div class="slick-slide wow fadeInUp">
	                    <p><?php echo $review['quote']; ?></p>
	                    <p class="name">- <?php echo $review['client_name']; ?> -</p>
	                </div>
	                <?php endforeach; endif; ?>
	            </div>
	        </div>
	    </div>
	</section>

	<?php $delivery = get_field('delivery'); ?>
	<section class="delivery">
	    <div class="container-fluid">
	        <div class="row align-center">
	            <div class="col-lg-6 col-md-12">
	                <div class="media wow fadeInUp">
	                    <img src="<?php echo $delivery['image']['url'] ?>" alt="">
	                </div>
	            </div>

	            <div class="col-lg-6 col-md-12 delivery-content text-center wow fadeInUp">
	                <div class="delivery-box">

	                	<?php $delivery_box = get_field('delivery_box'); ?>
	                    <div class="content">
	                        <div class="text-center">
	                            <p><?php echo $delivery_box['text']; ?></p>
	                            <h3><?php echo $delivery_box['day']; ?></h3>
	                        </div>
	                        <img src="<?php echo get_theme_file_uri( '/assets/images/delivery-circle.png' ); ?>" alt="">
	                    </div>
	                </div>

	                <?php echo $delivery['content'] ?>
	            </div>
	        </div>
	    </div>
	</section>

	<section class="follow-us">
	    <div class="container">

			<?php $follow_reviews_section_title = get_field('follow_reviews_section_title'); ?>
	        <div class="row">
	            <div class="col-md-12">
	                <div class="section-title text-center">
	                    <h2 class="wow fadeInUp"><?php echo $follow_reviews_section_title['title']; ?></h2>
	                    <p class="wow fadeInUp"><?php echo $follow_reviews_section_title['description']; ?></p>
	                </div>
	            </div>
	        </div>

	        <div class="row">
	        	<div class="col-md-12">
	        		<div class="show-feed">
	        			<?php echo do_shortcode('[instagram-feed num=4 cols=4 showfollow=false]');?>
	        		</div>
	        	</div>
	        </div>
	    </div>
	</section>
<?php get_footer(); ?>