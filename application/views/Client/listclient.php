<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>List Client</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Table</li>
                            <li class="breadcrumb-item active">List Client</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#largeModal"><i class="fa fa-plus-square"></i> <span>Tambah</span></button>
                            <!-- Large Size -->
                            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="title" id="largeModalLabel">Tambah Client</h4>
                                        </div>
                                        <div class="modal-body">
                                        <!-- body modals -->
                                        <form action="<?php echo base_url()?>client/addclient" id="basic-form" method="post" novalidate="">
                                            <div class="form-group">
                                                <label>Nama Perusahaan</label>
                                                <input name="nama_perusahaan" type="text" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Penanggung Jawab</label>
                                                <input name="kontak_client" type="text" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Telepon Client</label>
                                                <input name="telepon_client" type="number" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email_client" type="email" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Provinsi</label>
                                                <select name="provinsi_client" class="custom-select" id="inputGroupSelect04">
                                                    <?php foreach ($provinsi as $list_provinsi) :?>
                                                        <option value="<?= $list_provinsi['id_provinsi'] ?>"><?= $list_provinsi['nama_provinsi'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat Lengkap</label>
                                                <textarea name="alamat_client" class="form-control" rows="5" cols="30" required=""></textarea>
                                            </div>
                                            
                                        <!-- body modals -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SAVE</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>     
                            <!-- Large Size -->                       
                        </div>
                        <div class="body">
						              <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                  <thead>
                                      <tr>
                                          <th>Name Perusahaan</th>
                                          <th>kontak utama</th>
                                          <th>Telepon</th>
                                          <th>Email</th>
                                          <th>Provinsi</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php foreach ($listclient as $showclient) :?>
                                      <tr>
                                          <td><?= $showclient['nama_perusahaan'] ?></td>
                                          <td><?= $showclient['kontak_client'] ?></td>
                                          <td><?= $showclient['telepon_client'] ?></td>
                                          <td><?= $showclient['email_client'] ?></td>
                                          <td><?= $showclient['nama_provinsi'] ?></td>
                                          <td><button type="button" class="btn btn-danger" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button></td>
                                      </tr>
                                      <?php endforeach;?>
                                  </tbody>
                              </table>
							          </div>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>
    </div>