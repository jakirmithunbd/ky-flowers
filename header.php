<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(is_front_page()){ echo' Home '; echo' | '; echo bloginfo('name'); } else { wp_title(''); echo' | '; bloginfo('name');  } ?></title>
    <?php if(get_field('favicon', 'options')) : ?>
        <link rel="icon" href="<?php the_field('favicon', 'options'); ?>" sizes="32x32" />
    <?php endif; ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5d12ffe75a6f55001254f3ac&product=inline-share-buttons' async='async'></script> -->
    </head>
    <?php wp_head(); ?>
    <body <?php body_class(); ?>>

    <?php 
    $queried_object = get_queried_object();
    $logo = get_field('logo', 'options');
    ?>

    <header class="header">
        <nav class="navbar">
            <div class="container">

                <div class="navbar-header hidden">
                    <a href="<?php echo site_url(); ?>"><img src="<?php echo $logo; ?>" class="img-responsive" alt="Logo Image"></a>
                    <!-- / Logo  -->

                    <a href="#sidr" class="openMenu navbar-toggle collapsed">
                        <span class="fas fa-bars"></span>
                    </a>

                    <div id="sidr" class="collapse navbar-collapse">
                        <span class="fas fa-long-arrow-alt-right closeMenu"></span>

                        <?php if (function_exists('wp_nav_menu')): ?>
                            <?php wp_nav_menu( 
                                  array(
                                  'menu'               => 'Main Menu',
                                  'theme_location'     => 'menu-1',
                                  'depth'              => 3,
                                  'container'          => 'false',
                                  'menu_class'         => 'nav navbar-nav',
                                  'menu_id'            => '',
                                  'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                  'walker'             => new wp_bootstrap_navwalker()
                                  ) 
                                ); 
                            ?>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="navbar-wrapper">
                                           
                    <div class="collapse navbar-collapse">
                        <?php if (function_exists('wp_nav_menu')): ?>
                            <?php wp_nav_menu( 
                                  array(
                                  'menu'               => 'Main Menu',
                                  'theme_location'     => 'menu-1',
                                  'depth'              => 3,
                                  'container'          => 'false',
                                  'menu_class'         => 'nav navbar-nav',
                                  'menu_id'            => '',
                                  'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                  'walker'             => new wp_bootstrap_navwalker()
                                  ) 
                                ); 
                            ?>
                        <?php endif; ?>
                    </div>

                    <a class="middle-logo" href="<?php echo site_url(); ?>"><img src="<?php echo $logo; ?>" class="img-responsive" alt="Logo Image"></a>
                    <!-- / Logo  -->

                    <div class="header_right-menu">
                        <a class="hidden-xs right-items" id="search-icon" href="#"><img src="<?php echo get_theme_file_uri( '/assets/images/search.png' ); ?>" alt=""></a>
                        <a class="right-items" href="#"><img src="<?php echo get_theme_file_uri( '/assets/images/heart.png' ); ?>" alt=""></a>
                        <div class="user-area right-items"><img src="<?php echo get_theme_file_uri( '/assets/images/account.png' ); ?>" alt="">
                            <div class="user-menu">
                                <?php 
                                $current_user = wp_get_current_user(); 

                                if ( is_user_logged_in() ) : ?>
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php _e( 'My Account', 'nor' ); ?></a>
                                <?php else: ?>
                                <a href="<?php echo get_permalink( 159 ); ?>"><?php _e( 'Login', 'nor' ); ?></a>
                                <a href="<?php echo get_permalink( 231 ); ?>"><?php _e( 'Sign Up', 'nor' ); ?></a>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="shopping_cart">
                            <a href="" class="ajaxify_cart">
                                <div class="cart-icon">
                                    <img src="<?php echo get_theme_file_uri( '/assets/images/cart.png' ); ?>" alt="">
                                    <div class="count cart_quantity"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></div>
                                </div>
                            </a>

                            <div class="header_shopping_cart_content"></div>
                        </div>

                        <div class="search-container">
                            <form action="<?php echo site_url(); ?>">
                                <input type="search" placeholder="Search" name="s">
                                <button type="submit"><img src="<?php echo get_theme_file_uri( '/assets/images/search.png' ); ?>" alt=""></button>
                            </form>
                        </div>
                    </div>
                                           
                </div>
            </div>
        </nav><!-- / navigation  -->
    </header><!-- / Header Area  -->
    