<!doctype html>
<html lang="en">

<head>
<title>Monitoring Proyek</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Mplify Bootstrap 4.1.1 Admin Template">
<meta name="author" content="ThemeMakker, design by: ThemeMakker.com">

<link rel="icon" href="<?= base_url();?>assets/favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css">


<!-- calender CSS -->
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/fullcalendar/fullcalendar.min.css">


<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/multi-select/css/multi-select.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/nouislider/nouislider.min.css" />


<link rel="stylesheet" href="<?= base_url();?>assets/vendor/parsleyjs/css/parsley.css">

<!-- progress bar -->
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">

<!-- header -->
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/chartist/css/chartist.min.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">

<!-- //kanban -->
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/nestable/jquery-nestable.css"/>
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/sweetalert/sweetalert.css"/>
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?= base_url();?>assets/css/main.css">
<link rel="stylesheet" href="<?= base_url();?>assets/css/color_skins.css">

<!-- datatable -->
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url();?>assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">


<?php if($this->ion_auth->in_group('pimpinan')) : ?>
<!-- notifikasi -->
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
        <script>
            var OneSignal = window.OneSignal || [];
            OneSignal.push(["init", {
                appId: "d18d79df-2533-4bbd-8d04-9d1aab0d1690",
                subdomainName: 'proyek',
                autoRegister: true,
                promptOptions: {
                    /* These prompt options values configure both the HTTP prompt and the HTTP popup. */
                    /* actionMessage limited to 90 characters */
                    actionMessage: "Percobaan pesan subs",
                    /* acceptButtonText limited to 15 characters */
                    acceptButtonText: "ALLOW",
                    /* cancelButtonText limited to 15 characters */
                    cancelButtonText: "NO THANKS"
                }
            }]);
        </script>
        <script>
            function subscribe() {
                // OneSignal.push(["registerForPushNotifications"]);
                OneSignal.push(["registerForPushNotifications"]);
                event.preventDefault();
            }
            function unsubscribe(){
                OneSignal.setSubscription(true);
            }

            var OneSignal = OneSignal || [];
            OneSignal.push(function() {
                /* These examples are all valid */
                // Occurs when the user's subscription changes to a new value.
                OneSignal.on('subscriptionChange', function (isSubscribed) {
                    console.log("The user's subscription state is now:", isSubscribed);
                    OneSignal.sendTag("user_id","<?php echo $this->session->userdata('user_id'); ?>", function(tagsSent)
                    {
                        // Callback called when tags have finished sending
                        console.log("Tags have finished sending!");
                    });
                });

                var isPushSupported = OneSignal.isPushNotificationsSupported();
                if (isPushSupported)
                {
                    // Push notifications are supported
                    OneSignal.isPushNotificationsEnabled().then(function(isEnabled)
                    {
                        if (isEnabled)
                        {
                            console.log("Push notifications are enabled!");

                        } else {
                            OneSignal.showHttpPrompt();
                            console.log("Push notifications are not enabled yet.");
                        }
                    });

                } else {
                    console.log("Push notifications are not supported.");
                }
            });


        </script>
        <!-- akhir notifikasi -->
        <?php endif;?>


<style>
    td.details-control {
    background: url('../assets/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
    tr.shown td.details-control {
        background: url('../assets/images/details_close.png') no-repeat center center;
    }
</style>


<!-- <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script> -->

<!-- Download dari luar -->
<script src="<?= base_url();?>assets/vendor/jquery/bukanbawaantemplate/jquery.min.js"></script>



</head>
<body class="theme-blue">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="<?= base_url();?>assets/images/thumbnail.png" width="48" height="48" alt="Mplify"></div>
            <p>Please wait...</p>        
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay" style="display: none;"></div>
    
    <div id="wrapper">
    
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
    
                <div class="navbar-brand">
                    <a href="<?= base_url(); ?>">
                        <img src="<?= base_url();?>assets/images/logo-icon.svg" alt="Mplify Logo" class="img-responsive logo">
                        <span class="name">MPK</span>
                    </a>
                </div>
                
                <div class="navbar-right">
                    <ul class="list-unstyled clearfix mb-0">
                        <li>
                            <div class="navbar-btn btn-toggle-show">
                                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                            </div>                        
                            <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="fa fa-bars"></i></a>
                        </li>
                        <!-- <li>
                            <form id="navbar-search" class="navbar-form search-form">
                                <input value="" class="form-control" placeholder="Search here..." type="text">
                                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                            </form>
                        </li> -->
                        <li>
                            <div id="navbar-menu">
                                <ul class="nav navbar-nav">
                                   
                                   
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                            <img class="rounded-circle" src="<?php 
                                                    $idusersesi = $this->session->userdata('user_id');
                                                    $sql="SELECT * from users where id='$idusersesi'";
                                                    $result = $this->db->query($sql)->row();
                                                    echo base_url()."assets/fotoprofile/".$result->foto; ?>" width="30" height="30" alt="">
                                        </a>
                                        <div class="dropdown-menu animated flipInY user-profile">
                                            <div class="d-flex p-3 align-items-center">
                                                <div class="drop-left m-r-10">
                                                    <img src="<?php 
                                                    $idusersesi = $this->session->userdata('user_id');
                                                    $sql="SELECT * from users where id='$idusersesi'";
                                                    $result = $this->db->query($sql)->row();
                                                    echo base_url()."assets/fotoprofile/".$result->foto; ?>" class="rounded" width="50" alt="">
                                                   
                                                </div>
                                                <div class="drop-right">
                                                    <h4>
                                                    <?php 
                                                    $idusersesi = $this->session->userdata('user_id');
                                                    $sql="SELECT * from users where id='$idusersesi'";
                                                    $result = $this->db->query($sql)->row();
                                                    echo $result->first_name; ?>
                                                    </h4>
                                                    <p class="user-name"><?php 
                                                    $idusersesi = $this->session->userdata('user_id');
                                                    $sql="SELECT * from users where id='$idusersesi'";
                                                    $result = $this->db->query($sql)->row();
                                                    echo $result->email; ?></p>
                                                </div>
                                            </div>
                                            <div class="m-t-10 p-3 drop-list">
                                                <ul class="list-unstyled">
                                                    <!-- <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li> -->
                                                    <li class="divider"></li>
                                                    <li><a href="<?= base_url(); ?>auth/logout"><i class="icon-power"></i>Logout</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <div id="leftsidebar" class="sidebar">
            <div class="sidebar-scroll">
                <nav id="leftsidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="heading">Main</li>
                        <li><a href="<?= base_url();?>"><i class="icon-home"></i><span>Dashboard</span></a></li>
                        <li class="heading">Proses Bisnis</li>
                        <li><a href="<?= base_url();?>proyek"><i class="icon-calendar"></i><span>Proyek</span></a></li>
                        <?php if ($this->ion_auth->is_admin()) :?>
                            <li><a href="<?= base_url();?>sektor"><i class="icon-calendar"></i><span>Sektor Bisnis</span></a></li>
                        <?php endif?>
                        

                        <li class="heading">Tabel Master</li>
                        <?php if ($this->ion_auth->is_admin()) :?>
                        <li class="middle">
                            <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>Users</span></a>
                            <ul>
                                <li><a href="<?= base_url();?>auth">View All Users</a></li>
                                <li><a href="<?= base_url();?>auth/create_user">Create User</a></li>
                            </ul>
                        </li>
                        <?php endif?>
                        <li>
                            <a href="#forms" class="has-arrow"><i class="icon-pencil"></i><span>Client</span></a>
                            <ul>
                                <li><a href="<?= base_url();?>client">List Client</a></li>
                                <li><a href="<?= base_url();?>client/provinsi">Provinsi</a></li>
                            </ul>
                        </li>
                        
                        
                    </ul>
                </nav>
            </div>
        </div>
    
        <div id="mega_menubar" class="mega_menubar">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>Subscribe</h2>
                            </div>
                            <div class="body">
                                <form>
                                    <div class="form-group">
                                        <input type="text" value="" placeholder="Enter Name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="" placeholder="Enter Email" class="form-control">
                                    </div>
                                    <button class="btn btn-primary">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>Accordion</h2>
                            </div>
                            <div class="body">
                                <ul class="accordion2">
                                    <li class="accordion-item is-active">
                                        <h3 class="accordion-thumb"><span>Lorem ipsum</span></h3>
                                        <p class="accordion-panel">
                                            Lorem ipsum dolor sit amet, elit. Placeat, quibusdam! Voluptate nobis
                                        </p>
                                    </li>
                                    
                                    <li class="accordion-item">
                                        <h3 class="accordion-thumb"><span>Dolor sit amet</span></h3>
                                        <p class="accordion-panel">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing  Voluptate nobis
                                        </p>
                                    </li>
                                </ul>
    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>Company</h2>
                            </div>
                            <div class="body">
                                <ul class="list-unstyled links">
                                    <li><a href="javascript:void(0);" title="" >Our Facts</a></li>
                                    <li><a href="javascript:void(0);" title="" >Confidentiality</a></li>                                
                                    <li><a href="javascript:void(0);" title="" >About Us</a></li>
                                    <li><a href="javascript:void(0);" title="" >Testimonials</a></li>
                                    <li><a href="javascript:void(0);" title="" >Contact Us</a></li>                                
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>Image Gallery</h2>
                            </div>
                            <div class="body">
                                <div class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <img src="<?= base_url();?>assets/images/image-gallery/1.jpg" class="img-fluid" alt="img" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= base_url();?>assets/images/image-gallery/2.jpg" class="img-fluid" alt="img" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= base_url();?>assets/images/image-gallery/3.jpg" class="img-fluid" alt="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins" aria-expanded="true">Mplify</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact" aria-expanded="false">Contact</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Timeline" aria-expanded="false">Timeline </a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane animated fadeIn in active" id="skins" aria-expanded="true">
                    <div class="sidebar-scroll">
                        <div class="card">
                            <div class="header">
                                <h2>General Setting</h2>
                            </div>
                            <div class="body">
                                <ul class="setting-list list-unstyled">
                                    <li>
                                        <label for="checkbox1" class="fancy-checkbox">
                                            <input id="checkbox1" type="checkbox">
                                            <span>Report Panel Usage</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox2" class="fancy-checkbox">
                                            <input id="checkbox2" type="checkbox" checked>
                                            <span>Email Redirect</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox3" class="fancy-checkbox">
                                            <input id="checkbox3" type="checkbox" checked>
                                            <span>Notifications</span>
                                        </label>         
                                    </li>
                                    <li>
                                        <label for="checkbox4" class="fancy-checkbox">
                                            <input id="checkbox4" type="checkbox">
                                            <span>Auto Updates</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox5" class="fancy-checkbox">
                                            <input id="checkbox5" type="checkbox">
                                            <span>Offline</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox6" class="fancy-checkbox">
                                            <input id="checkbox6" type="checkbox">
                                            <span>Location Permission</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2>Color Skins</h2>
                            </div>
                            <div class="body">
                                <ul class="choose-skin list-unstyled">
                                    <li data-theme="purple">
                                        <div class="purple"></div>
                                        <span>Purple</span>
                                    </li>                   
                                    <li data-theme="blue" class="active">
                                        <div class="blue"></div>
                                        <span>Blue</span>
                                    </li>
                                    <li data-theme="cyan">
                                        <div class="cyan"></div>
                                        <span>Cyan</span>
                                    </li>
                                    <li data-theme="green">
                                        <div class="green"></div>
                                        <span>Green</span>
                                    </li>
                                    <li data-theme="orange">
                                        <div class="orange"></div>
                                        <span>Orange</span>
                                    </li>
                                    <li data-theme="blush">
                                        <div class="blush"></div>
                                        <span>Blush</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2>Storage</h2>
                            </div>
                            <div class="body">
                                <div class="progress progress-xs mb-0">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 89%;">
                                    </div>
                                </div>
                                <small>50MB of 10GB Used</small>
                                <button type="button" class="btn btn-primary btn-block mt-3">Upgrade Storage</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane animated fadeIn" id="contact" aria-expanded="false">
                    <div class="sidebar-scroll">
                        <div class="card">
                            <div class="header">
                                <h2>Recent Chat</h2>
                            </div>
                            <div class="body">
                                <ul class="right_chat list-unstyled">
                                    <li class="online">
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <img class="media-object " src="<?= base_url();?>assets/images/xs/avatar4.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Chris Fox</span>
                                                    <span class="message">Angular Champ</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </div>
                                        </a>                            
                                    </li>
                                    <li class="online">
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <img class="media-object " src="<?= base_url();?>assets/images/xs/avatar5.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Joge Lucky</span>
                                                    <span class="message">Sales Lead</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </div>
                                        </a>                            
                                    </li>
                                    <li class="offline">
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <img class="media-object " src="<?= base_url();?>assets/images/xs/avatar2.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Isabella</span>
                                                    <span class="message">CEO, Thememakker</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </div>
                                        </a>                            
                                    </li>
                                    <li class="offline">
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <img class="media-object " src="<?= base_url();?>assets/images/xs/avatar1.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Folisise Chosielie</span>
                                                    <span class="message">PHP Expert</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </div>
                                        </a>                            
                                    </li>
                                    <li class="online">
                                        <a href="javascript:void(0);">
                                            <div class="media">
                                                <img class="media-object " src="<?= base_url();?>assets/images/xs/avatar3.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Alexander</span>
                                                    <span class="message">eCommerce Master</span>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </div>
                                        </a>                            
                                    </li>                        
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2>Contact List</h2>
                            </div>
                            <div class="body">
                                <ul class="list-unstyled contact-list">
                                    <li class="d-flex align-items-center">
                                        <span class="contact-img">
                                            <img src="<?= base_url();?>assets/images/xs/avatar1.jpg" class="rounded" alt="">
                                        </span>
                                        <h4 class="contact-name">Vincent Porter <span class="d-block">London UK</span></h4>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="contact-img">
                                            <img src="<?= base_url();?>assets/images/xs/avatar2.jpg" class="rounded" alt="">
                                        </span>
                                        <h4 class="contact-name">Mike Thomas <span class="d-block">London UK</span></h4>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="contact-img">
                                            <img src="<?= base_url();?>assets/images/xs/avatar3.jpg" class="rounded" alt="">
                                        </span>
                                        <h4 class="contact-name">Aiden Chavaz</h4>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="contact-img">
                                            <img src="<?= base_url();?>assets/images/xs/avatar4.jpg" class="rounded" alt="">
                                        </span>
                                        <h4 class="contact-name">Vincent Porter <span class="d-block">London UK</span></h4>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="contact-img">
                                            <img src="<?= base_url();?>assets/images/xs/avatar5.jpg" class="rounded" alt="">
                                        </span>
                                        <h4 class="contact-name">Mike Thomas <span class="d-block">London UK</span></h4>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span class="contact-img">
                                            <img src="<?= base_url();?>assets/images/xs/avatar6.jpg" class="rounded" alt="">
                                        </span>
                                        <h4 class="contact-name">Aiden Chavaz</h4>
                                    </li>                             
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane animated fadeIn" id="Timeline" aria-expanded="false">
                    <div class="sidebar-scroll">
                        <div class="card">
                            <div class="header">
                                <h2>My Stats</h2>
                            </div>
                            <div class="body">
                                <ul class="list-unstyled basic-list">
                                    <li><i class="icon-book-open m-r-5"></i> Active Projects <span class="badge badge-primary">21</span></li>
                                    <li><i class="icon-list m-r-5"></i> Task Pending <span class="badge-purple badge">50</span></li>
                                    <li><i class="fa fa-ticket m-r-5"></i> Support Tickets<span class="badge-success badge">9</span></li>
                                    <li><i class="icon-tag m-r-5"></i> New Projects<span class="badge-info badge">7</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="body">
                                <div class="new_timeline mt-3">
                                    <div class="header">
                                        <div class="color-overlay">
                                            <div class="day-number">8</div>
                                            <div class="date-right">
                                            <div class="day-name">Monday</div>
                                            <div class="month">July 2018</div>
                                            </div>
                                        </div>                                
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="bullet pink"></div>
                                            <div class="time">11am</div>
                                            <div class="desc">
                                                <h3>Attendance</h3>
                                                <h4>Computer Class</h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="bullet green"></div>
                                            <div class="time">12pm</div>
                                            <div class="desc">
                                                <h3>Developer Team</h3>
                                                <h4>Hangouts</h4>
                                                <ul class="list-unstyled team-info margin-0 p-t-5">                                            
                                                    <li><img src="<?= base_url();?>assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                    <li><img src="<?= base_url();?>assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                    <li><img src="<?= base_url();?>assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                    <li><img src="<?= base_url();?>assets/images/xs/avatar4.jpg" alt="Avatar"></li>                                            
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="bullet orange"></div>
                                            <div class="time">1:30pm</div>
                                            <div class="desc">
                                                <h3>Lunch Break</h3>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="bullet green"></div>
                                            <div class="time">2pm</div>
                                            <div class="desc">
                                                <h3>Finish</h3>
                                                <h4>Go to Home</h4>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    
    

