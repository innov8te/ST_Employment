<div class="page-title">
    <div class="title_left">
        <h3>Contact Us</h3>
    </div>                  
</div><!-- .page-title -->
                    
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Page Content <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div><!-- .x_title -->
            
            <div class="x_content">
            <?php if($this->session->flashdata('alert_text')) { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong><?php echo $this->session->flashdata('alert_text'); ?></strong> 
            </div>
            <?php } ?>
                <br />
                <?php echo form_open_multipart('/admin/contactus', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"') ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            Address
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" name="contactus_address" rows="6"><?php echo $contactus_address_data['page_content']; ?></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            Telephone
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="contactus_tel" value="<?php echo $contactus_tel_data['page_content']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            FAX
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="contactus_fax" value="<?php echo $contactus_fax_data['page_content']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            E-mail
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="contactus_email" value="<?php echo $contactus_email_data['page_content']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>



                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>


                <?php echo form_close(); ?>
            </div><!-- .x_content -->
        </div><!-- .x_panel -->
    </div><!-- .col/span -->
</div><!-- .row -->