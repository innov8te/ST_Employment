<div class="page-title">
    <div class="title_left">
    	<a href="<?php echo base_url(); ?>admin/add_experience/" class="btn btn-primary">Add Experience</a>
    </div>                  
</div><!-- .page-title -->


<div class="clearfix"></div>


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Added experience  <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div><!-- .x_title -->

            <div class="x_content">
            	<br />
                <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                <thead>
                    <tr class="headings">                       
                        <th class="column-title">ID</th>
                        <th class="column-title">Experience</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($experienceList as $experience) { ?>
                    <tr class="even pointer">
                        <td><?php echo $experience['experience_id']; ?></td>
                        <td><?php echo $experience['experience_name']; ?></td>
                        <td>
                        <a href="<?php echo base_url() . "admin/edit_experience/{$experience['experience_id']}" ?>" class="btn-border"><i class="fa fa-edit"></i> Edit </a>
                        <a href="#" class="btn-border" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-delete"></i> Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
                </div><!-- .table-responsive -->

                <!-- modal -->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Delete Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to delete this one?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <a href="<?php echo base_url() . "admin/delete_experience/{$experience['experience_id']}" ?>" class="btn btn-primary"> Yes </a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- modal -->


            </div><!-- .x_content -->
        </div><!-- .x_panel -->
    </div><!-- .col/span -->
</div><!-- .row -->