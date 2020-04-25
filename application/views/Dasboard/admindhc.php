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
                                            <h6>Users</h6>
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

          
            

          

            
            
        </div>
    </div>