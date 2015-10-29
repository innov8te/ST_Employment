<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" />
 
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>


</head>
<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <div class="error"><?php echo validation_errors(); ?></div>
                    <?php 
                        if ($this->session->flashdata('alert_text')) {
                            echo $this->session->flashdata('alert_text');
                        }
                    ?>
					<?php echo form_open('admin/login'); ?>
                        <h1><i style="font-size: 26px;"></i> ST Employment</h1>
                        <div>
                            <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <input type="submit" value="Login" class="btn btn-default submit" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>                              
                                <p>©2015 All Rights Reserved.</p>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
         
        </div>
    </div>

</body>
</html>