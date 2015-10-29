<div class="page-title">
    <div class="title_left">
        <h3></h3>
    </div>                  
</div><!-- .page-title -->


<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php echo form_open_multipart('/admin/add_maid', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"') ?>

        <div class="x_panel">
            <div class="x_title">
                <h2>Add Maid<small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div><!-- .x_title -->


            <div class="x_content">
                <div class="error"><?php echo validation_errors(); ?></div>
                <?php 
                        if ($this->session->flashdata('alert_text')) {
                            echo $this->session->flashdata('alert_text');
                        }
                ?>
            	<br />
                <?php //echo form_open_multipart('/admin/add_maid', 'id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"') ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="maid_name" required="" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Feature
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                          
                            <div class="btn-group" data-toggle="buttons">
                                <input type="radio" class="flat" name="feature" value="1" /> YES
                                <input type="radio" class="flat" name="feature" value="0" checked="" required /> NO
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="maid_img" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">REF.CODE <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="ref_code" required="" placeholder="cynthia002" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SALARY <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="salary" placeholder="$300" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">DAY OFF
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="day_off" placeholder="4" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="type" class="form-control">
                            <?php foreach ($typeList as $type) { ?>
                                <option value="<?php echo $type['type_name']; ?>"><?php echo $type['type_name']; ?></option>
                            <?php } ?>                              
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">MAID AGENCY <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="maid_agency" placeholder="Sinar Employment Agency" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">AVAILABLE
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="available" placeholder="Passport Ready" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">FROM
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="from" class="form-control">
                            <?php foreach ($countriesList as $country) { ?>
                                <option value="<?php echo $country['country_citizen']; ?>"><?php echo $country['country_name']; ?></option>
                            <?php } ?>                              
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">DATE OF BIRTH
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-4">
                            <select class="form-control" id="year" name="year" onchange="return changeAge(this);">
                            <?php
                            $startdate = 1960;
                            $current_year = date("Y");
                            $years = range ($startdate,$current_year);
                            ?>                            
                            <?php                                
                            foreach($years as $year)
                            {
                            ?>
                            <option <?php if($year == 1990) echo "selected"; ?> value="<?php echo $year; ?>"><?php echo $year; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                            </div>

                            <div class="col-md-4">
                            <select class="form-control" name="month">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            </div>

                            <div class="col-md-4">
                            <select class="form-control" name="day">
                                <?php
                                for ( $n = 1; $n <= 31; $n++)
                                {
                                    if( $n < 10)
                                    {
                                ?>
                                    <option value="0<?php echo $n; ?>">0<?php echo $n; ?></option>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    <option value="<?php echo $n; ?>"><?php echo $n; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            </div>


                        </div>
                    </div>

                    <div class="form-group" style="display:none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Age
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="age" value="25" id="age" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">PLACE OF BIRTH
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="place_of_birth" placeholder="Singapore" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SIBLING
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="sibling" placeholder="2 of 4" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">HEIGHT
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="height" placeholder="Unit in cm" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">WEIGHT
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="weight" placeholder="Unit in kg" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">RELIGION
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="religious" class="form-control">
                            <?php foreach ($religiousList as $religious) { ?>
                                <option value="<?php echo $religious['religious_name']; ?>"><?php echo $religious['religious_name']; ?></option>
                            <?php } ?>                              
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">MARITAL STATUS
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="marital" class="form-control">
                            <?php foreach ($maritalList as $marital) { ?>
                                <option value="<?php echo $marital['marital_name']; ?>"><?php echo $marital['marital_name']; ?></option>
                            <?php } ?>                              
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">CHILDREN
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="children" placeholder="2(age 6 & 11)" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">EDUCATION
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="education" placeholder="High School(10-12 yrs)" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">LANGUAGE SKILL
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="language_skill" placeholder="English (Excellent, 0yrs)" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    


                </div><!-- .x_content -->
                </div><!-- .x_panel -->

<!-- /***************************************************/ -->


        <div class="x_panel">
            <div class="x_title">
                <h2>PREFERENCE/APTITUDE & EXPERIENCE <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div><!-- .x_title -->

            <div class="x_content">
            <br />

                <?php foreach($experienceList as $experience) { ?>
                <div class="row" style="text-align:right;margin-top:15px;">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-top:8px;"><?php echo $experience['experience_name']; ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" required="" rows="10" name="exp<?php echo $experience['experience_id']; ?>" max="5" min="0" class="form-control exp" placeholder="Rate your skill from 0 to 5">
                    </div>
                </div>
                </div><!-- .row -->
                <?php } ?>

            </div><!-- .x_content -->
        </div><!-- .x_panel -->

<!-- /***************************************************/ -->
                
            <div class="x_panel">
            <div class="x_title">
                <h2>OTHER INFORMATION  <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div><!-- .x_title -->

            <div class="x_content">
           
                <?php foreach($otherinfoList as $otherinfo) { ?>
                <div class="row" style="text-align:right;margin-top:15px;">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $otherinfo['other_info_name']; ?>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="text-align:left;">
                        <div class="btn-group" data-toggle="buttons">
                            <input type="radio" class="flat" name="otherinfo<?php echo $otherinfo['other_info_id']; ?>" value="1" /> YES
                            <input type="radio" class="flat" name="otherinfo<?php echo $otherinfo['other_info_id']; ?>" value="0" /> NO
                        </div>

                    </div>
                </div>
                </div><!-- .row -->
                <?php } ?>
                 <br /> 

                <div class="ln_solid"></div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">WORKING EXPERIENCE <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="working_experience" placeholder="Add working experience" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">MAID INTRODUCTION 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" name="info_introduce" rows="6"></textarea>
                        </div>
                    </div>

                  

             <!-- /***************************************************/ -->   
                   
                    <br />

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="<?php echo base_url()."admin/maids/"?>" class="btn btn-primary">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                <?php echo form_close(); ?>


            </div><!-- .x_content -->
        </div><!-- .x_panel -->

    </div><!-- .col/span -->
</div><!-- .row -->


<script>
    /* For age */
    function changeAge(form)
    {
        var year = document.getElementById("year").value;    
        
        var d = new Date();
        var current_year = d.getFullYear(); 
        //var current_year = document.getElementById("current_year").value;

        var age = current_year -year;
        document.getElementById("age").value = age;
    }

$(document).ready(function(){
    $(".exp").keypress(function(e){
        var code = e.keyCode;
        console.log(code);
        if (code < 46 || code > 57) {
            return false;
        }
        return true;
    });
});
</script>