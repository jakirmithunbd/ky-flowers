
<?php 
/*
Template Name: About Us
*/
get_header(); ?>

<?php echo get_template_part( 'template-parts/page-header' ); ?>

    <section class="florists-taste about-items">
        <div class="container">
            <div class="row align-center">
                <div class="col-md-6 col-sm-6">
                    <div class="content wow fadeInUp">
                        <h3 class="text-center">Los Angeles Florists with high taste  </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis faucibus sed eget dui pharetra. Sagittis, ridiculus nam vitae sem. Convallis et integer adipiscing gravida ipsum in. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis faucibus sed eget dui pharetra. Sagittis, ridiculus nam vitae sem. Convallis et integer adipiscing gravida ipsum in. Quis augue eget laoreet nibh erat placerat faucibus facilisis.</p>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="media wow fadeInUp">
                        <img src="../assets/images/Florists.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="modern-approach about-items">
        <div class="container">
            <div class="row align-center">
                <div class="col-md-6">
                    <div class="media wow fadeInUp">
                        <img src="../assets/images/approach.jpg" alt="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="content wow fadeInUp">
                        <h3>A Modern Approach</h3>
                        <p>We pride ourselves on sourcing on-trend flowers and creating one-of-kind arrangements you won't find anywhere else. We work with the best-in-class designers to offer stunning bouquets and curated plants that fit every occasion.</p>
                        <p>We pride ourselves on sourcing on-trend flowers and creating one-of-kind arrangements you won't find anywhere else. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="firm about-items">
        <div class="container">
            <div class="row align-center">
                <div class="col-md-6">
                    <div class="content">
                        <h3 class="text-center wow fadeInUp">Sourced At The Farm</h3>
                        <div class="icon-list-wrapper">
                            <div class="list wow fadeInUp">
                                <div class="icon">
                                    <img src="../assets/images/w-icon-1.png" alt="">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis faucibus sed eget dui </p>
                            </div>

                            <div class="list wow fadeInUp">
                                <div class="icon">
                                    <img src="../assets/images/w-icon-2.png" alt="">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis faucibus sed eget dui </p>
                            </div>

                            <div class="list wow fadeInUp">
                                <div class="icon">
                                    <img src="../assets/images/w-icon-3.png" alt="">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis faucibus sed eget dui </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="media wow fadeInUp">
                        <img src="../assets/images/farm.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo get_template_part( 'template-parts/newsletter' ); ?>

<?php get_footer(); ?>