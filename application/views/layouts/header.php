<!DOCTYPE html>
<html>
<head>
	<title>		
	<?php if(isset($sitename['page_name'])) echo $sitename['page_name']; ?>
	</title>
	
	<?php 
	if ($favicon['page_image']) { ?>
		<link rel="icon" type="image/icon" href="<?php echo base_url(). 'uploads/' . $favicon['page_image']; ?>" />
	<?php }else{ ?>
		<link rel="icon" type="image/icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
	<?php } ?>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" />


	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	
</head>
<body>

	<div class="container">
		<header>
			<div class="col-xs-12 col-sm-6 col-md-6 logo">
			<?php 
			if ($sitelogo['page_image']) { ?>
				<a href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(). 'uploads/' . $sitelogo['page_image']; ?>" /></a>
			<?php }else{ ?>
				<a href="<?php echo base_url(); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo.png" /></a>
			<?php } ?>
				
			</div><!-- .logo -->

			<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="social">
				<img class="img-responsive" src="<?php echo base_url(); ?>assets/upload/facebook.png" />
				<img class="img-responsive" src="<?php echo base_url(); ?>assets/upload/twitter.png" />
				<img class="img-responsive" src="<?php echo base_url(); ?>assets/upload/yu.png" />
			</div><!-- .social -->
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12">
			<nav class="menu">
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url(); ?>aboutus/">About Us</a></li>
					<li><a href="<?php echo base_url(); ?>searchmaids/">Search Maids</a></li>
					<li><a href="<?php echo base_url(); ?>testimonials/">Testimonials</a></li>
					<li><a href="<?php echo base_url(); ?>contactus/">Contact Us</a></li>
				</ul>
			</nav>

			<!-- Mobile view -->
			<div class="mb-menu">
			<nav role="navigation" class="navbar navbar-default navbar-static-top">
			    <div class="container">
			        <!-- Brand and toggle get grouped for better mobile display -->
			        <div class="navbar-header">
			            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			                <span class="sr-only">Toggle navigation</span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			            </button>
			            <a href="#" class="navbar-brand" style="text-decoration:none;">MENU</a>
			        </div>
			        <!-- Collection of nav links and other content for toggling -->
			        <div id="navbarCollapse" class="collapse navbar-collapse">
			            <ul class="nav navbar-nav">
			                <li><a href="<?php echo base_url(); ?>">Home</a></li>
							<li><a href="<?php echo base_url(); ?>aboutus/">About Us</a></li>
							<li><a href="<?php echo base_url(); ?>searchmaids/">Search Maids</a></li>
							<li><a href="<?php echo base_url(); ?>testimonials/">Testimonials</a></li>
							<li><a href="<?php echo base_url(); ?>contactus/">Contact Us</a></li>
			            </ul>
			            
			        </div>
			    </div>
			</nav>
     		</div><!-- .mb-menu -->
     		<!-- Mobile view -->

			</div>
		</header>

		<div class="col-xs-12 col-sm-12 col-md-12 slider">
			<div class="flexslider">
			<ul class="slides">
				<?php foreach ($sliderData as $slider) { 
					$path = $slider['slide_img']; 
				?>
				<li>
	                <img class="img-responsive" src="<?php echo base_url(). 'uploads/slider/' . $path; ?>" />
				</li>
				<?php }?>
				<!-- <img class="img-responsive" src="<?php //echo base_url(); ?>assets/images/sliders/slide1.png" /> -->
			</ul>
			</div><!-- .flexslider -->
		</div><!-- .slider -->

