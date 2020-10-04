    
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
                        <h4 class="footer-item-title">Information</h4>
                        
                        <ul class="nav navbar-nav">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="clients.html">Clients</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="blog.html">Blog</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 col">
                    <div class="footer-items">
                        <h4 class="footer-item-title">Working Hours</h4>
                        
                        <p>Mon.-Fri. : 10AM – 9PM</p>
                        <p>Saturday : 10AM – 5PM</p>
                        <p>Sunday : Closed</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 col">
                    <div class="footer-items">
                        <h4 class="footer-item-title">Contacts</h4>
                        
                        <a href="#"> <span class="fas fa-map-marker-alt"></span> 701 S Brand Blvd Glendale, CA  91204</a>
                        <a href="tel:(747) 777 7737"> <span class="fas fa-phone"></span> (747) 777 7737</a>
                        <a href="mailto:info@k&Yflowers.com"> <span class="far fa-envelope"></span> info@k&Yflowers.com</a>
                    </div>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 col">
                    <div class="footer-items">
                        <h4 class="footer-item-title">Follow us on</h4>
                        
                        <div class="social-media">
                            <a href="#"><span class="fab fa-instagram"></span></a>
                            <a href="#"><span class="fab fa-facebook-f"></span></a>
                            <a href="#"><span class="fab fa-twitter"></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="copy-right text-center">
                        <p><a href="#">k&yflowers.com</a> © copyright 2020 designed by <a href="#">Web One Studio</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>

    </body>
</html>