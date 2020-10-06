
<?php 
/*
Template Name: About Us
*/
get_header(); ?>

<?php echo get_template_part( 'template-parts/page-header' ); ?>
	
	<?php $florists_taste = get_field('florists_taste'); ?>
    <section class="florists-taste about-items">
        <div class="container">
            <div class="row align-center">
                <div class="col-md-6 col-sm-6">
                    <div class="content wow fadeInUp">
                    	<?php echo $florists_taste['content']; ?>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="media wow fadeInUp">
                        <img src="<?php echo $florists_taste['image']['url'] ?>" alt="<?php echo $florists_taste['image']['title'] ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $modern_approach = get_field('modern_approach'); ?>
    <section class="modern-approach about-items">
        <div class="container">
            <div class="row align-center">
                <div class="col-md-6">
                    <div class="media wow fadeInUp">
                        <img src="<?php echo $modern_approach['image']['url'] ?>" alt="<?php echo $modern_approach['image']['url'] ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="content wow fadeInUp">
                    	<?php echo $modern_approach['content']; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $farm = get_field('sourced_at_the_farm'); ?>
    <section class="firm about-items">
        <div class="container">
            <div class="row align-center">
                <div class="col-md-6">
                    <div class="content">
                        <h3 class="text-center wow fadeInUp"><?php echo $farm['title']; ?></h3>
                        <div class="icon-list-wrapper">
                        	<?php foreach ($farm['list_items'] as $item) : ?>
                            <div class="list wow fadeInUp">
                                <div class="icon">
                                    <img src="<?php echo $item['icon']['url'] ?>" alt="<?php echo $item['icon']['title'] ?>">
                                </div>
                                <p><?php echo $item['text']; ?></p>
                            </div>
                        	<?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="media wow fadeInUp">
                        <img src="<?php echo $farm['image']['url']; ?>" alt="<?php echo $farm['image']['title']; ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo get_template_part( 'template-parts/newsletter' ); ?>

<?php get_footer(); ?>