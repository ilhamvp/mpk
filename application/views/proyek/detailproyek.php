<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>Tabs</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">UI Elements</li>
                            <li class="breadcrumb-item active">Tabs</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h1><i class="fa fa-th-large" title="Open"></i> <?= $detailproyek->nama_proyek; ?></h1>
                            <h2><?= $detailproyek->unit_name; ?></h2>
                        </div>
                        <div class="col-md-12">
                             <!-- flash data -->
                             <?php if($this->session->flashdata('flashdataberhasil') ) : ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="fa fa-check-circle"></i> <?= $this->session->flashdata('flashdataberhasil'); ?>
                                </div>
                             <?php endif; ?>

                             <?php if($this->session->flashdata('flashdatawarning') ) : ?>
                             <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <i class="fa fa-warning"></i> <?= $this->session->flashdata('flashdatawarning'); ?>
                            </div>
                            <?php endif; ?>

                            <?php if($this->session->flashdata('flashdatagagal') ) : ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="fa fa-times-circle"></i> <?= $this->session->flashdata('flashdatagagal'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#overview"><i class="fa fa-home"></i> Overview</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Perencanaan"><i class="fa fa-user"></i> Perencanaan</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Realisasi"><i class="fa fa-vcard"></i> Realisasi</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#lampiran"><i class="fa fa-vcard"></i> Lampiran</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Calender"><i class="fa fa-vcard"></i> Calender</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#withicon2"><i class="fa fa-vcard"></i> Taskboard</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="overview">
                                    <h6>Progress bar </h6>
                                    <div id="progress-striped-active" class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" data-transitiongoal="<?= $persentasiselesai->persentase ?>"></div>
                                    </div>
                                    <p>Deskripsi Proyek : <?= $detailproyek->deskripsi_proyek; ?></p>
                                   <!-- batas awal -->
                                   <div class="row clearfix">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="card bg-light">
                                                <div class="card-header">Ring progress bar</div>
                                                <div class="card-body text-center">
                                                    <input type="text" class="knob" value="<?= $persentasiselesai->persentase ?>" data-width="125" data-height="125" data-thickness="0.25" data-fgColor="#cb8fe7" readonly>
                                                    <p class="text-muted m-b-0">Progress</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-md-12">
                                                <div class="card bg-light">
                                                    <div class="card-header">Log Activity</div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover m-b-0">
                                                                <tbody>
                                                                    <?php foreach($logkegiatan as $listlog) : ?>
                                                                    <tr>
                                                                        <td>
                                                                        <img src="<?= base_url();?>assets/fotoprofile/<?= $listlog['foto'] ?>" width="50px" height="50px" class="rounded avatar" alt="">
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="margin-0"><?= $listlog['first_name'] ?> <?= $listlog['last_name'] ?></h6>
                                                                            <span>Merubah status kegiatan <strong><?= $listlog['nama_kegiatan'] ?></strong> dari <?= $listlog['status_kegiatan'] ?> ke <?= $listlog['status_kegiatan_sekarang'] ?> </span>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <div class="text-success">
                                                                            <span class="badge badge-success"><?= $listlog['aksi'] ?></span>
                                                                            </div>
                                                                            <div class="text-muted"><?= $listlog['waktu_perubahan'] ?></div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php endforeach; ?>
                                                                
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                        </div>

                                     
                                        <!-- akhir -->

                                    </div>
                                    <!-- akhir home -->
                                </div>
                                <div class="tab-pane" id="Perencanaan">
                                    <h6>Formulir Perencanaan Proyek</h6>
                                    
                                    <button data-toggle="modal" data-target="#largeModal" class="btn btn-primary">Tambah Kegiatan</button>
                                     <!-- modals large -->
                                        <!-- Large Size -->
                                        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="title" id="largeModalLabel">Tambah Kegiatan</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- batas awal -->
                                                        <div class="table-responsive">
                                                        <form action="<?php echo base_url()?>proyek/addperencanaan/<?= $this->uri->segment(3);?>" method="post">
                                                            <table class="table center-aligned-table" id="dynamic_field">
                                                                <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Name Kegiatan</th>
                                                                    <th>Jenis Kegiatan</th>
                                                                    <th>Deskripsi</th>
                                                                    <th>Bobot(%)</th>
                                                                    <th>Tgl Mulai</th>
                                                                    <th>Rencana Selesai</th>
                                                                    <th>
                                                                        <button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i> ADD</button>
                                                                    </th>
                                                                    
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr id="row1">
                                                                        <td>1</td>
                                                                        <td><input type="text" class="form-control" name="kegiatan[]" placeholder="Nama Kegiatan" required></td>
                                                                        <td><select class="custom-select" id="inputGroupSelect04" name="jenis_kegiatan[]">
                                                                            <?php foreach($jenis_kegiatan as $listjeniskegiatan): ?>
                                                                             <option value="<?= $listjeniskegiatan['idjenis_kegiatan'] ?>"><?= $listjeniskegiatan['namajenis_kegiatan'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select></td>
                                                                        <td><input type="text" class="form-control" name="deskripsi[]" placeholder="Deskripsi" ></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control prc" name="bobot[]" placeholder="Bobot (%)" required></div></td>
                                                                        <td><input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tanggalmulai[]" data-date-autoclose="true" class="form-control" required></td>
                                                                        <td><input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tanggalrencanaselesai[]" data-date-autoclose="true" class="form-control" required></td>
                                                                        <td><button type="button" name="remove" id="1" class="btn btn-danger btn_remove"><i class="icon-trash"></i></button></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            
                                                        </div>
                                                        <script>  
                                                            $(document).ready(function(){  
                                                                var i=1;  
                                                                $('#add').click(function(){  
                                                                    i++;  
                                                                    $('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td><td><input type="text" name="kegiatan[]" placeholder="Nama Kegiatan" class="form-control" required></td><td><select class="custom-select" id="inputGroupSelect04" name="jenis_kegiatan[]"><?php foreach($jenis_kegiatan as $listjeniskegiatan): ?><option value="<?= $listjeniskegiatan['idjenis_kegiatan'] ?>"><?= $listjeniskegiatan['namajenis_kegiatan'] ?></option><?php endforeach; ?></select></td><td><input type="text" name="deskripsi[]" placeholder="Deskripsi" class="form-control" /></td><td><input type="number" name="bobot[]" placeholder="Bobot (%)" class="form-control" required></td><td><input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tanggalmulai[]" data-date-autoclose="true" class="form-control" required></td><td><input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tanggalrencanaselesai[]" data-date-autoclose="true" class="form-control" required></td><<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="icon-trash"></i></button></td><br>');  
                                                                });  
                                                                $(document).on('click', '.btn_remove', function(){  
                                                                    var button_id = $(this).attr("id");   
                                                                    $('#row'+button_id+'').remove();  
                                                                });
                                                            });  
                                                        </script>
                                                        
                    
                                                        <!-- batas akhir -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" id="btSubmitmodal" class="btn btn-primary">SAVE CHANGES</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                 </form>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- modals large update perencanaan kegiatan-->
                                                        <div class="table-responsive">
                                                            <form action="<?php echo base_url()?>proyek/updatekegiatan/<?= $this->uri->segment(3);?>" method="post">
                                                                <table class="table center-aligned-table" id="dynamic_field">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Name Kegiatan</th>
                                                                        <th>Jenis Kegiatan</th>
                                                                        <th>Deskripsi</th>
                                                                        <th>Bobot(%)</th>
                                                                        <th>Tanggal Mulai</th>
                                                                        <th>Tanggal Rencana Selesai</th>
                                                                        <th>Aksi </th>
                                                                        
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php 
                                                                    $no = 1;
                                                                    foreach ($kegiatan as $listkegiatan) :?>
                                                                    <tr id="row<?=$listkegiatan['id_kegiatan']?>">
                                                                        <td><?= $no++?> <input type="hidden" class="form-control" name="id_kegiatan[]" value="<?=$listkegiatan['id_kegiatan']?>"></td>
                                                                        <td><input type="text" class="form-control" name="kegiatan[]" value="<?=$listkegiatan['nama_kegiatan']?>" placeholder="Nama Kegiatan" required></td>
                                                                        <td><select class="custom-select" id="inputGroupSelect04" name="jenis_kegiatan[]">
                                                                            <?php foreach($jenis_kegiatan as $listjeniskegiatan): ?>
                                                                                <?php if($listkegiatan['jenis_kegiatan']==$listjeniskegiatan['idjenis_kegiatan']) : ?>
                                                                                    <option value="<?= $listjeniskegiatan['idjenis_kegiatan'] ?>" selected><?= $listjeniskegiatan['namajenis_kegiatan'] ?></option>
                                                                                <?php else : ?>
                                                                                    <option value="<?= $listjeniskegiatan['idjenis_kegiatan'] ?>"><?= $listjeniskegiatan['namajenis_kegiatan'] ?></option>
                                                                                <?php endif;?>
                                                                            <?php endforeach; ?>
                                                                        </select></td>
                                                                        <td><input type="text" class="form-control" name="deskripsi[]" value="<?=$listkegiatan['deskripsi_kegiatan']?>" placeholder="Deskripsi" ></td>
                                                                        <td><div class="form-group"><input type="number" class="form-control prc" name="bobot[]" value="<?=$listkegiatan['bobot_kegiatan']?>" placeholder="Bobot (%)" required></div></td>
                                                                        <td><input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tanggalmulai[]" value="<?=$listkegiatan['tgl_mulai_kegiatan']?>" data-date-autoclose="true" class="form-control" required></td>
                                                                        <td><input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tanggalrencanaselesai[]" value="<?=$listkegiatan['tgl_rencanaselesai']?>" data-date-autoclose="true" class="form-control" required></td>
                                                                        <td>
                                                                            <a href="<?= base_url()?>proyek/hapuskegiatan/<?=$listkegiatan['id_kegiatan']?>" class="btn btn-danger" onclick="return confirm('are you sure?')"> <i class="icon-trash"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php endforeach;?>
                                                                    </tbody>
                                                                </table>
                                                        
                                                                <button class="btn btn-info" id="btSubmit" type="submit"><i class="ace-icon fa fa-check bigger-110"></i>Simpan <output id="result"></output></button>
                                                                <!-- perencanaan -->
                                                                <script>
                                                                    $('.form-group').on('input','.prc',function(){
                                                                        var totalSum = 0;
                                                                        $('.form-group .prc').each(function(){
                                                                            var inputVal = $(this).val();
                                                                            if($.isNumeric(inputVal)){
                                                                                totalSum += parseFloat(inputVal);
                                                                            }
                                                                        });
                                                                        $('#result').val(totalSum);
                                                                        var bt = document.getElementById('btSubmit');
                                                                        var bt2 = document.getElementById('btSubmitmodal');
                                                                        if (totalSum <= '100') {
                                                                            bt.disabled = false;
                                                                            bt2.disabled = false;
                                                                        }
                                                                        else {
                                                                            bt.disabled = true;
                                                                            bt2.disabled = true;
                                                                        }
                                                                    });
                                                                </script>
                                                            </form>
                                                         </div>
                                    <!-- disini -->
                                </div>
                                <div class="tab-pane" id="Realisasi">
                                    <h6>Realisasi Kegiatan</h6>
                                    <!-- batas awal -->
                                    
                                    <div class="table-responsive">
                                        <form action="<?php echo base_url()?>proyek/updaterealisasi/<?= $this->uri->segment(3);?>" method="post">
                                        <table class="table center-aligned-table">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name Kegiatan</th>
                                                <th>Jenis Kegiatan</th>
                                                <th>Deskripsi</th>
                                                <th>Bobot(%)</th>
                                                <th>Tanggal mulai</th>
                                                <th>Tanggal Rencana Selesai</th>
                                                <th>Status</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Update</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($kegiatan as $listkegiatan) :?>
                                                <tr id="row<?=$listkegiatan['id_kegiatan']?>">
                                                    <td><?= $no++?> <input type="hidden" class="form-control" name="id_kegiatan[]" value="<?=$listkegiatan['id_kegiatan']?>"></td>
                                                    <td><input type="text" class="form-control" name="kegiatan[]" value="<?=$listkegiatan['nama_kegiatan']?>" placeholder="Nama Kegiatan" readonly></td>
                                                    <td><select class="custom-select" id="inputGroupSelect04" name="jenis_kegiatan">
                                                                            <?php foreach($jenis_kegiatan as $listjeniskegiatan): ?>
                                                                                <?php if($listkegiatan['jenis_kegiatan']==$listjeniskegiatan['idjenis_kegiatan']) : ?>
                                                                                    <option value="<?= $listjeniskegiatan['idjenis_kegiatan'] ?>" selected><?= $listjeniskegiatan['namajenis_kegiatan'] ?></option>
                                                                                <?php else : ?>
                                                                                    <option value="<?= $listjeniskegiatan['idjenis_kegiatan'] ?>" disabled><?= $listjeniskegiatan['namajenis_kegiatan'] ?></option>
                                                                                <?php endif;?>
                                                                            <?php endforeach; ?>
                                                                        </select></td>
                                                    <td><input type="text" class="form-control" name="deskripsi[]" value="<?=$listkegiatan['deskripsi_kegiatan']?>" placeholder="Deskripsi" readonly></td>
                                                    <td><div class="form-group"><input type="number" class="form-control rsi" name="bobot[]" value="<?=$listkegiatan['bobot_kegiatan']?>" placeholder="Bobot (%)" readonly></div></td>
                                                    <td><input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tgl_mulai_kegiatan[]" value="<?=$listkegiatan['tgl_mulai_kegiatan']?>" data-date-autoclose="true" class="form-control" readonly></td>
                                                    <td><input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tanggal[]" value="<?=$listkegiatan['tgl_rencanaselesai']?>" data-date-autoclose="true" class="form-control" readonly></td>
                                                    <td><select class="custom-select" name="status_kegiatan[]" id="inputGroupSelect04">
                                                            <?php foreach($statuskegiatan as $liststatuskegiatan) : ?>
                                                                <?php if($liststatuskegiatan['id_status']==$listkegiatan['id_status_kegiatan']) : ?>
                                                                     <option value="<?= $liststatuskegiatan['id_status'] ?>" selected><?= $liststatuskegiatan['nama_status'] ?></option>
                                                                 <?php else : ?>
                                                                     <option value="<?= $liststatuskegiatan['id_status'] ?>"><?= $liststatuskegiatan['nama_status'] ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach;?>
                                                        </select></td>
                                                    <td><input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tgl_selesai_kegiatan[]" value="<?=$listkegiatan['tgl_selesai_kegiatan']?>" data-date-autoclose="true" class="form-control" required></td>
                                                    <td><input type="hidden" class="form-control" name="idkegiatanpush" value="<?=$listkegiatan['id_kegiatan']?>"></td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-info" type="submit" id="btRealisasit"><i class="ace-icon fa fa-check bigger-110"></i>Simpan <output id="resultrealisasi"></output></button>
                                        </form>
                                    </div>
                                                                <!-- realisasi -->
                                                                <script>
                                                                    $('.form-group').on('input','.rsi',function(){
                                                                        var totalSum = 0;
                                                                        $('.form-group .rsi').each(function(){
                                                                            var inputVal = $(this).val();
                                                                            if($.isNumeric(inputVal)){
                                                                                totalSum += parseFloat(inputVal);
                                                                            }
                                                                        });
                                                                        $('#resultrealisasi').val(totalSum);
                                                                        var bt = document.getElementById('btRealisasit');
                                                                        if (totalSum <= '100') {
                                                                            bt.disabled = false;
                                                                        }
                                                                        else {
                                                                            bt.disabled = true;
                                                                        }
                                                                    });
                                                                </script>
                                    <!-- batas akhir -->
                                </div>
                                <div class="tab-pane" id="lampiran">
                                    <h6>Lampiran Berkas :</h6>
                                    <p>Format yang didukung : pdf atau docx</p>
                                   
                                    <div class="card">
                                        <div class="header">
                                            <button data-toggle="modal" data-target="#defaultModal" class="btn btn-primary">Add</button>

                                            <!-- Default Size Modals -->
                                            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="defaultModalLabel">Tambah Lampiran</h4>
                                                        </div>
                                                        <div class="modal-body"> 
                                                        
	
                                                         <form action="<?php echo base_url()?>proyek/diupload/<?= $this->uri->segment(3);?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="berkas" class="custom-file-input" id="inputGroupFile01" required>
                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi_lampiran" aria-label="With textarea"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Kegiatan</label>
                                                                    <select class="custom-select" name="id_kegiatan" id="inputGroupSelect04">
                                                                        <?php foreach($kegiatan as $listkegiatan) : ?>
                                                                            <option value="<?= $listkegiatan['id_kegiatan'] ?>"><?= $listkegiatan['nama_kegiatan'] ?></option>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jenis Lampiran</label>
                                                                    <select class="custom-select" name="id_jenislampiran" id="inputGroupSelect04">
                                                                        <?php foreach($jenislampiran as $listjenislampiran) : ?>
                                                                            <option value="<?= $listjenislampiran['id_lampiran'] ?>"><?= $listjenislampiran['jenis_lampiran'] ?></option>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="sumber" class="btn btn-primary">SAVE CHANGES</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- End Default Size Modals -->

                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table center-aligned-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Id Lampiran</th>
                                                        <th>Nama Lampiran</th>
                                                        <th>Deskripsi Lampiran</th>
                                                        <th>Jenis Lampiran</th>
                                                        <th>Kegiatan</th>
                                                        <th>Insert by</th>
                                                        <th>Date Insert</th>
                                                        <th>Update by</th>
                                                        <th>Date Update</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($listlampiran as $listlampiran ) : ?>
                                                    <tr>
                                                        <td><?= $listlampiran['id_lampiran'] ?></td>
                                                        <td><?= $listlampiran['nama_lampiran'] ?> <label class="badge"> Size : <?= $listlampiran['ukuran_lampiran'] ?> KB</label></td>
                                                        <td><?= $listlampiran['deskripsi_lampiran'] ?></td>
                                                        <td><?= $listlampiran['jenis_lampiran'] ?></td>
                                                        <td><?= $listlampiran['nama_kegiatan'] ?></td>
                                                        <td><?= $listlampiran['insert_by'] ?></td>
                                                        <td><label class="badge"><?= $listlampiran['insert_at'] ?></label></td>
                                                        <td><?= $listlampiran['update_by'] ?></td>
                                                        <td><label class="badge"><?= $listlampiran['update_at'] ?></label></td>
                                                        <td><a href="<?= base_url(); ?>assets/lampiran/<?= $listlampiran['nama_lampiran'] ?>" target="_blank" class="btn btn-success btn-sm">View</a></td>
                                                        <td><a href="<?= base_url();?>proyek/deletelampiran/<?= $listlampiran['id_lampiran'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="icon-trash"></i></a></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- batas AKHIR LIST   -->
                                </div>
                                <div class="tab-pane" id="withicon2">
                                        <h6>TaskBoard</h6>
                                        
                                            <!-- batas taskboard-->
                                            <hr>
                                            <div class="row clearfix">

                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card open_task">
                                                        <div class="header">
                                                            <h2>Open</h2>
                                                            <ul class="header-dropdown">
                                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#addcontact"><i
                                                                            class="icon-plus"></i></a></li>
                                                                <li><a href="javascript:void(0);" data-toggle="cardloading"
                                                                        data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                                                <li><a href="javascript:void(0);" class="full-screen"><i
                                                                            class="icon-size-fullscreen"></i></a></li>
                                                                <li class="dropdown">
                                                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                                                        role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                                    <ul class="dropdown-menu dropdown-menu-right animated bounceIn">
                                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="body taskboard">
                                                            <div class="dd" id="nestable" data-plugin="nestable">
                                                                <ol id="sortable1" class="dd-list">
                                                                    <li class="dd-item" data-id="997" data-index="1">
                                                                        <div class="dd-handle">
                                                                            <!-- <h5>test</h5>
                                                                            <p>p</p>
                                                                            <ul class="list-unstyled clearfix action">
                                                                                <li><a href="javascript:void(0);"><i class="fa fa-paperclip"></i>
                                                                                        1</a></li>
                                                                                <li><a href="javascript:void(0);"><i class="fa fa-dot-circle-o"></i>
                                                                                        UX</a></li>
                                                                            </ul> -->
                                                                        </div>
                                                                    </li>
                                                                    <?php foreach ($kegiatanberurut as $listkegiatan) :?>
                                                                    <?php if($listkegiatan['id_status_kegiatan'] == "1" ) : ?>
                                                                    <li class="dd-item" data-id="<?= $listkegiatan['id_kegiatan']; ?>" data-index="<?= $listkegiatan['id_status_kegiatan']; ?>">
                                                                        <div class="dd-handle bg-light">
                                                                            <h5><?= $listkegiatan['nama_kegiatan']; ?></h5>
                                                                            <p><?= $listkegiatan['deskripsi_kegiatan']; ?></p>
                                                                            
                                                                            <ul class="list-unstyled clearfix action">
                                                                                <li><a href="javascript:void(0);" class="comment"><i
                                                                                            class="fa fa-comment"></i> 5</a></li>
                                                                                <li><a href="javascript:void(0);" class="bug"><i
                                                                                            class="fa fa-dot-circle-o"></i> Bugs</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                <?php endif; ?> 
                                                                 <?php endforeach;?>
                                                                 <div class="dd-empty"></div>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card progress_task">
                                                        <div class="header">
                                                            <h2>In progress</h2>
                                                            <!-- <ul class="header-dropdown">
                                                                <li> <a href="javascript:void(0);" data-toggle="cardloading"
                                                                        data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                                                <li><a href="javascript:void(0);" class="full-screen"><i
                                                                            class="icon-size-fullscreen"></i></a></li>
                                                                <li class="dropdown">
                                                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                                                        role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                                    <ul class="dropdown-menu dropdown-menu-right animated bounceIn">
                                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul> -->
                                                        </div>
                                                        <div class="body taskboard">
                                                            <div class="dd" id="nestable2" data-plugin="nestable">
                                                                <ol id="sortable2" class="dd-list">


                                                                    <li class="dd-item" data-id="998" data-index="2">
                                                                        <div class="dd-handle">
                                                                            
                                                                        </div>
                                                                    </li>
                                                                <?php foreach ($kegiatanberurut as $listkegiatan) :?>
                                                                    <?php if($listkegiatan['id_status_kegiatan'] == "2" ) : ?>
                                                                    <li class="dd-item" data-id="<?= $listkegiatan['id_kegiatan']; ?>" data-index="<?= $listkegiatan['id_status_kegiatan']; ?>">
                                                                        <div class="dd-handle bg-light">
                                                                            <h5><?= $listkegiatan['nama_kegiatan']; ?></h5>
                                                                            <p><?= $listkegiatan['deskripsi_kegiatan']; ?></p>
                                                                            <ul class="list-unstyled clearfix action">
                                                                                <li><a href="javascript:void(0);"><i class="fa fa-paperclip"></i>
                                                                                        1</a></li>
                                                                                <li><a href="javascript:void(0);"><i class="fa fa-dot-circle-o"></i>
                                                                                        UX</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                        
                                                                    <?php endif; ?> 
                                                                 <?php endforeach;?>
                                                                 <div class="dd-empty"></div>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card completed_task">
                                                        <div class="header">
                                                            <h2>Completed</h2>
                                                            <ul class="header-dropdown">
                                                                <li> <a onClick="document.location.reload(true)" data-toggle="cardloading"
                                                                        data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                                                <li><a href="javascript:void(0);" class="full-screen"><i
                                                                            class="icon-size-fullscreen"></i></a></li>
                                                                <li class="dropdown">
                                                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                                                        role="button" aria-haspopup="true" aria-expanded="false"></a>
                                                                    <ul class="dropdown-menu dropdown-menu-right animated bounceIn">
                                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="body taskboard">
                                                            <div class="dd" id="nestable" data-plugin="nestable">
                                                                <ol class="dd-list">
                                                                    <li class="dd-item" data-id="999" data-index="3">
                                                                        <div class="dd-handle">
                                                                            
                                                                        </div>
                                                                    </li>
                                                                <?php foreach ($kegiatanberurut as $listkegiatan) :?>
                                                                    <?php if($listkegiatan['id_status_kegiatan'] == "3" ) : ?>
                                                                    <li class="dd-item" data-id="<?= $listkegiatan['id_kegiatan']; ?>" data-index="<?= $listkegiatan['id_status_kegiatan']; ?>">
                                                                        <div class="dd-handle bg-light">
                                                                            <h5><?= $listkegiatan['nama_kegiatan']; ?></h5>
                                                                            <p><?= $listkegiatan['deskripsi_kegiatan']; ?></p>
                                                                            
                                                                            <ul class="list-unstyled clearfix action">
                                                                                <li><a href="javascript:void(0);"><i class="fa fa-paperclip"></i>
                                                                                        1</a></li>
                                                                                <li><a href="javascript:void(0);" class="qa"><i
                                                                                            class="fa fa-dot-circle-o"></i> QA</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                   
                                                                    <?php endif; ?> 
                                                                 <?php endforeach;?>
                                                                 <div class="dd-empty"></div>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                </div>
                                                <!-- batas taskboard -->
                                </div>
                               
                                <div class="tab-pane" id="Calender">
                                        <h6>Calender Kegiatan</h6>
                                            <!-- awal -->
                                            <div class="row clearfix">
                                                <div class="col-lg-8">
                                                    <div class="card">
                                                        <div class="body">
                                                            <div id="calendar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    
                                                    <div class="card">
                                                        <div class="header">
                                                            <h2>List Kegiatan</h2>
                                                        </div>
                                                        <div class="body pt-0">
                                                            <ul class="list-group list-unstyled">
                                                            <?php foreach ($kegiatan as $listkegiatan) :?>
                                                                <li class="list-group-item"><?=$listkegiatan['nama_kegiatan']?> <span class="badge <?php 
                                                                    if($listkegiatan['id_status_kegiatan']=="1"){
                                                                        echo "badge-danger";
                                                                        } elseif($listkegiatan['id_status_kegiatan']=="2"){
                                                                            echo "badge-info";
                                                                            }else{echo "badge-success";} ?>"><?php 
                                                                            if($listkegiatan['id_status_kegiatan']=="1"){
                                                                                echo "Open";
                                                                                } elseif($listkegiatan['id_status_kegiatan']=="2"){
                                                                                    echo "Progress";
                                                                                    }else{echo "Finish";} ?></span>
                                                                </li>
                                                            <?php endforeach;?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <!-- akhir -->
                                            
                                </div>
                                


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   