<div class="row">
	<div class="col-md-12 page-tit">
		<h1>Testimonials</h1>
	</div><!-- .page-tit -->

	<div class="row">	

	<?php foreach($testimonialList as $testimonial) { ?>
		<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="testi-list">
			<div class="col-xs-12 col-sm-3 col-md-2 testi-list-img">
				<?php 
				if ($testimonial['testi_image']) { ?>
					<img class="img-responsive" src="<?php echo base_url(). 'uploads/testimonial_images/' . $testimonial['testi_image']; ?>" />
				<?php }else{ ?>
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/default_testi_img.png" />
				<?php } ?>

			</div><!-- .testi-list-img -->
			<div class="col-xs-12 col-sm-9 col-md-10 testi-list-text">
				<?php echo $testimonial['testi_content']; ?>
				<div class="testi-name">
				<span class="bar"></span> <?php echo $testimonial['testi_name']; ?>
				</div>
			</div><!-- .testi-list-text -->
		</div><!-- .testi-list -->
		</div>
	<?php } ?>

	</div><!-- .row -->

	<div class="row" style="text-align:center;">
		<div class="col-md-12 pagination">
			<p><?php echo $links; ?></p>
		</div>
	</div><!-- .row -->



</div><!-- .row -->