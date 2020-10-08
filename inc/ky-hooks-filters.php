<?php 

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );




add_action( 'woocommerce_before_main_content', 'ky_before_woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_after_main_content', 'ky_after_woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_shop_loop', 'ky_before_woocommerce_before_shop_loop', 10 );
add_action( 'woocommerce_after_shop_loop', 'ky_after_woocommerce_after_shop_loop', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'ky_woocommerce_before_shop_loop_item_thumb', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'ky_woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_template_loop_price', 'ky_woocommerce_template_loop_price', 10 );

function ky_before_woocommerce_output_content_wrapper() {
	echo '<section class="shop-page-wrapper">
    	<div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="shop-sidebar">
                        <div class="filter">Filter by:</div>
                    </div>
                </div>';
}

function ky_after_woocommerce_output_content_wrapper(){
	echo '</div>
    	</div>
    </section>';
}

add_filter('woocommerce_show_page_title', '__return_false');

function ky_before_woocommerce_before_shop_loop() {
	echo '<div class="col-md-10">
            <div class="product-wrapper">
                <ul class="nav nav-tabs hidden-xs hidden-sm" id="myTab">';
                	$quired_object = get_queried_object();
                	$product_cats = get_terms( $args = array( 'taxonomy' => 'product_cat', 'hide_empty' => false ));
                	foreach ($product_cats as $product_cat) {
                		// var_dump($product_cat);
                		$active = $quired_object->term_id === $product_cat->term_id ? 'active' : '';
                		$term_id = $product_cat->term_id;
                		printf('<li class="%s"><a href="%s">%s</a></li>', $active, get_term_link( $term_id ), $product_cat->name);
                	}
                echo '</ul>

                <div class="mobile-filter visible-xs visible-sm">
                    <select name="" id="mySelect">
                        <option data-target="#tab_1">Bunches</option>
                        <option data-target="#tab_2">Bunches</option>
                    </select>
                </div> <div class="tab-content products"><div class="row">';
}

function ky_after_woocommerce_after_shop_loop() {
	echo '</div></div></div>  
	</div>';
}

function ky_woocommerce_before_shop_loop_item_thumb() {
	echo '<div class="media">
            <img src="'.get_the_post_thumbnail_url().'" alt="">

            <div class="hover-content">
                <div class="content text-center">
                    <a href="'.get_the_permalink().'" class="btn">More Details</a>
                    <hr>
                    <div class="icons align-center">';
                    	echo do_shortcode("[ti_wishlists_addtowishlist loop=yes]");
                        woocommerce_template_loop_add_to_cart();
                    echo '</div>
                </div>
            </div>
        </div>';
}


function ky_woocommerce_template_loop_product_title() {
	echo '<div class="product-content text-center">
            <a href="'.get_the_permalink().'" class="product-name">'.get_the_title().'</a>
            <hr>
            <div class="price-wishlist">';
            echo do_shortcode("[ti_wishlists_addtowishlist loop=yes]");
            woocommerce_template_loop_price();
            echo '</div>
        </div>';
}






































