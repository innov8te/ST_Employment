<div class="page-title">
    <div class="title_left">
        <h3>Site Settings</h3>
    </div>                  
</div><!-- .page-title -->

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>General <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div><!-- .x_title -->

            <div class="x_content">
            	<br />
                <?php echo form_open_multipart('admin/settings','id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"'); ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sitename 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="sitename" value="<?php echo $sitename['page_name']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Favicon 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="faviconimg" class="form-control col-md-7 col-xs-12">
                            <?php 
                                $path = $faviconimg['page_image']; 
                            ?>
                                <img class="show-img" src="<?php echo base_url(). 'uploads/' . $path; ?>" />
                        </div>                       
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Logo 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="sitelogoimg" class="form-control col-md-7 col-xs-12">
                            <?php 
                            $path = $sitelogoimg['page_image']; 
                            ?>
                                <img class="show-img" src="<?php echo base_url(). 'uploads/' . $path; ?>" />
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