    
    <?php 
        $queried_object = get_queried_object();
        $logo = get_field('logo', 'options');
    ?>

    <footer class="footer">
        <div class="container">
            <div class="row eq-height">
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="footer-logo">
                        <a href="<?php echo site_url(); ?>">
                            <img src="<?php echo $logo; ?>" alt="logo">
                        </a>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 col">
                    <div class="footer-items">
                        <h4 class="footer-item-title"><?php _e('Information', 'ky'); ?></h4>

                        <?php if (function_exists('wp_nav_menu')): ?>
                            <?php wp_nav_menu( 
                                  array(
                                  'menu'               => 'Footer Menu',
                                  'theme_location'     => 'menu-2',
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

                <?php $working_hours = get_field('working_hours', 'options'); ?>
                <div class="col-md-3 col-sm-6 col-xs-6 col">
                    <div class="footer-items">
                        <h4 class="footer-item-title"><?php echo $working_hours['title']; ?></h4>
                        
                        <?php echo $working_hours['content']; ?>
                    </div>
                </div>

                <?php $contacts = get_field('contacts', 'options'); ?>
                <div class="col-md-3 col-sm-6 col-xs-6 col">
                    <div class="footer-items">
                        <h4 class="footer-item-title"><?php _e('Contacts', 'ky'); ?></h4>
                        
                        <a href="<?php echo $contacts['map_url']; ?>"> <span class="fas fa-map-marker-alt"></span><?php echo $contacts['map']; ?></a>
                        <a href="tel:<?php echo $contacts['phone']; ?>"> <span class="fas fa-phone"></span><?php echo $contacts['phone']; ?></a>
                        <a href="mailto:<?php echo $contacts['email']; ?>"> <span class="far fa-envelope"></span><?php echo $contacts['email']; ?></a>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 col">
                    <div class="footer-items">
                        <h4 class="footer-item-title"><?php _e('Follow us on', 'ky'); ?></h4>
                        
                        <div class="social-media">
                            <?php $social_media = get_field('social_media', 'options'); if($social_media) : foreach ($social_media as $social_item) : ?>
                            <a target="_blank" href="<?php echo $social_item['url'] ?>">
                                <span class="fab fa-<?php echo $social_item['icon']['value']; ?>"></span>
                            </a>
                            <?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="copy-right text-center">
                        <p><?php the_field("copy_right", "options"); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>

    </body>
</html>