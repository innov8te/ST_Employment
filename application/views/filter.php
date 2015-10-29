<div class="row">
	<div class="col-md-12 page-tit">
		<h1>Search Result</h1>
	</div><!-- .page-tit -->

	<div class="col-sm-4 col-md-3">		
			<div class="filter-tit">Filter Option</div>
			
			<div class="filter">
			<?php echo form_open('/maid/search_result/'); ?>
			<span>Nationality</span>
			<div class="filter-chbox">
			
			<?php foreach ($countriesList as $country) { ?>
            	<input type="checkbox" name="nationality[]" value="<?php echo $country['country_citizen']; ?>"> <label><?php echo $country['country_citizen']; ?></label><br>
            <?php } ?>

			</div>

			<span>Age</span>
			<div class="filter-rdbox">
			
			<?php foreach($ageList as $age) { ?>
			<div class="divider">
                <?php $age = $age['age_start'] . '-' . $age['age_end']; ?>
                <input type="radio" name="age" value="<?php echo $age; ?>"> <label><?php echo $age; ?></label><br>
            </div>
            <?php } ?>
            
			</div>
			<button type="submit" class="view-detail">SEARCH</button>
			<?php echo form_close(); ?>
		</div><!-- .filter -->
	</div><!-- /span -->



	<div class="col-sm-8 col-md-9">
		<div class="searchmaid-list">			

		<?php foreach($filter_result as $result) { ?>
			<div class="col-xs-12 col-sm-6 col-md-4 searchmaid-box">
				<?php 
				if ($result['maid_image']) { ?>
					<img class="img-responsive" src="<?php echo base_url(). 'uploads/maids_images/' . $result['maid_image']; ?>" />
				<?php }else{ ?>
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/default_maid_img.png" />
				<?php } ?>


				<div class="searchmaid-box-name">
				<?php echo $result['maid_name']; ?>
				</div>

				<div class="searchmaid-box-info">
				<p>AGE: <?php echo $result['maid_age']; ?></p> 
				<p>FROM: <?php echo $result['maid_from']; ?></p>
				<p>TYPE: <?php echo $result['maid_type']; ?></p>
				<p>SALARY: <span class="red"><?php echo $result['maid_salary']; ?></span></p>
				<p>DAY OFF: <?php echo $result['maid_day_off']; ?></p>

				<div class="viewbtn-wrap"><a href="<?php echo base_url(); ?>maid/maid_detail/<?php echo $result['maid_id']; ?>" class="view-detail">VIEW DETAILS</a></div>
				</div>

			</div><!-- .searchmaid-box -->

		<?php } ?>


		<!-- /*************************************************************/ -->

		</div><!-- .searchmaid-list -->

		<div class="row">
			<div class="col-md-12 pagination">
				<p><?php echo $links; ?></p>
			</div>
		</div><!-- .row -->


	</div><!-- /span -->



</div><!-- .row -->