<div class="row">	

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

	<div class="col-xs-12 col-sm-8 col-md-9">		
	<div class="col-xs-12 col-md-12 md-page-tit">
		<h1><?php echo $maidDetailData['maid_name']; ?></h1>
	</div><!-- .page-tit -->

		<div class="maid-detail">
		<div class="row">

		<div class="col-xs-12 col-sm-4 col-md-5 detail-img"  style="float:right;">
			<?php 
			if ($maidDetailData['maid_image']) { ?>
				<img class="img-responsive" src="<?php echo base_url(). 'uploads/maids_images/' . $maidDetailData['maid_image']; ?>" />
			<?php }else{ ?>
				<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/default_maid_img.png" />
			<?php } ?>

		</div><!-- .span -->


				<div class="col-xs-12 col-sm-8 col-md-7" style="float:left;">
					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">MAID NAME</label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidDetailData['maid_name']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">REF.CODE </label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidDetailData['maid_ref_code']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">TYPE</label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidDetailData['maid_type']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">MAID AGENCY</label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidInfoDetailData['info_agency']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">NATIONALITY</label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidDetailData['maid_from']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">DATE OF BIRTH</label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidDetailData['maid_dob']; ?> (Age: <?php echo $maidDetailData['maid_age']; ?>yrs)</div>
					</div>


					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">PLACE OF BIRTH </label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidInfoDetailData['info_pob']; ?></div>
					</div>

					<div class="divider"> 
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">SIBLINGS</label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidInfoDetailData['info_sibling']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">HEIGHT/WEIGHT</label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidInfoDetailData['info_height'] . ' cm / ' . $maidInfoDetailData['info_weight'] . ' kg'; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">RELIGION </label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidInfoDetailData['info_religion']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">MARITAL STATUS </label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidInfoDetailData['info_marital']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">CHILDREN </label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidInfoDetailData['info_child']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">EDUCATION </label>
						<div class="ccol-xs-6 ol-sm-6 col-md-6 mdata"><?php echo $maidInfoDetailData['info_education']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">LANGUAGE SKILL  </label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><?php echo $maidInfoDetailData['info_language']; ?></div>
					</div>

					<div class="divider">
						<label class="col-xs-6 col-sm-6 col-md-6 mlabel">SALARY </label>
						<div class="col-xs-6 col-sm-6 col-md-6 mdata"><span class="red"><?php echo $maidDetailData['maid_salary']; ?></span></div>
					</div>

</div><!-- .span -->


				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="divider">
						<label class="col-xs-12 col-sm-3 col-md-3 mlabel mlabel-mb">PREFERENCE / APTIUTDE & EXPERIENCE </label>
						<div class="col-xs-12 col-sm-9 col-md-9">
						<?php foreach($experienceList as $experience) { ?>
	                	<div class="row" style="padding-left:15px;">
	                	<div class="col-xs-12 col-sm-12 col-md-12 mdata-exp" style="float:left;"><?php echo $experience['experience_name']; ?></div>
	                	<?php 
                            foreach ($maidExpDataList as $maidexp) {
                                if($maidexp['mexp_exp_id'] == $experience['experience_id'] && $maidexp['mexp_maid_id'] == $maidDetailData['maid_id']) 
                                { 
                                    $mexp_status = $maidexp['mexp_status']; 
                                    break;                      
                                }else{  
                                    $mexp_status = 0;
                                }    
                            }
                        ?>
                        <?php if ($mexp_status == 0) { ?>
                        <div class="starrr lead" id="stars">
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                </div><!-- #stars -->		                
                        <?php } ?>

                        <?php if ($mexp_status == 1) { ?>
                        <div class="starrr lead" id="stars">
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                </div><!-- #stars -->
                        <?php } ?>

                        <?php if ($mexp_status == 2) { ?>
                        <div class="starrr lead" id="stars">
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                </div><!-- #stars -->
                        <?php } ?>


                        <?php if ($mexp_status == 3) { ?>
                        <div class="starrr lead" id="stars">
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                </div><!-- #stars -->
                        <?php } ?>

                        <?php if ($mexp_status == 4) { ?>
                        <div class="starrr lead" id="stars">
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star-empty"></span>
		                </div><!-- #stars -->
                        <?php } ?>


                        <?php if ($mexp_status == 5) { ?>
                        <div class="starrr lead" id="stars">
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                	<span class="glyphicon .glyphicon-star-empty glyphicon-star"></span>
		                </div><!-- #stars -->
                        <?php } ?>

		                </div><!-- .row -->
	                	<?php } ?>

	                	</div><!-- span 9 -->

					</div>

		

					<div class="divider">
						<label class="col-xs-12 col-sm-3 col-md-3 mlabel mlabel-mb">OTHER INFORMATION  </label>
						<div class="col-xs-12 col-sm-9 col-md-9" style="float:left;">
						<?php foreach($otherinfoList as $otherinfo) { ?>
						<div class="row">
	                	<div class="col-xs-12 col-sm-12 col-md-12 divider">
	                	<div class="mdata-exp"><?php echo $otherinfo['other_info_name']; ?></div>

	                	<?php 
                            foreach ($maidOthDataList as $maidoth) {
                                if($maidoth['moth_oth_id'] == $otherinfo['other_info_id'] && $maidoth['moth_maid_id'] == $maidDetailData['maid_id']) 
                                { 
                                    $moth_status = $maidoth['moth_status']; 
                                   //echo "Status : " . $moth_status;
                                    break;                      
                                }else{  
                                    //$moth_status = "H";
                                }   ?>


                        <?php } ?>



                        <?php if($moth_status == "1"){ ?>
                        <i class="fa fa-check"></i>
                        <?php } ?>

                        <?php if($moth_status == "0"){ ?>
                        <i class="fa fa-close"></i>
                        <?php } ?>


                        <?php if($moth_status == "NA"){ ?>
                        <span>-</span>
                        <?php } ?>


	                	</div>
	                	</div>
	                	<!-- <i class="fa fa-check"></i> -->
	                	<?php } ?>
	                	</div>
					</div>


					<div class="divider">
						<label class="col-xs-6 col-sm-3 col-md-3 mlabel">WORKING EXPERIENCE  </label>
						<div class="col-xs-6 col-sm-9 col-md-9 mdata" style="padding-left:50px;"><span class="red"><?php echo $maidInfoDetailData['info_working_experience']; ?></span></div>
					</div>

					
				</div><!-- .span -->

				

			</div><!-- .row -->


			<div class="row">
				<div class="col-md-12 maid-intro">
					<h1>MAID INTRODUCTION</h1>
					<?php echo $maidInfoDetailData['info_introduce']; ?>
				</div>
			</div><!-- .row -->


		</div><!-- .maid-detail -->

	</div><!-- /span -->



</div><!-- .row -->