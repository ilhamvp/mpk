<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2><?= $namatabel; ?></h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item"><?= $breadcrumb; ?></li>
                            <li class="breadcrumb-item active"><?= $namatabel; ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">

                               <!-- flash data -->
                              <?php if($message!=null) : ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo $message ?>
                                </div>
                             <?php endif; ?>

                    <div class="card">
                        <div class="header">
                            <h2>Tambah User</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" action="<?php echo base_url()?>auth/create_user" method="post" accept-charset="utf-8" novalidate>
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" id="first_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" id="last_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Input</label>
                                    <input type="email" name="email" value="<?php echo set_value('email'); ?>" id="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="jenis_kelamin" value="P" required data-parsley-errors-container="#error-radio" <?php if(set_value('jenis_kelamin')=="P"){ echo "checked";}?>>
                                        <span><i></i>Perempuan</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="jenis_kelamin" value="L" <?php if(set_value('jenis_kelamin')=="L"){ echo "checked";}?>>
                                        <span><i></i>Laki-laki</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" value="<?php echo set_value('phone'); ?>" id="phone" class="form-control" required>
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
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="<?php echo set_value('password'); ?>" id="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirm">Confirm Password</label>
                                    <input type="password" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>" id="password_confirm" class="form-control" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>