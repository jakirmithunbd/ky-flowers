<?php 
//show_admin_bar(false);

require_once get_theme_file_path("/inc/wp-bootstrap-navwalker.php");
require_once get_theme_file_path("/inc/web-login-page-design.php");

function web_setup_theme(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-header');
	add_theme_support('custom-logo');
	add_theme_support('html5', array('search-form', 'comment-list', "editor"));
    add_theme_support('woocommerce');

	//load text domain
	load_theme_textdomain('tay', get_template_directory() . '/language');
    add_image_size( 'best_selling_image', '160' , '240', true );

	// Menu Register 
	if(function_exists('register_nav_menus')){
    	register_nav_menus(array(
          'menu-1'	=>	__('Main Left Menu', 'web'),
          'menu-2'  =>  __('Main Right Menu', 'web'),
          'menu-3'  =>  __('Footer Menu', 'web'),
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
    'map_icon' => $map_icon,
    'map_zoom' => $map_zoom,
    'gmap_latitude' => $google_map['lat'],
    'gmap_longitude' => $google_map['lng'],
    'gmap_address' => $google_map['address'],
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
	wp_enqueue_style('tay_style', get_stylesheet_uri(), null, time());
}
add_action('wp_enqueue_scripts', 'web_setup_assets');

/**
 * Dashboard google map api key support.
 */
add_filter('acf/settings/google_api_key', function () {
    $gmap_api = get_field('google_map_api_key', 'options');
    return $gmap_api;
});

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

    #acf-group_5a2badeb476ba.postbox.acf-postbox .hndle.ui-sortable-handle span {
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
        'description'   => esc_html__( 'Add widgets here.', 'web' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
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
        document.getElementById('moar').onclick = function() {
          var section = document.createElement('section');
          section.className = 'section--purple wow fadeInDown';
          this.parentNode.insertBefore(section, this);
        };
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


// Global Offices
add_action('init','webone_services_post_type');
function webone_services_post_type() {
    register_post_type( 'services',
        array(
        'labels' =>
        array(
            'name' => __( 'Services', 'web'),  
            'singular_name' => __( 'Service', 'web'),
            'add_new_item' => __('Add New Service', 'web'), 
            'add_new' => __( 'Add New Service', 'web'),
            'edit_item' => __( 'Edit Service', 'web'),
            'new_item' => __( 'New Service', 'web' ),
            'view_item' => __( 'View Service' ),
            'not_found' => __( 'Sorry, we couldn\'t find the Service you are looking for.',  'web' ),
        ),

        'public' => true,
        'menu_postion' => 36,
        'show_in_menu ' => true,
        'menu_icon'=>'dashicons-layout',
        'supports' => array( 'title','editor','thumbnail', 'excerpt')
        )
    );
}

}