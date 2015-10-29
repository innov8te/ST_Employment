<div class="row">
	<div class="col-md-12 page-tit">
		<h1>Contact Us</h1>
	</div><!-- .page-tit -->

	<div class="col-xs-12 col-sm-12 col-md-12 contact-map">
		<!-- <img class="img-responsive" src="<?php //echo base_url(); ?>assets/images/map.png" /> -->
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.721927780089!2d103.77364431529877!3d1.3432413619694736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da108a6367dec9%3A0x3b9624094262326e!2sSingapore+588179!5e0!3m2!1sen!2smm!4v1445972534578" width="1100" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div><!-- .contact-map -->

	<div class="col-xs-12 col-sm-12 col-md-12">
	<?php if($this->session->flashdata('alert_text_success')) { ?>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong><?php echo $this->session->flashdata('alert_text_success'); ?></strong> 
    </div>
    <?php } ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <?php if($this->session->flashdata('alert_text_err')) { ?>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong><?php echo $this->session->flashdata('alert_text_err'); ?></strong> 
    </div>
    <?php } ?>
    </div>


	<div class="col-xs-12 col-sm-4 col-md-4">

	<div class="contact-info">
		<h1>Contact info</h1>
		<!-- <p>ST Employment Pte Ltd. <br />
170 Upper Bukit Timah Road, Bukit Timah Shopping Centre <br />
#02-13, Singapore 588179 <br />
Telephone: +65 6463 2538/48 <br />
FAX: +65 6463 2518 <br />
E-mail: <span>st_employment@singnet.com.sg</span></p> -->
<p>
	<?php echo $contactusData['contactus_address']['page_content']; ?>
	<br />
	Telephone : <?php echo $contactusData['contactus_tel']['page_content']; ?>

	<br />
	FAX : <?php echo $contactusData['contactus_fax']['page_content']; ?>

	<br />
	E-mail : <span><?php echo $contactusData['contactus_email']['page_content']; ?></span>
</p>
	</div><!-- .contact-info -->
	</div>

	<div class="col-xs-12 col-sm-8 col-md-8">
	<div class="contact-form">
		<h1>Contact form</h1>
		<?php echo form_open('contactus/cnt_send'); ?>
		<div class="row">
		<div class="col-md-4">
		<input type="text" name="cnt_name" placeholder="Name:" required="required" />
		</div>

		<div class="col-md-4">
		<input type="text" name="cnt_email" placeholder="E-mail:" required="required" />
		</div>

		<div class="col-md-4">
		<input type="text" name="cnt_phone" placeholder="Phone:" required="required" />
		</div>

		</div>

		<div class="row">
		<div class="col-md-12">
		<textarea placeholder="Message:" name="cnt_message"></textarea>
		</div>
		</div>

		<div class="row">
		<div class="col-md-12">
		<input type="submit" name="cnt_send" value="send" />
		</div>
		</div>


		<?php echo form_close(); ?>

	</div><!-- .contact-form -->
	</div>
	
</div><!-- .row -->


<script type="text/javascript">

	$(document).ready(function(){
		$("#close").click(function(){
			$(".alert").fadeOut('300');
		});
	});

</script>