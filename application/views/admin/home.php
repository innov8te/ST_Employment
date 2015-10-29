<div class="page-title">
    <div class="title_left">
        <h3>Home</h3>
    </div>                  
</div><!-- .page-title -->

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Welcome Message <small></small></h2>
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
                <?php echo form_open('/admin/home', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"') ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">

                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"  name="welcome_tit" value="<?php echo $hm_welcome_data['page_title']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" name="welcome_content" rows="6"><?php echo $hm_welcome_data['page_content']; ?></textarea>
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