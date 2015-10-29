<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ST Employment </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css" />

    <!-- Custom styling plus plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin-style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" />
    <!-- editor -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/editor/external/google-code-prettify/prettify.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/editor/index.css" />
   
    <!-- select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select/select2.min.css" />

    <!-- switchery -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/switchery/switchery.min.css" />

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">
        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                       <div class="col-md-12" style="padding-top:15px;padding-bottom:15px;"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/admin/ad-logo.png" /></div> 
                    	<!-- <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>ST Employment</span></a> -->
                    </div>
                    <div class="clearfix"></div>

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <?php 
                                if($this->session->userdata('user_role')){
                                    $user_role = $this->session->userdata('user_role');
                                }else{
                                    $user_role = null;
                                }
                            ?>
                            <!-- For user role 1 -->
                            <?php if ($user_role == 1) { ?>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/home">Page Content</a>
                                        </li>
                                    </ul>
                                </li>
                                

                                <li><a><i class="fa fa-slideshare"></i> About Us <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/aboutus/">Page Content</a>
                                        </li>
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-edit"></i> Testimonials <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/add_testimonial/">Add Testimonial</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/testimonials/">All Testimonials</a></li>
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-group"></i> Maid <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/maids/">Maids</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/countries/">Countries</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/religious/">Religions</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/type/">Type</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/marital/">Marital Status</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/other_information/">Other Information</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/experience/">Experiences</a></li>
                                        <!-- <li><a href="<?php //echo base_url(); ?>admin/maid/page_setting/">Page Content</a></li> -->
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-envelope"></i> Contact Us <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/contactus/">Page Content</a>
                                        </li>
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/add_user/">Add User</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/users/">All Users</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-cog"></i> Age Group <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/add_age/">Add Age</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/age/">Added age group</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-sliders"></i> Slider <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/add_slider/">Add Slider</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/slider/">Management Slider</a></li>
                                    </ul>
                                </li>


                                <li><a href="<?php echo base_url(); ?>admin/settings/"><i class="fa fa-desktop"></i> Site Settings </a>
                                </li>
                                
                            </ul>
                            <?php } ?>

                            <!-- For user role 2 & 3 -->
                            <?php if ($user_role == 2 || $user_role == 3) { ?>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/home">Page Content</a>
                                        </li>
                                    </ul>
                                </li>
                                

                                <li><a><i class="fa fa-edit"></i> About Us <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/aboutus/">Page Content</a>
                                        </li>
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-edit"></i> Testimonials <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/add_testimonial/">Add Testimonial</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/testimonials/">All Testimonials</a></li>
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-edit"></i> Maid <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/maids/">Maids</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/countries/">Countries</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/religious/">Religions</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/type/">Type</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/marital/">Marital Status</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/other_information/">Other Information</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/experience/">Experiences</a></li>
                                        <!-- <li><a href="<?php //echo base_url(); ?>admin/maid/page_setting/">Page Content</a></li> -->
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-edit"></i> Contact Us <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/contactus/">Page Content</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="<?php echo base_url(); ?>admin/profile/"><i class="fa fa-edit"></i> Profile </a>
                                </li>

                                <li><a><i class="fa fa-edit"></i> Age Group <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/add_age/">Add Age</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/age/">Added age group</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-edit"></i> Slider <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url(); ?>admin/add_slider/">Add Slider</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/slider/">Management Slider</a></li>
                                    </ul>
                                </li>


                                <li><a href="<?php echo base_url(); ?>admin/settings/"><i class="fa fa-edit"></i> Site Settings </a>
                                </li>
                                
                            </ul>
                            <?php } ?>

                        </div><!-- .menu_section -->
                        

                    </div><!-- /sidebar menu -->

                    
                </div><!-- .scroll-view -->
            </div><!-- .left_col -->

            <!-- /*****************************************************/ -->

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                            <?php 
                                if($this->session->userdata('login_username')){
                                    $login_username = $this->session->userdata('login_username');
                                }else{
                                    $login_username = null;
                                }
                            ?>

                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt=""><?php echo $login_username; ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    
                                    <li><a href="<?php echo base_url(); ?>admin/profile/"> Profile </a>
                                     </li>
                                    <!--<li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Help</a>
                                    </li>-->
                                    <li><a href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div><!-- .nav_menu -->

            </div><!-- /top navigation -->

            <!-- /*****************************************************/ -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div>                
                    <?php $this->load->view($main_content); ?>
                </div>                    

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#birthday').daterangepicker({
                                singleDatePicker: true,
                                calender_style: "picker_4"
                            }, function (start, end, label) {
                                console.log(start.toISOString(), end.toISOString(), label);
                            });
                        });
                    </script>

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">
                        ©2015 All Rights Reserved. ST Employment
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

                </div><!-- .right_col -->

     <!-- /*****************************************************/ -->

    </div><!-- .main_container -->
    </div><!-- .main_container -->


        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="<?php echo base_url(); ?>assets/js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>

        <!-- icheck -->
        <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>
        <!-- tags -->
        <script src="<?php echo base_url(); ?>assets/js/tags/jquery.tagsinput.min.js"></script>
        <!-- switchery -->
        <script src="<?php echo base_url(); ?>assets/js/switchery/switchery.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>assets/js/moment.min2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/datepicker/daterangepicker.js"></script>
        <!-- richtext editor -->
       
        <script src="<?php echo base_url(); ?>assets/js/editor/bootstrap-wysiwyg.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/editor/external/jquery.hotkeys.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/editor/external/google-code-prettify/prettify.js"></script>
        <!-- select2 -->
        <script src="<?php echo base_url(); ?>assets/js/select/select2.full.js"></script>
        <!-- form validation -->
        <script src="<?php echo base_url(); ?>assets/js/parsley/parsley.min.js"></script>
        <!-- textarea resize -->
        <script src="<?php echo base_url(); ?>assets/js/textarea/autosize.min.js"></script>
        <script>
            autosize($('.resizable_textarea'));
        </script>
        <!-- Autocomplete -->
        <script src="<?php echo base_url(); ?>assets/js/autocomplete/countries.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript">
            $(function () {
                'use strict';
                var countriesArray = $.map(countries, function (value, key) {
                    return {
                        value: value,
                        data: key
                    };
                });
                // Initialize autocomplete with custom appendTo:
                $('#autocomplete-custom-append').autocomplete({
                    lookup: countriesArray,
                    appendTo: '#autocomplete-container'
                });
            });
        </script>

        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

        <!-- select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true
                });
            });
        </script>
        <!-- /select2 -->
        <!-- input tags -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->
        <!-- form validation -->
        <script type="text/javascript">
            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form .btn').on('click', function () {
                    $('#demo-form').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });

            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form2 .btn').on('click', function () {
                    $('#demo-form2').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form2').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });
            try {
                hljs.initHighlightingOnLoad();
            } catch (err) {}
        </script>
        <!-- /form validation -->
        <!-- editor -->
        <script>
            $(document).ready(function () {            	
                $('.xcxc').click(function () {
                    $('#descr').val($('#editor').html());
                });
            });

            $(function () {
                function initToolbarBootstrapBindings() {
                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                'Times New Roman', 'Verdana'],
                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                    $.each(fonts, function (idx, fontName) {
                        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                    });
                    $('a[title]').tooltip({
                        container: 'body'
                    });
                    $('.dropdown-menu input').click(function () {
                            return false;
                        })
                        .change(function () {
                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                        })
                        .keydown('esc', function () {
                            this.value = '';
                            $(this).change();
                        });

                    $('[data-role=magic-overlay]').each(function () {
                        var overlay = $(this),
                            target = $(overlay.data('target'));
                        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                    });
                    if ("onwebkitspeechchange" in document.createElement("input")) {
                        var editorOffset = $('#editor').offset();
                        $('#voiceBtn').css('position', 'absolute').offset({
                            top: editorOffset.top,
                            left: editorOffset.left + $('#editor').innerWidth() - 35
                        });
                    } else {
                        $('#voiceBtn').hide();
                    }
                };

                function showErrorAlert(reason, detail) {
                    var msg = '';
                    if (reason === 'unsupported-file-type') {
                        msg = "Unsupported format " + detail;
                    } else {
                        console.log("error uploading file", reason, detail);
                    }
                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                };
                initToolbarBootstrapBindings();
                $('#editor').wysiwyg({
                    fileUploadError: showErrorAlert
                });
                window.prettyPrint && prettyPrint();
            });
        </script>
        <!-- /editor -->
</body>

</html>