<div class="page-title">
    <div class="title_left">
        <h3>Slider </h3>
    </div>                  
</div><!-- .page-title -->

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div><!-- .x_title -->
            <div class="error"><?php echo validation_errors(); ?></div>
            
            <?php if($this->session->flashdata('alert_text')) { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong><?php echo $this->session->flashdata('alert_text'); ?></strong> 
            </div>
            <?php } ?>


            <div class="x_content">
            	<br />
                <?php echo form_open_multipart('/admin/edit_slider/'.$slider_data['slide_id'], 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"') ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="slider_name" value="<?php echo $slider_data['slide_name']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="file" name="sliderimg" class="form-control col-md-7 col-xs-12">
                            <?php 
                                $path = $slider_data['slide_img']; 
                            ?>
                                <img class="show-img" src="<?php echo base_url(). 'uploads/slider/' . $path; ?>" />
                        </div>                       
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider text 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="slider_text" value="<?php echo $slider_data['slide_text']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider link 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="slider_link" value="<?php echo $slider_data['slide_link']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>



                   
                    <div class="ln_solid"></div>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="<?php echo base_url()."admin/slider"?>" class="btn btn-primary">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                    <?php echo form_close(); ?>
            </div><!-- .x_content -->
        </div><!-- .x_panel -->
    </div><!-- .col/span -->
</div><!-- .row -->