<!doctype html>
<html lang="en">

<head>
<title>:: MPK :: 404</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Mplify Bootstrap 4.1.1 Admin Template">
<meta name="author" content="ThemeMakker, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?php echo config_item('base_url'); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo config_item('base_url'); ?>assets/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="<?php echo config_item('base_url'); ?>assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo config_item('base_url'); ?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo config_item('base_url'); ?>assets/css/color_skins.css">
</head>

<body class="theme-blue">
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="mobile-logo"><a href="index.html"><img src="<?php echo config_item('base_url'); ?>assets/images/logo-icon.svg" alt="Mplify"></a></div>
                    <div class="auth-left">
                        <div class="left-top">
                            <a href="index.html">
                                <img src="<?php echo config_item('base_url'); ?>assets/images/logo-icon.svg" alt="Monitoring">
                                <span>MPK</span>
                            </a>
                        </div>
                        <div class="left-slider">
                            <img src="<?php echo config_item('base_url'); ?>assets/images/login/1.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="auth-right">
                        <div class="right-top">
                            <ul class="list-unstyled clearfix d-flex">
                                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li><a href="javascript:void(0);">Help</a></li>
                                <li><a href="javascript:void(0);">Contact</a></li>
                            </ul>
                        </div>
                        <div class="card">
                            <div class="header">
                                <p class="lead">  <h1><?php echo $heading; ?></h1>
		
														<span class="text"><?php echo $message; ?></span></p>
                            </div>
                            <div class="body">
                                <p>The page you were looking for could not be found, please <a href="javascript:void(0);">contact us</a> to report this issue.</p>
                                <div class="margin-top-30">
                                    <a href="javascript:history.go(-1)" class="btn btn-default"><i class="fa fa-arrow-left"></i> <span>Go Back</span></a>
                                    <a href="<?php echo config_item('base_url'); ?>" class="btn btn-primary"><i class="fa fa-home"></i> <span>Home</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- END WRAPPER -->
</body>
</html>

