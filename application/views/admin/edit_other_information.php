<div class="page-title">
    <div class="title_left">
        <h3>Other Information </h3>
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

            <?php if($this->session->flashdata('alert_text')) { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong><?php echo $this->session->flashdata('alert_text'); ?></strong> 
            </div>
            <?php } ?>


            <div class="x_content">
            	<br />
                <?php echo form_open('/admin/edit_other_information/'.$otherinfo_data['oth_id'], 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"') ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Other Information <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="other_info_name" value="<?php echo $otherinfo_data['oth_name']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                   
                    <div class="ln_solid"></div>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="<?php echo base_url()."admin/other_information"?>" class="btn btn-primary">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                    <?php echo form_close(); ?>
            </div><!-- .x_content -->
        </div><!-- .x_panel -->
    </div><!-- .col/span -->
</div><!-- .row -->