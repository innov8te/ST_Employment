<div class="row">
	<div class="col-md-12 hm-welcome">
		<h1>WELCOME</h1>

		<div class="hm-welcome-tit">
			<?php echo $homeWelcomeData['page_title']; ?>
		</div><!-- .hm-welcome-tit -->

		<div class="hm-welcome-text">
			<?php echo $homeWelcomeData['page_content']; ?>
		</div><!-- .hm-welcome-text -->
		
		<a href="<?php echo base_url(); ?>aboutus/" class="view-detail center">VIEW ALL</a>

	</div><!-- .hm-welcome -->

</div><!-- .row -->

	<!-- /******************************************************************/ -->
<div class="row">

	<div class="featuremaid">
		<div class="featuremaid-tit">
			<h1>OUR FEATURED MAIDS</h1>
		</div><!-- .featuremaid-tit -->

		<div class="col-sm-12 col-md-12">
		<div class="featuremaid-list">			

			<?php foreach($featureMaidsList as $featuremaid) { ?>
			<div class="col-xs-12 col-sm-4 col-md-3">
			<div class="featuremaid-box">
				<?php 
				if ($featuremaid['maid_image']) { ?>
					<img class="img-responsive" src="<?php echo base_url(). 'uploads/maids_images/' . $featuremaid['maid_image']; ?>" />
				<?php }else{ ?>
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/default_maid_img.png" />
				<?php } ?>


				<div class="featuremaid-box-name">
				<?php echo $featuremaid['maid_name']; ?>
				</div>

				<div class="featuremaid-box-info">
				<p>AGE: <?php echo $featuremaid['maid_age']; ?></p> 
				<p>FROM: <?php echo $featuremaid['maid_from']; ?></p>
				<p>TYPE: <?php echo $featuremaid['maid_type']; ?></p>
				<p>SALARY: <span class="red"><?php echo $featuremaid['maid_salary']; ?></span></p>
				<p>DAY OFF: <?php echo $featuremaid['maid_day_off']; ?></p>

				<div class="viewbtn-wrap"><a href="<?php echo base_url(); ?>maid/maid_detail/<?php echo $featuremaid['maid_id']; ?>" class="view-detail">VIEW DETAILS</a></div>
				</div>

			</div><!-- .featuremaid-box -->
			</div>

			<?php } ?>



		</div><!-- .featuremaid-list -->

		<a href="<?php echo base_url(); ?>searchmaids/" class="view-detail center">VIEW DETAILS</a>

		</div>
	</div><!-- .featuremaid -->



</div><!-- .row -->