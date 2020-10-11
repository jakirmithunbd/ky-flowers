<?php 
//show_admin_bar(false);

require_once get_theme_file_path("/inc/wp-bootstrap-navwalker.php");
require_once get_theme_file_path("/inc/web-login-page-design.php");
require_once get_theme_file_path("/inc/ky-hooks-filters.php");

function web_setup_theme(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-header');
	add_theme_support('custom-logo');
	add_theme_support('html5', array('search-form', 'comment-list', "editor"));
    add_theme_support('woocommerce');

	//load text domain
	load_theme_textdomain('ky', get_template_directory() . '/language');
    // add_image_size( 'best_selling_image', '160' , '240', true );

	// Menu Register 
	if(function_exists('register_nav_menus')){
    	register_nav_menus(array(
          'menu-1'	=>	__('Main Menu', 'ky'),
          'menu-2'  =>  __('Footer Menu', 'ky'),
		));
	}
}

add_action('after_setup_theme', 'web_setup_theme');

function web_setup_assets(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('dashicon');

	//script ===
	wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), '0.0.1', true);
    wp_enqueue_script('wow', get_theme_file_uri('/assets/js/wow.min.js'), array('jquery'), '0.0.1', true);
    wp_enqueue_script('slick', get_theme_file_uri('/assets/js/slick.min.js'), array('jquery'), '0.0.1', true);
    wp_enqueue_script('sidr', get_theme_file_uri('/assets/js/sidr.min.js'), array('jquery'), '0.0.1', true);

    $gmap_api = get_field('google_map_api_key', 'options');
    $googleapi = "//maps.googleapis.com/maps/api/js?key=$gmap_api";
    wp_enqueue_script('gmap_api', $googleapi, array(), false, true); 
    

    wp_enqueue_script('main_js', get_theme_file_uri('/assets/js/scripts.js'), array('jquery'), time(), true);

    $map_icon = get_field('map_pin', 'options');
    $location = get_field('google_map');

  // //localize data 
  $data = array (
    'site_url'   => get_theme_file_uri(),
    'admin_ajax'   => admin_url( 'admin-ajax.php' ),
  );

    // var_dump($data);
    wp_localize_script('main_js', 'ajax', $data);


	//css ===
	wp_enqueue_style('bootstrap_css', get_theme_file_uri('/assets/css/bootstrap.min.css'));
	wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/css/font-awesome.min.css'));
    wp_enqueue_style('animate', get_theme_file_uri('/assets/css/animate.min.css'));
    wp_enqueue_style('slick', get_theme_file_uri('/assets/css/slick.min.css'));
	wp_enqueue_style('main_style', get_theme_file_uri('/assets/css/main-style.css'), null, time());
	wp_enqueue_style('ky_style', get_stylesheet_uri(), null, time());
}
add_action('wp_enqueue_scripts', 'web_setup_assets');

// acf options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/*** Reorder dashboard menu */
function reorder_admin_menu( $__return_true ) {
    return array(
         'index.php',                 // Dashboard
         'separator1',                // --Space--
         'acf-options',               // ACF Theme Settings
         'edit.php?post_type=page',   // Pages 
         'edit.php',                  // Posts
         'edit.php?post_type=artist', // artist
         'separator2',                // --Space--
         'gf_edit_forms',             // Gravity Forms
         'upload.php',                // Media
         'themes.php',                // Appearance
         'edit-comments.php',         // Comments 
         'users.php',                 // Users
         'tools.php',                 // Tools
         'options-general.php',       // Settings
         'plugins.php',               // Plugins
   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

/*** Get all page id */
function getPageID() {
  	global $post;
  	$postid = $post->ID;
  	$queried_object = get_queried_object();
  	if(is_home() && get_option('page_for_posts')) {
		$postid = get_option('page_for_posts');
  	}
  	else if (is_front_page()) {
  		$postid = get_option( 'page_on_front' );
  	}
  	else if (is_archive()) {
  		$postid = get_queried_object();
  	}
  	else if ( $queried_object ) {
    	$postid = $queried_object->ID;
   	}

  	return $postid;
}

function web_acf_admin_head() {
    ?>
    <style type="text/css">

    #acf-group_5a2badeb476ba.postbox.acf-postbox .hndle.ui-sortable-handle {
        background-color: #1AB569 !important;
        padding: 35px;
    }

    #acf-group_5a2badeb476ba.postbox.acf-postbox h2 {
        font-size: 2.5rem;
        color: white;
    }

    </style>
    <?php
}

add_action('acf/input/admin_head', 'web_acf_admin_head');

/**
 * Register widget area.
 *
 * 
 */
function web_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'web' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'web' )
    ) );
}
add_action( 'widgets_init', 'web_widgets_init' );


function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

function additional_scripts(){
    ?>
    <script>
        wow = new WOW(
          {
            animateClass: 'animated',
            offset:       100,
            callback:     function(box) {
              console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
          }
        );
        wow.init();
    </script>
    <?php
}
add_action( 'wp_footer', 'additional_scripts', 100 );

add_filter("gform_submit_button", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
    return "<button class='btn' id='gform_submit_button_{$form["1"]}'>{$form['button']['text']}<span class=\"glyphicon glyphicon-triangle-right\"></span></button>";
}


function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="search-form-wraper">
    <input type="text" placeholder="Search Here" value="' . get_search_query() . '" name="s" id="s" />
    <button id="searchsubmit" type="submit"><span class="fas fa-search"></button>
    </div>
    </form>';
    return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );


/* Header right mini cart number ajaxify */
function dakota_header_ajaxify_add_to_cart( $fragments ) {
  global $woocommerce;
  ob_start();
?>
  <a class="ajaxify_cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" >
    <div class="cart-icon">
            <img src="<?php echo get_theme_file_uri( '/assets/images/cart.png' ); ?>" alt="">
            <div class="count cart_quantity"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'dakota'), $woocommerce->cart->cart_contents_count);?></div>
        </div>
  </a>
<?php 
  $fragments['.ajaxify_cart'] = ob_get_clean();
  return $fragments;
}
add_filter('add_to_cart_fragments', 'dakota_header_ajaxify_add_to_cart');

/* Header right mini cart hover load cart item ajaxify * Js Part settings.js File */
function mode_theme_update_mini_cart() {
  echo wc_get_template( 'cart/mini-cart.php' );
  die();
}
add_filter( 'wp_ajax_nopriv_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart' );
add_filter( 'wp_ajax_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart' );


add_shortcode( 'wc_reg_form_bbloomer', 'bbloomer_separate_registration_form' );
    
function bbloomer_separate_registration_form() {
   if ( is_admin() ) return;
   if ( is_user_logged_in() ) return;
   ob_start();
 
   // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
   // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
 
   do_action( 'woocommerce_before_customer_login_form' );
 
   ?>
      <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
 
         <?php do_action( 'woocommerce_register_form_start' ); ?>
 
         <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
 
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
               <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
               <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </p>
 
         <?php endif; ?>
 
         <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
         </p>
 
         <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
 
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
               <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
               <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
            </p>
 
         <?php else : ?>
 
            <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>
 
         <?php endif; ?>
 
         <?php do_action( 'woocommerce_register_form' ); ?>
 
         <p class="woocommerce-FormRow form-row">
            <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
         </p>
 
         <?php do_action( 'woocommerce_register_form_end' ); ?>
 
      </form>
 
   <?php
     
   return ob_get_clean();
}


add_shortcode( 'wc_login_form_bbloomer', 'bbloomer_separate_login_form' );
  
function bbloomer_separate_login_form() {
   if ( is_admin() ) return;
   if ( is_user_logged_in() ) return; 
   ob_start();
   woocommerce_login_form();
   return ob_get_clean();
}


add_filter( 'woocommerce_taxonomy_args_product_tag', 'custom_wc_taxonomy_label_product_tag' );
function custom_wc_taxonomy_label_product_tag( $args ) {
  $args['label'] = 'Occasions';
  $args['labels'] = array(
      'name'        => 'Occasions',
      'singular_name'   => 'Occasion',
        'menu_name'     => 'Occasion'
  );

  return $args;
}

add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
    // Change the breadcrumb delimeter from '/' to '>'
    $defaults['delimiter'] = ' &gt;&gt; ';
    return $defaults;
}