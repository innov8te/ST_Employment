<div class="row">

<div class="col-sm-3 col-md-3">
	<?php 
	if ($aboutusData['page_image']) { ?>
		<img class="img-responsive aboutus-img" src="<?php echo base_url(). 'uploads/' . $aboutusData['page_image']; ?>" />
	<?php }else{ ?>
		<img class="img-responsive aboutus-img" src="<?php echo base_url(); ?>assets/images/ab.png" />
	<?php } ?>

</div>

<div class="col-sm-9 col-md-9">
<h1 class="aboutus">About Us</h1>
<?php echo $aboutusData['page_content']; ?>
</div>


</div><!-- .row -->

