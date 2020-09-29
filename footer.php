     
    <?php $contact_form = get_field('contact_form'); 

        $bg = $contact_form['contact_form_bg'] ? $contact_form['contact_form_bg'] : get_theme_file_uri( '/assets/images/contact-bg.jpg' ); 
    ?>
     <section class="contact-area" id="contact" style="background: url(<?php echo $bg; ?>);">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-md-12">
                     <div class="contact-form wow fadeInUp">
                        <?php echo do_shortcode('[gravityform id=1 title=true description=true ajax=true tabindex=49]'); ?>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <footer class="footer">
        <div class="container-fluid">
            <div class="row align-center">
                <div class="col-md-3 col-sm-12">
                    <div class="footer-logo">
                        <a href="<?php echo site_url(); ?>">
                            <img src="<?php the_field('footer_logo','options'); ?>" class="img-responsive" alt="">
                        </a>
                    </div>
                </div>

                <?php 
                $contacts = get_field('contacts', 'options'); 
                $social = get_field('social_media', 'options'); 
                ?>
                <div class="col-md-9 col-sm-12">
                    <div class="footer-contact">
                        <?php if ($contacts['map']): ?>
                        <div class="info-item">
                            <span class="fas fa-map-marker-alt"></span>
                            <a target="_blank" href="<?php echo $contacts['map_url']; ?>"><?php echo $contacts['map']; ?></a>
                        </div>
                        <?php endif; ?>

                        <?php if ($contacts['phone']): ?>
                        <div class="info-item">
                            <span class="fas fa-phone"></span>
                            <a href="tel:<?php echo $contacts['phone']; ?>"><?php echo $contacts['phone']; ?></a>
                        </div>
                        <?php endif; ?>

                        <?php if ($contacts['email']): ?>
                        <div class="info-item">
                            <span class="far fa-envelope"></span>
                            <a href="mailto:<?php echo $contacts['email']; ?>"><?php echo $contacts['email']; ?></a>
                        </div>
                        <?php endif; ?>

                        <div class="info-item">
                            <div class="social-media">

                                <?php if ($social) : foreach ($social as $item) : ?>
                                <a target="_blank" href="<?php echo $item['url']; ?>"><span class="fab fa-<?php echo $item['icon']['value']; ?>"></span></a>
                                <?php endforeach; endif; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p><?php the_field('copy_right', 'options'); ?></p>
                </div>
            </div>
        </div>
    </div>
  <?php wp_footer(); ?>
    </body>
</html>