
<?php $newsletter = get_field('newsletter'); 
	$bg =  $newsletter['image']['url'] ? $newsletter['image']['url'] : get_theme_file_uri( '/assets/images/newslatter-bg.jpg' ); 
?>

<section class="newsletter" style="background: url(<?php echo $bg; ?>);">
    <div class="container">
        <div class="row align-center">
            <div class="col-md-6 wow fadeInUp">
                <div class="content text-center">
                    <h2><?php echo $newsletter['title']; ?></h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter-form text-center wow fadeInUp">
                    <p><?php echo $newsletter['description']; ?></p>
                    <?php echo do_shortcode( '[contact-form-7 id="137" title="Newsletter"]' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>