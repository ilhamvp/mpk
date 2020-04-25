<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>Sektor Bisnis</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">sektor</li>
                            <li class="breadcrumb-item active">Sektor Bisnis</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                <?php foreach($sektor as $namasektor) : ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="m-t-0"><?= $namasektor['nama_sektor'] ?></h5>
                                   
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="m-b-0"><?php
                                                $id_sektor = $namasektor['id_sektor'];
                                                $semuaproyekbysektor ="SELECT COUNT(*) as selesai FROM proyek as a, units as b, sektor as c WHERE a.unit_id=b.unit_id AND b.id_sektor=c.id_sektor AND a.unit_id='$id_sektor'";
                                                $jumlahsemuaproyekbysektor = $this->db->query($semuaproyekbysektor)->row();
                                                $hasilsemuaproyek = $jumlahsemuaproyekbysektor->selesai;

                                                $id_sektor = $namasektor['id_sektor'];
                                                $semuaproyekbysektorselesai ="SELECT COUNT(*) as selesai FROM proyek as a, units as b, sektor as c WHERE a.unit_id=b.unit_id AND b.id_sektor=c.id_sektor AND a.unit_id='$id_sektor' AND status_proyek='T'";
                                                $jumlahsemuaproyekbysektorselesai = $this->db->query($semuaproyekbysektorselesai)->row();
                                                $hasilsemuaproyek2 = $jumlahsemuaproyekbysektorselesai->selesai;

                                                if($hasilsemuaproyek=="0"){ echo "0";}else{
                                                    $persentase = $hasilsemuaproyek2/$hasilsemuaproyek*100;
                                                    echo $persentase;
                                                }?>%</h2>
                                    <small class="info"></small>
                                </div>
                                <div class="col-12">
                                    <div class="m-t-20">
                                      <div id="progress-striped-active" class="progress progress-striped active">
                                          <div class="progress-bar <?php if($namasektor['id_sektor']=="1"){
                                            echo "progress-bar-success";
                                            }
                                            elseif ($namasektor['id_sektor']=="2") {
                                            echo "progress-bar-warning";
                                            }elseif ($namasektor['id_sektor']=="3") {
                                            echo "progress-bar";
                                            }else {
                                            echo "progress-bar-danger";
                                            } ?>" data-transitiongoal="
                                            <?php
                                                $id_sektor = $namasektor['id_sektor'];
                                                $semuaproyekbysektor ="SELECT COUNT(*) as selesai FROM proyek as a, units as b, sektor as c WHERE a.unit_id=b.unit_id AND b.id_sektor=c.id_sektor AND a.unit_id='$id_sektor'";
                                                $jumlahsemuaproyekbysektor = $this->db->query($semuaproyekbysektor)->row();
                                                $hasilsemuaproyek = $jumlahsemuaproyekbysektor->selesai;

                                                $id_sektor = $namasektor['id_sektor'];
                                                $semuaproyekbysektorselesai ="SELECT COUNT(*) as selesai FROM proyek as a, units as b, sektor as c WHERE a.unit_id=b.unit_id AND b.id_sektor=c.id_sektor AND a.unit_id='$id_sektor' AND status_proyek='T'";
                                                $jumlahsemuaproyekbysektorselesai = $this->db->query($semuaproyekbysektorselesai)->row();
                                                $hasilsemuaproyek2 = $jumlahsemuaproyekbysektorselesai->selesai;

                                                if($hasilsemuaproyek=="0"){ echo "0";}else{
                                                    $persentase = $hasilsemuaproyek2/$hasilsemuaproyek*100;
                                                    echo $persentase;
                                                }?>"></div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>List Sektor Bisnis</h2><br>
                            <a href="#defaultModal" data-toggle="modal" data-target="#defaultModal" class="btn btn-outline-secondary"><i class="fa fa-plus-square"></i> Tambah Unit Bisnis</a>
                            <!-- Default Size -->
                            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="title" id="defaultModalLabel">Tambah Unit</h4>
                                        </div>
                                        <div class="modal-body"> 
                                                <!-- awal form -->
                                                <form id="basic-form" method="post" novalidate="">
                                                <div class="form-group">
                                                    <label>Text Input</label>
                                                    <input type="text" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email Input</label>
                                                    <input type="email" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Text Area</label>
                                                    <textarea class="form-control" rows="5" cols="30" required=""></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Checkbox</label>
                                                    <br>
                                                    <label class="fancy-checkbox">
                                                        <input type="checkbox" name="checkbox" required="" data-parsley-errors-container="#error-checkbox" data-parsley-multiple="checkbox">
                                                        <span>Option 1</span>
                                                    </label>
                                                    <label class="fancy-checkbox">
                                                        <input type="checkbox" name="checkbox" data-parsley-multiple="checkbox">
                                                        <span>Option 2</span>
                                                    </label>
                                                    <label class="fancy-checkbox">
                                                        <input type="checkbox" name="checkbox" data-parsley-multiple="checkbox">
                                                        <span>Option 3</span>
                                                    </label>
                                                    <p id="error-checkbox"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Radio Button</label>
                                                    <br>
                                                    <label class="fancy-radio">
                                                        <input type="radio" name="gender" value="male" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                                                        <span><i></i>Male</span>
                                                    </label>
                                                    <label class="fancy-radio">
                                                        <input type="radio" name="gender" value="female" data-parsley-multiple="gender">
                                                        <span><i></i>Female</span>
                                                    </label>
                                                    <p id="error-radio"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="food">Multiselect</label>
                                                    <br>
                                                    <select id="food" name="food[]" class="multiselect multiselect-custom" multiple="multiple" data-parsley-required="" data-parsley-trigger-after-failure="change" data-parsley-errors-container="#error-multiselect" style="display: none;" data-parsley-multiple="food[]">
                                                        <option value="cheese">Cheese</option>
                                                        <option value="tomatoes">Tomatoes</option>
                                                        <option value="mozarella">Mozzarella</option>
                                                        <option value="mushrooms">Mushrooms</option>
                                                        <option value="pepperoni">Pepperoni</option>
                                                        <option value="onions">Onions</option>
                                                    </select><div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="None selected"><span class="multiselect-selected-text">None selected</span> <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="cheese"> Cheese</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="tomatoes"> Tomatoes</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="mozarella"> Mozzarella</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="mushrooms"> Mushrooms</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="pepperoni"> Pepperoni</label></a></li><li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="onions"> Onions</label></a></li></ul></div>
                                                    <p id="error-multiselect"></p>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Validate</button>
                                            </form>
                                                <!-- akhir form -->

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">SAVE CHANGES</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Default Size -->
                        </div>
                        <div class="body">
                            <?php foreach ($sektor as $namasektor): ?>
                            <button type="button" class="btn  btn-simple btn-sm <?php if($namasektor['id_sektor']=="1"){
                              echo "btn-success";
                            }
                             elseif ($namasektor['id_sektor']=="2") {
                              echo "btn-warning";
                            }elseif ($namasektor['id_sektor']=="3") {
                              echo "btn-info";
                            }else {
                              echo "btn-danger";
                            } ?> btn-filter" data-target="<?= $namasektor['nama_sektor'] ?>"><?= $namasektor['nama_sektor'] ?></button>
                            <?php endforeach;?>
                           
                            <div class="table-responsive m-t-20">
                                <table class="table table-filter table-hover m-b-0">                                
                                    <tbody>
                                    <?php foreach($listsektor as $showsektor) : ?>
                                        <tr data-status="<?= $showsektor['nama_sektor'] ?>">
                                            <td><?= $showsektor['unit_id'] ?></td>
                                            <td><div class="media-object"><img src="<?= base_url(); ?>assets/images/xs/avatar1.jpg" alt="" width="35" class="rounded-circle"></div></td>
                                            <td><?= $showsektor['unit_name'] ?></td>
                                            <td><?php
                                                $unit_id = $showsektor['unit_id'];
                                                $proyekselesai ="SELECT COUNT(*) as selesai FROM proyek WHERE unit_id=$unit_id AND status_proyek='t'";
                                                $eksekusi1 = $this->db->query($proyekselesai)->row();
                                                $hasilproyekselesai1 = $eksekusi1->selesai;
                                                //echo $hasilproyekselesai1;

                                                $totalproyek ="SELECT COUNT(*) as selesai FROM proyek WHERE unit_id=$unit_id";
                                                $eksekusi2 = $this->db->query($totalproyek)->row();
                                                $totalproyek = $eksekusi2->selesai;
                                                echo $hasilproyekselesai1." of ".$totalproyek;
                                                ?></td>
                                            <td class="width250">
                                                <div class="progress progress-xs progress-transparent custom-color-blue">
                                                    <div class="progress-bar" data-transitiongoal="<?php
                                                $unit_id = $showsektor['unit_id'];
                                                $proyekselesai ="SELECT COUNT(*) as selesai FROM proyek WHERE unit_id=$unit_id AND status_proyek='t'";
                                                $eksekusi1 = $this->db->query($proyekselesai)->row();
                                                $hasilproyekselesai1 = $eksekusi1->selesai;
                                                //echo $hasilproyekselesai1;

                                                $totalproyek ="SELECT COUNT(*) as selesai FROM proyek WHERE unit_id=$unit_id";
                                                $eksekusi2 = $this->db->query($totalproyek)->row();
                                                $totalproyek = $eksekusi2->selesai;
                                                //echo $totalproyek;

                                                if($totalproyek=="0"){ echo "0";}else{
                                                    $persentase = $hasilproyekselesai1/$totalproyek*100;
                                                    echo $persentase;
                                                }?>"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge <?php if($showsektor['id_sektor']=="1"){
                                          echo "badge-success";
                                        }
                                        elseif ($showsektor['id_sektor']=="2") {
                                          echo "badge-warning";
                                        }elseif ($showsektor['id_sektor']=="3") {
                                          echo "badge-info";
                                        }else {
                                          echo "badge-danger";
                                        } ?>"><?= $showsektor['nama_sektor'] ?></span>
                                        </td>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>