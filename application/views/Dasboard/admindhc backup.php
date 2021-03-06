<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Dashboard</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                            <!-- flash data -->
                            <?php if($this->session->flashdata('flashdataberhasil') ) : ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="fa fa-check-circle"></i> <?= $this->session->flashdata('flashdataberhasil'); ?>
                                </div>
                             <?php endif; ?>

                <div class="col-12">
                    <div class="card top_report">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="fa fa-2x fa-bar-chart-o text-col-blue"></i>
                                        </div>
                                        <div class="number float-right text-right">
                                            <h6>Proyek</h6>
                                            <span class="font700"><?= $proyekselesai->proyekselesai?> of <?= $jumlahproyek->jumlahproyek?></span>
                                        </div>
                                    </div>
                                    <div class="progress progress-xs progress-transparent custom-color-blue mb-0 mt-3">
                                        <div class="progress-bar" data-transitiongoal="<?php echo $proyekselesai->proyekselesai/$jumlahproyek->jumlahproyek*100; ?>"></div>
                                    </div>
                                    <small class="text-muted"><?php echo $proyekselesai->proyekselesai/$jumlahproyek->jumlahproyek*100; ?>% proyek complete</small>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="fa fa-2x fa-bar-chart-o text-col-green"></i>
                                        </div>
                                        <div class="number float-right text-right">
                                            <h6>Client</h6>
                                            <span class="font700"><?= $clientselesai->clientselesai?> of <?= $jumlahclient->jumlahclient?></span>
                                        </div>
                                    </div>
                                    <div class="progress progress-xs progress-transparent custom-color-green mb-0 mt-3">
                                        <div class="progress-bar" data-transitiongoal="28"></div>
                                    </div>
                                    <small class="text-muted"><?php echo $clientselesai->clientselesai/$jumlahclient->jumlahclient*100 ?>% compared to last week</small>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="fa fa-2x fa-bar-chart-o text-col-red"></i>
                                        </div>
                                        <div class="number float-right text-right">
                                            <h6>Sektor Bisnis</h6>
                                            <span class="font700">4</span>
                                        </div>
                                    </div>
                                    <div class="progress progress-xs progress-transparent custom-color-red mb-0 mt-3">
                                        <div class="progress-bar" data-transitiongoal="41"></div>
                                    </div>
                                    <small class="text-muted">19% compared to last week</small>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="fa fa-2x fa-bar-chart-o text-col-yellow"></i>
                                        </div>
                                        <div class="number float-right text-right">
                                            <h6>Unit</h6>
                                            <span class="font700">21</span>
                                        </div>
                                    </div>
                                    <div class="progress progress-xs progress-transparent custom-color-yellow mb-0 mt-3">
                                        <div class="progress-bar" data-transitiongoal="75"></div>
                                    </div>
                                    <small class="text-muted">19% compared to last week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div id="Summary1" class="carousel slide" data-ride="carousel" data-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card bg-success text-center">
                                    <div class="body">
                                        <input type="text" class="knob2" value="82" data-width="69" data-height="69" data-thickness="0.07" data-bgColor="#2e9a4a" data-fgColor="#ffffff" readonly>
                                        <h4 class="font-22 text-col-white mt-4">
                                            <small class="font-12 d-block mb-1"><i class="fa fa-caret-up"></i> 15%</small>
                                            Mimba
                                            <span class="d-block font-13 mt-1">1 of 2</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card bg-warning text-center">
                                    <div class="body">
                                        <input type="text" class="knob2" value="67" data-width="69" data-height="69" data-thickness="0.07" data-bgColor="#e8a70c" data-fgColor="#ffffff" readonly>
                                        <h4 class="font-22 text-col-white mt-4">
                                            <small class="font-12 d-block mb-1"><i class="fa fa-caret-up"></i> $95 M</small>
                                            Migas
                                            <span class="d-block font-13 mt-1">1 of 2</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card text-center">
                        <div class="header">
                            <h2>Users</h2>
                        </div>
                        <div class="body pt-0">
                            <div class="row">
                                <div class="col-12 m-b-15">
                                    <h1><i class="icon-user"></i></h1>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <h4 class="font-22 text-col-green font-weight-bold">
                                        <small class="font-12 text-col-dark d-block m-b-10">Pimpinan</small>
                                        4
                                    </h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <h4 class="font-22 text-col-blue font-weight-bold">
                                        <small class="font-12 text-col-dark d-block m-b-10">Users</small>
                                        36
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               

                <div class="col-lg-7 col-md-6 col-sm-6">
                    <div class="card text-center">
                        <div class="header">
                            <h2>Progress</h2>
                        </div>
                        <div class="body pt-0">
                        <!-- body -->
                            <div class="form-group">
                                <label class="d-block">Open <span class="float-right">77%</span></label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Start <span class="float-right">50%</span></label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Finish <span class="float-right">23%</span></label>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                </div>
                            </div>
                            <!-- body -->
                        </div>
                    </div>
                </div>
                

            </div>

            

          

            
            
        </div>
    </div>