<?php
 
include 'config/koneksi.php';
 
        $i = 1;
        $query = mysql_query("SELECT * FROM staf where nama_staf='" . $_SESSION['nama'] . "'");
        
        $data=mysql_fetch_assoc($query);
?>


 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Aplikasi Bimbingan Akademik

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Profil</a></li>
                        <li class="active">Lihat profil</li>
                    </ol>
                </section>

                <div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <i class="fa fa-info"></i>
                        <b>Info: Selamat Datang, <?php echo  $_SESSION['nama'];?> Di Halaman Akun Anda.</b>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-user"></i> IDENTITAS STAF KEUANGAN
                                
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                               
                                <tbody>
                                        <tr>
                                            <td><strong>1</strong></td>
                                            <td><strong>ID Staf</strong></td>
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $data['kd_staf']; ?></strong></td>

                                        </tr>
                                        <tr>
                                            <td><strong>2</strong></td>
                                            <td><strong>Nama Staf</strong></td>
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $data['nama_staf']; ?></strong></td>

                                        </tr>

                                        <tr>
                                            <td><strong>3</strong></td>
                                            <td><strong>Alamat</strong></td>
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $data['alamat']; ?></strong></td>

                                        </tr>
                                        <tr>
                                            <td><strong>4</strong></td>
                                            <td><strong>Email</strong></td>
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $data['email']; ?></strong></td>

                                        </tr>

                                        <tr>
                                            <td><strong>5</strong></td>
                                            <td><strong>Sandi ( Password )</strong></td>
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $data['password']; ?></strong></td>

                                        </tr>
                                    </tbody>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                   
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            
                            
                            <a href="#"><button class="btn btn-success pull-right btn-flat" data-toggle="modal" data-target="#compose-modal"><i class="glyphicon glyphicon-edit"></i> Ubah Profil</button></a>
                            
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->


<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-user"></i> Ubah Profil Staf</h4>
                    </div>
                    <form action="ubah_profil.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                
                                <label>ID Staf</label>
                                <input type="text" class="form-control" name ="kd_staf" value="<?php echo $data['kd_staf'];?>" readonly="" />
                                        
                            </div>
                            <div class="form-group">
                                <label>Nama Staf</label>
                                <input type="text" class="form-control" name ="nama_staf" value="<?php echo $data['nama_staf'];?>" />
                            </div>
                             <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name ="alamat" value="<?php echo $data['alamat'];?>" />
                            </div>
                            <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                               <i class="fa fa-envelope-o"></i>
                                            </div>
                                            <input type="text" class="form-control" name="email" value="<?php echo $data['email'];?>" data-mask/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                           

                             <div class="form-group">
                               <label>Sandi (Password)</label>
                                <input type="text" class="form-control" name ="password" value="<?php echo $data['password'];?>" />
                            </div>
                            

                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>

                            <button type="submit" class="btn btn-primary pull-left" name="kirim"><i class="fa fa-floppy-o"></i> Simpan</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->