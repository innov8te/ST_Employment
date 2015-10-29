	<footer>
	<div class="foot-top">
	<div class="col-sm-6 col-md-6 ft-testimonial">
		<h1>TESTIMONIALS</h1>
	
		<?php foreach($ftTtestimonialData as $testimonial) { ?>
			<?php 
			if ($testimonial['testi_image']) { ?>
				<img class="img-responsive" src="<?php echo base_url(). 'uploads/testimonial_images/' . $testimonial['testi_image']; ?>" />
			<?php }else{ ?>
				<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/default_testi_img.png" />
			<?php } ?>

			<p><?php echo $testimonial['testi_content']; ?></p>
			<span><?php echo $testimonial['testi_name']; ?></span>

		<?php } ?>

		<a href="<?php echo base_url(); ?>testimonials/">VIEW ALL --></a>
	</div><!-- .ft-testimonial -->

	<div class="col-sm-6 col-md-6 ft-contact">
	<h1>CONTACT US</h1>

	<div class="row" style="margin-top:30px;">
	<div class="col-xs-12 col-sm-6 col-md-6 ft-contact-item">
		<div class="ft-contact-item-img">
		<img src="<?php echo base_url(); ?>assets/images/address-icon.png" />
		</div>		
		<span><?php echo $contactusData['contactus_address']['page_content']; ?></span>
	</div><!-- .ft-contact-item -->


	<div class="col-xs-12 col-sm-6 col-md-6 ft-contact-item">
		<div class="ft-contact-item-img">
		<img src="<?php echo base_url(); ?>assets/images/phone.png" />
		</div>
		<span><?php echo $contactusData['contactus_tel']['page_content']; ?></span>
	</div><!-- .ft-contact-item -->

	</div>

	<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 ft-contact-item">
		<div class="ft-contact-item-img">
		<img src="<?php echo base_url(); ?>assets/images/fax.png" />
		</div>
		<span><?php echo $contactusData['contactus_fax']['page_content']; ?></span>
	</div><!-- .ft-contact-item -->


	<div class="col-xs-12 col-sm-6 col-md-6 ft-contact-item">
		<div class="ft-contact-item-img">
		<img src="<?php echo base_url(); ?>assets/images/mail.png" />
		</div>
		<span><?php echo $contactusData['contactus_email']['page_content']; ?></span>
	</div><!-- .ft-contact-item -->

	</div>

	</div><!-- .ft-contact -->

	</div><!-- .foot-top -->

	<div class="foot-bt">
		<div class="col-sm-6 col-md-6">
			<p>Copyright © 2015 ST Employment Sign.All right reserved.</p>
		</div>
		<div class="col-sm-6 col-md-6">
			<ul class="foot-nav">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="<?php echo base_url(); ?>aboutus/">About Us</a></li>
				<li><a href="<?php echo base_url(); ?>searchmaids/">Search Maids</a></li>
				<li><a href="<?php echo base_url(); ?>testimonials/">Testimonials</a></li>
				<li><a href="<?php echo base_url(); ?>contactus/">Contact Us</a></li>
			</ul>
		</div>
	</div><!-- .foot-bt -->
	</footer>
	
	</div><!-- .container -->

<!-- FlexSlider -->
<script src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>

<script type="text/javascript">

$(window).load(function(){
  $('.flexslider').flexslider({
    animation: "slide",
    start: function(slider){
      $('body').removeClass('loading');
    }
  });
});
</script>


</body>
</html>