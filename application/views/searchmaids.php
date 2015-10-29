<div class="row">
	<div class="col-md-12 page-tit">
		<h1>Search Maids</h1>
	</div><!-- .page-tit -->

	<div class="col-sm-4 col-md-3">		
			<div class="filter-tit">Filter Option</div>
			
			<div class="filter">
			<?php echo form_open('/maid/search_result/'); ?>
			<span>Nationality</span>
			<div class="filter-chbox">
			<!-- <input type="checkbox" name="nationality" value="myanmar"> <label>Myanmar</label><br>
			<input type="checkbox" name="nationality" value="indonesia"> <label>Indonesia</label><br>
			<input type="checkbox" name="nationality" value="phillipine"> <label>Phillipine</label><br> -->

			<?php foreach ($countriesList as $country) { ?>
            	<input type="checkbox" name="nationality[]" value="<?php echo $country['country_citizen']; ?>"> <label><?php echo $country['country_citizen']; ?></label><br>
            <?php } ?> 

			</div>

			<span>Age</span>
			<div class="filter-rdbox">
			<!-- <input type="checkbox" name="age" value="23-29"> <label>23-29</label><br>
			<input type="checkbox" name="age" value="30-39"> <label>30-39</label><br>
			<input type="checkbox" name="age" value="39 & above"> <label>39 & above</label><br> -->
			
			<?php foreach($ageList as $age) { ?>
			<div class="divider">
                <?php $age = $age['age_start'] . '-' . $age['age_end']; ?>
                <input type="radio" name="age" value="<?php echo $age; ?>"> <label><?php echo $age; ?></label><br>
            </div>
            <?php } ?>
            
			</div>
			<!-- <a href="<?php //echo base_url(); ?>maid/search_result/" class="view-detail">SEARCH</a> -->
			<button type="submit" class="view-detail">SEARCH</button>
			<?php echo form_close(); ?>
		</div><!-- .filter -->
	</div><!-- /span -->

	<div class="col-sm-8 col-md-9">
		<div class="searchmaid-list">			

			<?php foreach($searchmaidsList as $searchmaids) { ?>
			<div class="col-xs-12 col-sm-6 col-md-4 searchmaid-box">
				<?php 
				if ($searchmaids['maid_image']) { ?>
					<img class="img-responsive" src="<?php echo base_url(). 'uploads/maids_images/' . $searchmaids['maid_image']; ?>" />
				<?php }else{ ?>
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/default_maid_img.png" />
				<?php } ?>


				<div class="searchmaid-box-name">
				<?php echo $searchmaids['maid_name']; ?>
				</div>

				<div class="searchmaid-box-info">
				<p>AGE: <?php echo $searchmaids['maid_age']; ?></p> 
				<p>FROM: <?php echo $searchmaids['maid_from']; ?></p>
				<p>TYPE: <?php echo $searchmaids['maid_type']; ?></p>
				<p>SALARY: <span class="red"><?php echo $searchmaids['maid_salary']; ?></span></p>
				<p>DAY OFF: <?php echo $searchmaids['maid_day_off']; ?></p>

				<div class="viewbtn-wrap"><a href="<?php echo base_url(); ?>maid/maid_detail/<?php echo $searchmaids['maid_id']; ?>" class="view-detail">VIEW DETAILS</a></div>
				</div>

			</div><!-- .searchmaid-box -->

			<?php } ?>

			<!-- /*************************************************************/ -->


			<!-- <div class="col-md-4 searchmaid-box">
				<img class="img-responsive" src="<?php //echo base_url(); ?>assets/images/Bitmap1.png" />

				<div class="searchmaid-box-name">
				Thaim Mal Sawmi
				</div>

				<div class="searchmaid-box-info">
				<p>AGE: 24</p> 
				<p>FROM: Myanmar</p>
				<p>TYPE: TRANSFER</p>
				<p>SALARY: <span class="red">$420+70 (OFF DAY COMPENSATE)</span></p>
				<p>DAY OFF: 4 days</p>

				<a href="#" class="view-detail">VIEW DETAILS</a>
				</div>

			</div> --><!-- .searchmaid-box -->


		</div><!-- .searchmaid-list -->

		<div class="row">
			<div class="col-md-12 pagination">
				<p><?php echo $links; ?></p>
			</div>
		</div><!-- .row -->

	</div><!-- /span -->



</div><!-- .row -->