<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>Projects List</h2><br>
                        <button data-toggle="modal" data-target="#largeModal" class="btn btn-primary">Tambah Proyek</button>
                            <!-- Large Size -->
                            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="title" id="largeModalLabel">Tambah Proyek</h4>
                                        </div>
                                        <div class="modal-body"> 
                                        <!-- body modals -->
                                        <form action="<?php echo base_url()?>proyek/addproyek" id="basic-form" method="post" novalidate="">
                                            <div class="form-group">
                                                <label>Nama Proyek</label>
                                                <input name="nama_proyek" type="text" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Unit</label>
                                                <select name="unit_id" class="custom-select" id="inputGroupSelect04">
                                                    <?php foreach ($listunit as $tampilsemuaunit) :?>
                                                        <option value="<?= $tampilsemuaunit['unit_id'] ?>"><?= $tampilsemuaunit['unit_name'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Client</label>
                                                <select name="id_client" class="custom-select" id="inputGroupSelect04">
                                                    <?php foreach ($listclient as $tampilsemuaclient) :?>
                                                        <option value="<?= $tampilsemuaclient['id_client'] ?>"><?= $tampilsemuaclient['kontak_client'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Nilai Proyek</label>
                                                <input name="nilai_proyek" type="number" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Status Proyek</label>
                                                <br>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="status_proyek" value="P" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                                                    <span><i></i>Progress</span>
                                                </label>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="status_proyek" value="T" data-parsley-multiple="gender">
                                                    <span><i></i>Selesai</span>
                                                </label>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="status_proyek" value="F" data-parsley-multiple="gender">
                                                    <span><i></i>Gagal</span>
                                                </label>
                                                <p id="error-radio"></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea name="deskripsi_proyek" class="form-control" rows="5" cols="30" required=""></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Mulai</label>
                                                <input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tgl_mulai" data-date-autoclose="true" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Perencanaan Selesai</label>
                                                <input data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tgl_perencanaan_selesai" data-date-autoclose="true" class="form-control" required>
                                            </div>
                                        
                                        <!-- body modals -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                        </div>
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Large Size -->
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Projects List</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">

                
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
                            <!-- flash data -->
                        
                    <div class="card">
                        <div class="body project_report">
                            <div class="table-responsive">
                                <table class="table m-b-0 table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Status</th>
                                            <th>Project</th>
                                            <th>Progress</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listproyek as $showlist) :?>
                                        <tr>
                                            <td>
                                              <?php if($showlist['status_proyek']=="T") :?>
                                                <span class="badge badge-info">Selesai</span>
                                              <?php elseif($showlist['status_proyek']=="P") :?>
                                                <span class="badge badge-success">Progress</span>
                                              <?php else : ?>
                                                 <span class="badge badge-warning">Gagal</span>
                                              <?php endif;?>
                                            </td>
                                            <td class="project-title">
                                                <h6><a href="<?= base_url(); ?>proyek/detail/<?= $showlist['id_proyek']?>"><?= $showlist['nama_proyek']?></a></h6>
                                                <small>Created <?= $showlist['created_at']?></small>
                                            </td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: <?php
                                                $idproyek = $showlist['id_proyek'];
                                                $sql="SELECT SUM(bobot_kegiatan) as persentaseselesai FROM kegiatan WHERE id_proyek='$idproyek' AND id_status_kegiatan=3";
                                                $result = $this->db->query($sql)->row();
                                                echo $result->persentaseselesai;?>%;"></div>                                                
                                                </div>
                                                <small> <?php
                                                $idproyek = $showlist['id_proyek'];
                                                $sql="SELECT SUM(bobot_kegiatan) as persentaseselesai FROM kegiatan WHERE id_proyek='$idproyek' AND id_status_kegiatan=3";
                                                $result = $this->db->query($sql)->row();
                                                echo "Completion with:".$result->persentaseselesai."%"
                                                ?></small>
                                            </td>
                                            
                                            <td class="project-actions">
                                                <a href="<?= base_url(); ?>proyek/detail/<?= $showlist['id_proyek']?>" class="btn btn-outline-secondary"><i class="icon-eye"></i></a>
                                                <a href="<?= base_url(); ?>proyek/ganttchart/<?= $showlist['id_proyek']?>" target="_blank" class="btn btn-outline-secondary"><i class="icon-bar-chart"></i></a>
                                                <a href="<?= base_url(); ?>proyek/laporan/<?= $showlist['id_proyek']?>" target="_blank" class="btn btn-outline-secondary"><i class="fa fa-file-pdf-o"></i></a>
                                                <button data-toggle="modal" data-target="#editModal-<?= $showlist['id_proyek']?>" class="btn btn-primary"><i class="icon-pencil"></i></button>
                                                <button data-toggle="modal" data-target="#hapus-<?= $showlist['id_proyek']?>" class="btn btn-primary"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr> 
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            
            
                            <!-- Large Size -->
                            <?php foreach ($listproyek as $showlist) :?>
                            <div class="modal fade" id="editModal-<?= $showlist['id_proyek']?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="title" id="largeModalLabel">Edit Proyek</h4>
                                        </div>
                                        <div class="modal-body"> 
                                        <!-- body modals -->
                                        <form action="<?php echo base_url()?>proyek/editproyek/<?= $showlist['id_proyek']?>" id="basic-form" method="post" novalidate="">
                                            <div class="form-group">
                                                <label>Nama Proyek</label>
                                                <input name="nama_proyek" type="text" value="<?= $showlist['nama_proyek']?>" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Unit</label>
                                                <select name="unit_id" class="custom-select" id="inputGroupSelect04">
                                                    <?php foreach ($listunit as $tampilsemuaunit) :?>
                                                        <?php if($showlist['unit_id']==$tampilsemuaunit['unit_id']) : ?>
                                                            <option value="<?= $tampilsemuaunit['unit_id'] ?>" selected><?= $tampilsemuaunit['unit_name'] ?></option>
                                                        <?php else :?>
                                                            <option value="<?= $tampilsemuaunit['unit_id'] ?>"><?= $tampilsemuaunit['unit_name'] ?></option>
                                                        <?php endif ;?>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Client</label>
                                                <select name="id_client" class="custom-select" id="inputGroupSelect04">
                                                    <?php foreach ($listclient as $tampilsemuaclient) :?>
                                                        <?php if($showlist['id_client']==$tampilsemuaclient['id_client']) : ?>
                                                            <option value="<?= $tampilsemuaclient['id_client'] ?>" selected><?= $tampilsemuaclient['kontak_client'] ?></option>
                                                        <?php else :?>
                                                            <option value="<?= $tampilsemuaclient['id_client'] ?>"><?= $tampilsemuaclient['kontak_client'] ?></option>
                                                        <?php endif ;?>

                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Nilai Proyek</label>
                                                <input name="nilai_proyek" value="<?= $showlist['nilai_proyek']?>" type="number" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Status Proyek</label>
                                                <br>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="status_proyek" value="P" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="gender" <?php if($showlist['status_proyek']=="P"){ echo "checked";} ?>>
                                                    <span><i></i>Progress</span>
                                                </label>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="status_proyek" value="T" data-parsley-multiple="gender" <?php if($showlist['status_proyek']=="T"){ echo "checked";} ?>>
                                                    <span><i></i>Selesai</span>
                                                </label>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="status_proyek" value="F" data-parsley-multiple="gender" <?php if($showlist['status_proyek']=="F"){ echo "checked";} ?>>
                                                    <span><i></i>Gagal</span>
                                                </label>
                                                <p id="error-radio"></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea name="deskripsi_proyek" class="form-control" rows="5" cols="30" required=""><?= $showlist['deskripsi_proyek']?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Mulai</label>
                                                <input data-provide="datepicker" value="<?= $showlist['tgl_mulai']?>" data-date-format="yyyy-mm-dd" name="tgl_mulai" data-date-autoclose="true" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Perencanaan Selesai</label>
                                                <input data-provide="datepicker" value="<?= $showlist['tgl_perencanaan_selesai']?>" data-date-format="yyyy-mm-dd" name="tgl_perencanaan_selesai" data-date-autoclose="true" class="form-control" required>
                                            </div>
                                        
                                        <!-- body modals -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                        </div>
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <!-- Large Size -->
                    </div>  
            <!-- modal edit -->

                <!-- Default Size -->
                    <?php foreach ($listproyek as $showlist) :?>
                    <div class="modal fade" id="hapus-<?= $showlist['id_proyek']?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="title" id="defaultModalLabel">Hapus!</h4>
                                </div>
                                <div class="modal-body">
                                <form action="<?php echo base_url()?>proyek/hapusproyek/<?= $showlist['id_proyek']?>" method="post">
                                    Apakah Anda Yakin ingin menghapus <?= $showlist['nama_proyek']?>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                <!-- Default Size -->
            
        </div>
    </div>