<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2><?= $judul ?></h2><br>
												<a href="<?= base_url();?>auth/create_user" class="btn btn-primary">Tambah User</a>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Table</li>
                            <li class="breadcrumb-item active"><?= $breadcrumb ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">

														<!-- flash data -->
														<?php if($message!=null || $this->session->flashdata('flashdataberhasil')) : ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo $message ?> <?= $this->session->flashdata('flashdataberhasil'); ?>
                                </div>
                             <?php endif; ?>
                            <!-- flash data -->

                    <div class="card">
                        <div class="header">
                            <h2> <?= $namatabel ?> </h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                            <th>id</th>
																						<th>Foto</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Phone</th>
                                            <th>Status akun</th>
                                            <th>Unit</th>
                                            <th>Sektor</th>
																						<th>Level</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($users as $showlistusers) : ?>
                                        <tr>
                                            <td><?= $showlistusers->id ?></td>
																						<td><img src="<?= base_url();?>assets/fotoprofile/<?= $showlistusers->foto ?>" width="80px" height="80px" class="rounded avatar" alt=""></td>
                                            <td><?= $showlistusers->email; ?></td>
                                            <td><?= $showlistusers->first_name; ?> <?= $showlistusers->last_name; ?></td>
																						<td><?php if($showlistusers->jenis_kelamin=="P"){ echo "Perempuan";}else{ echo "Laki-laki";} ?></td>
                                            <td><?= $showlistusers->phone; ?></td>
                                            <td><a href="<?php if($showlistusers->active=="0"){ echo base_url()."auth/activate/".$showlistusers->id;} else{ echo base_url()."auth/deactivate/".$showlistusers->id;} ?>"><?php if($showlistusers->active=="0"){ echo "tidak aktif";} else{ echo "aktif";} ?></a></td>
                                            <td><?php $sql="SELECT * FROM users_groups, groups WHERE users_groups.group_id=groups.id AND user_id=$showlistusers->id";
																								$result = $this->db->query($sql)->result_array();
																								foreach($result as $list) { ?>
																									<span class="badge badge-info"><?php echo $list['name']; ?></span>
																								<?php } ?>
																								
                                                
																						</td>
																						<td><?php $sql="SELECT * FROM units WHERE unit_id=$showlistusers->unit_id";
																								$result = $this->db->query($sql)->row();
                                                echo $result->unit_name;?>
																						</td>
                                           <td><?php 
                                           $sql="SELECT * FROM units,sektor WHERE units.id_sektor=sektor.id_sektor";
                                           $result = $this->db->query($sql)->result_array();
                                           foreach($result as $namasektor){
                                               if($namasektor['unit_id'] == $showlistusers->unit_id){
                                                   echo $namasektor['nama_sektor'];
                                               }
                                           }

                                           ?></td>
                                            <td>
												<button data-toggle="modal" data-target="#foto-<?= $showlistusers->id ?>" class="btn btn-success"><span class="sr-only"></span> <i class="fa fa-image (alias)"></i></button>
                                                <a href="<?= base_url()?>auth/edit_user/<?= $showlistusers->id ?>" class="btn btn-primary" title="Edit"><span class="sr-only"></span> <i class="fa fa-edit (alias)"></i></a>
                                                <button type="button" class="btn btn-danger" title="Delete"><span class="sr-only"></span> <i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                       
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
            <!-- </div>//test -->

                                        <!-- Default Size Modals -->
                                        <?php foreach($users as $showlistusers) : ?>
                                        <div class="modal fade" id="foto-<?= $showlistusers->id ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="title" id="defaultModalLabel">Upload Foto</h4>
                                                        </div>
                                                        <div class="modal-body"> 
                                                        
	
                                                         <form action="<?php echo base_url()?>proyek/fotoprofile/<?= $showlistusers->id ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="berkas" class="custom-file-input" id="inputGroupFile01" required>
                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                </div>
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
                                            <?php endforeach;?>
                                            <!-- End Default Size Modals -->

					
                
        </div>
    </div>