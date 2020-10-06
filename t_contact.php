
<?php 
/*
Template Name: Contact
*/
get_header(); ?>

<?php echo get_template_part( 'template-parts/page-header' ); ?>

    <section class="contact-information">
    	<div class="container">
    		<div class="row align-center">
    			<div class="col-md-6">
    				<div class="information-item-wrapper contact-top-col">
    					<div class="information-item wow fadeInUp">
    						<h3><?php the_title(); ?></h3>
    						<?php $contacts = get_field('contacts'); ?>
    						<table class="table">
    							<tr>
    								<td class="text-right"><?php _e('Address', 'ky'); ?></td>
    								<td><a target="_blank" href="<?php echo $contacts['map_url'] ?>"><?php echo $contacts['map']; ?></a></td>
    							</tr>

    							<tr>
    								<td class="text-right"><?php _e('Phone Number:', 'ky'); ?></td>
    								<td><a href="tel:<?php echo $contacts['phone']; ?>"><?php echo $contacts['phone']; ?></a></td>
    							</tr>

    							<tr>
    								<td class="text-right"><?php _e('E-mail address:', 'ky'); ?></td>
    								<td><a href="mailto:<?php echo $contacts['email']; ?>"><?php echo $contacts['email']; ?></a>
    									<a target="_blank" class="map-link" href="<?php echo $contacts['map_url'] ?>"> <span class="fas fa-map-marker-alt"></span> <?php _e('Show on map', 'ky'); ?></a>
    								</td>
    							</tr>
    						</table>
    					</div>

    					<div class="separator wow fadeInUp"></div>

    					<div class="information-item wow fadeInUp">
    						<h3><?php _e('Working Hours', 'ky'); ?></h3>

    						<table class="table">
    							<?php $working_hours = get_field('working_hours'); foreach ($working_hours as $items) : ?>
    							<tr>
    								<td class="text-right"><?php echo $items['day'] ?></td>
    								<td><?php echo $items['time']; ?></td>
    							</tr>
    							<?php endforeach; ?>
    						</table>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-6">
    				<div class="media wow fadeInUp">
    					<img src="<?php echo $contacts['image']['url'] ?>" alt="<?php echo $contacts['image']['title'] ?>">
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <?php $contact_form = get_field('contact_form'); ?>
    <section class="contact-form-wrapper">
    	<div class="container">
    		<div class="row align-center">
    			<div class="col-md-6">
    				<div class="media wow fadeInUp">
    					<img src="<?php echo $contact_form['image']['url'] ?>" alt="<?php echo $contact_form['image']['title'] ?>">
    				</div>
    			</div>

    			<div class="col-md-6">
    				<div class="contact-form wow fadeInUp">
    					<?php echo do_shortcode( '[contact-form-7 id="6" title="Contact form"]' ); ?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

<?php get_footer(); ?>