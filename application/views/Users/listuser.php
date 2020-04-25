<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2><?= $judul ?></h2>
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
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Activation_code</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Provinsi</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($listusers as $showlistusers) : ?>
                                        <tr>
                                            <td><?= $showlistusers['id'] ?></td>
                                            <td><?= $showlistusers['username'] ?></td>
                                            <td><?= $showlistusers['email'] ?></td>
                                            <td><?= $showlistusers['activation_code'] ?></td>
                                            <td><?= $showlistusers['active'] ?></td>
                                            <td><?= $showlistusers['first_name'] ?></td>
                                            <td><?= $showlistusers['last_name'] ?></td>
                                            <td><?= $showlistusers['company'] ?></td>
                                            <td><?= $showlistusers['phone'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" title="Edit"><span class="sr-only">Edit</span> Edit <i class="fa fa-edit (alias)"></i></button>
                                                <button type="button" class="btn btn-danger" title="Delete"><span class="sr-only">Delete</span> Delete <i class="fa fa-trash-o"></i></button>
                                                
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Provinsi</th>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Provinsi</th>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Provinsi</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            <!-- </div>//test -->
                
        </div>
    </div>