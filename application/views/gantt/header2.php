<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
		<title>Monitoring Proyek</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <!-- bootstrap framework -->
		<link href="<?= base_url();?>YukonAdminv1.4/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		
        <!-- icon sets -->
            <!-- elegant icons -->
                <link href="<?= base_url();?>YukonAdminv1.4/assets/icons/elegant/style.css" rel="stylesheet" media="screen">
            <!-- elusive icons -->
                <link href="<?= base_url();?>YukonAdminv1.4/assets/icons/elusive/css/elusive-webfont.css" rel="stylesheet" media="screen">
            <!-- flags -->
                <link rel="stylesheet" href="<?= base_url();?>YukonAdminv1.4/assets/icons/flags/flags.css">
            <!-- scrollbar -->
                <link rel="stylesheet" href="<?= base_url();?>YukonAdminv1.4/assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">


        <!-- google webfonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

        <!-- main stylesheet -->
		<link href="<?= base_url();?>YukonAdminv1.4/assets/css/main.min.css" rel="stylesheet" media="screen" id="mainCss">

        <!-- moment.js (date library) -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/js/moment-with-langs.min.js"></script>

    </head>
    <body class="side_menu_active side_menu_expanded">
        <div id="page_wrapper">

            <!-- header -->
            <header id="main_header" class="topBar_style_14">
                <div class="container-fluid">
                    <div class="brand_section">
                        <a href="<?= base_url();?>"><img src="<?= base_url();?>YukonAdminv1.4/assets/img/logo.png" alt="site_logo" width="63" height="26"></a>
                    </div>
                    
                    <div class="header_user_actions dropdown">
                        <div data-toggle="dropdown" class="dropdown-toggle user_dropdown">
                            <div class="user_avatar">
                                <img src="<?= base_url();?>YukonAdminv1.4/assets/img/avatars/avatar08_tn.png" alt="" title="Carrol Clark (carrol@example.com)" width="38" height="38">
                            </div>
                            <span class="caret"></span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <!-- <li><a href="login_page.html">Log Out</a></li> -->
                        </ul>
                    </div>
                    
                </div>
            </header>

            <!-- breadcrumbs -->
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
		            <li><a href="<?= base_url(); ?>proyek/detail/<?= $this->uri->segment('3');?>">Proyek</a></li>
		            <li><span>Gantt Chart</span></li>
		        </ul>
            </nav>

            <!-- main content -->
            <div id="main_wrapper">
                <div class="container-fluid">
                <?php //var_dump($showgrafik); ?>
                    <div id="ganttChart" class="ganttview-wrapper"></div>               
                 </div>
            </div>
            
            <!-- main menu -->
            <nav id="main_menu">
                <div class="menu_wrapper">
                    <ul>
                        <li class="first_level">
                            <a href="<?= base_url(); ?>proyek/detail/<?= $this->uri->segment('3');?>">
                                <span class="icon_house_alt first_level_icon"></span>
                                <span class="menu-title">Proyek</span>
                            </a>
                        </li>
                       
                    </ul>
                </div>
                <div class="menu_toggle">
                    <span class="icon_menu_toggle">
                        <i class="arrow_carrot-2left toggle_left"></i>
                        <i class="arrow_carrot-2right toggle_right" style="display:none"></i>
                    </span>
                </div>
            </nav>

        </div>

        <!-- jQuery -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/js/jquery.min.js"></script>
        <!-- jQuery Cookie -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/js/jqueryCookie.min.js"></script>
        <!-- Bootstrap Framework -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- retina images -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/js/retina.min.js"></script>
        <!-- switchery -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/lib/switchery/dist/switchery.min.js"></script>
        <!-- typeahead -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/lib/typeahead/typeahead.bundle.min.js"></script>
        <!-- fastclick -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/js/fastclick.min.js"></script>
        <!-- match height -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/lib/jquery-match-height/jquery.matchHeight-min.js"></script>
        <!-- scrollbar -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Yukon Admin functions -->
        <script src="<?= base_url();?>YukonAdminv1.4/assets/js/yukon_all.min.js"></script> -->

	    <!-- page specific plugins -->

            <!-- gantt chart -->
            <script src="<?= base_url();?>YukonAdminv1.4/assets/lib/jquery.ganttView/jquery-ui.min.js"></script>
            <script src="<?= base_url();?>YukonAdminv1.4/assets/lib/jquery.ganttView/date.js"></script>
            <script src="<?= base_url();?>YukonAdminv1.4/assets/lib/jquery.ganttView/jquery.ganttView.js"></script>
            <script>
                $(function() {

                    // gantt chart
                    yukon_gantt_chart = {
                    init: function () {
                        var a = [
                        <?php foreach($showgrafik as $jeniskegiatan) : ?>
                        {
                        id: 5, name: "<?= $jeniskegiatan['namajenis_kegiatan']; ?>", series: [
                        <?php foreach($listkegiatan as $showlist) : ?>
                            <?php if($jeniskegiatan['jenis_kegiatan'] == $showlist['jenis_kegiatan']) : ?>
                            {
                                name: "<?=$showlist['nama_kegiatan'];?><span><?php echo date("m/d/Y", strtotime($showlist['tgl_mulai_kegiatan']) ); ?> - <?php echo date("m/d/Y", strtotime($showlist['tgl_rencanaselesai']) ); ?></span>",
                                start: new Date("<?php echo date("m/d/Y", strtotime($showlist['tgl_mulai_kegiatan']) ); ?>"), end: new Date("<?php echo date("m/d/Y", strtotime($showlist['tgl_rencanaselesai']) ); ?>"), color: "<?php if($showlist['id_status_kegiatan']=="1"){ echo "#dc3545";} elseif($showlist['id_status_kegiatan']=="2"){ echo "#007bff";} else{ echo "#28a745";} ?>"
                            },<?php endif; ?>
                            <?php endforeach; ?>]
                        },
                        <?php endforeach;?>
                        ]; $("#ganttChart").ganttView({
                        data: a, behavior: {
                            onClick: function (a) { a = "You clicked on an event: { start: " + a.start.toString("M/d/yyyy") + ", end: " + a.end.toString("M/d/yyyy") + " }"; console.log(a) },
                            onResize: function (a) { a = "You resized an event: { start: " + a.start.toString("M/d/yyyy") + ", end: " + a.end.toString("M/d/yyyy") + " }"; console.log(a) }, onDrag: function (a) { a = "You dragged an event: { start: " + a.start.toString("M/d/yyyy") + ", end: " + a.end.toString("M/d/yyyy") + " }"; console.log(a) }
                        }
                        })
                    }
                    };
                    
                    yukon_gantt_chart.init();

                    
                })
            </script>
        
        <!-- style switcher -->
        <div id="style_switcher">
            <a class="switcher_toggle"><i class="icon_cog"></i></a>
            <div class="style_items">
                <div class="heading_b"><span class="heading_text">Top Bar Color</span></div>
                <ul class="clearfix" id="topBar_style_switch">
                    <li class="sw_tb_style_0 style_active" title=""><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_1" title="topBar_style_1"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_2" title="topBar_style_2"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_3" title="topBar_style_3"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_4" title="topBar_style_4"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_5" title="topBar_style_5"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_6" title="topBar_style_6"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_7" title="topBar_style_7"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_8" title="topBar_style_8"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_9" title="topBar_style_9"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_10" title="topBar_style_10"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_11" title="topBar_style_11"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_12" title="topBar_style_12"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_13" title="topBar_style_13"><span class="icon_check_alt2"></span></li>
                    <li class="sw_tb_style_14" title="topBar_style_14"><span class="icon_check_alt2"></span></li>
                </ul>
            </div>
            <hr/>
            <div class="clearfix hidden-sm hidden-md hidden-xs sepH_b">
                <label>Fixed layout</label>
                <div class="pull-right"><input type="checkbox" id="fixed_layout_switch" class="js-switch mini-switch"></div>
            </div>
            <div class="style_items hidden-sm hidden-md hidden-xs" id="fixed_layout_bg_switch">
                <hr/>
                <div class="heading_b"><span class="heading_text">Background</span></div>
                <ul class="clearfix">
                    <li class="sw_bg_0" title="bg_0"></li>
                    <li class="sw_bg_1" title="bg_1"></li>
                    <li class="sw_bg_2" title="bg_2"></li>
                    <li class="sw_bg_3" title="bg_3"></li>
                    <li class="sw_bg_4" title="bg_4"></li>
                    <li class="sw_bg_5" title="bg_5"></li>
                    <li class="sw_bg_6" title="bg_6"></li>
                    <li class="sw_bg_7" title="bg_7"></li>
                </ul>
                <hr/>
            </div>
            <div class="clearfix sepH_b">
                <label>Top Menu</label>
                <div class="pull-right"><input type="checkbox" id="top_menu_switch" class="js-switch mini-switch"></div>
            </div>
            <div class="clearfix sepH_b">
                <label>Hide Breadcrumbs</label>
                <div class="pull-right"><input type="checkbox" id="breadcrumbs_hide" class="js-switch mini-switch"></div>
            </div>
            <div class="text-center sepH_a">
                <button data-toggle="modal" data-target="#showCSSModal" id="showCSS" class="btn btn-default btn-xs btn-outline" type="button">Show CSS</button>
            </div>
        </div>
        <div class="modal fade" id="showCSSModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">CSS Classes</h4>
                    </div>
                    <div class="modal-body">
                        <pre id="showCSSPre"></pre>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
