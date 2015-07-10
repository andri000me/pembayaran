<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Staff</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Staf</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Data Staf Keuangan
                    <!-- <a href="#" id="0" class="btn btn-primary" data-toggle="modal" data-target="#compose-modal">
                        <i class="fa fa-plus-square-o"></i> Tambah Staf
                    </a> -->

                </h3>
                <!-- tools box -->

            </div>


            <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo $_SESSION['alert'];
                    } unset($_SESSION['alert']);
                    ?>

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Staf</th>
                            <th>Nama Staf</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config/koneksi.php';
                        $i = 1;


                        $query = mysql_query("SELECT * FROM staf");

                        // tampilkan data siswa selama masih ada
                        while ($data = mysql_fetch_array($query)) {
                            ?>
                            <tr class="">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['kd_staf']; ?></td>
                                <td><?php echo $data['nama_staf']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                

                                <!-- <td>

                                    <a href="index.php?modul=ubah_staf&kd_staf=<?php echo $data['kd_staf']; ?>" class="ubah"  title="" data-toggle="tooltip" data-original-title="Ubah Data Staf <?php echo $data['nama_staf'];?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="index.php?modul=hapus_staf&kd_staf=<?php echo $data['kd_staf']; ?>" title="" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Anda yakin menghapus Data staf dengan Nama : <?php echo $data['nama_staf']; ?> ?');">
                                        <i class="glyphicon glyphicon-trash"></i>

                                    </a>
                                </td>
 -->

                            </tr>
                            <?php
                            $i++;
                        }
                        ?>


                    </tbody>

                </table>
            </div><!-- /.box-body -->
            <!-- Main row -->


    </section><!-- /.Left col -->

</section><!-- /.content -->
</aside><!-- /.right-side -->


<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i> Tambah Staf Baru</h4>
            </div>
            <form action="index.php?modul=simpan_staf" method="post">
                <div class="modal-body">



                    <div class="form-group">
                        <label class="control-label" for="inputSuccess">Kode Staf</label>
                        <input type="text" name="kode" class="form-control" id="kd_staf" placeholder="Masukkan Kode" 
                               required>
                    </div>
                    <small id="alert"></small>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Staf</label>
                        <input type="text" name="nama_staf"class="form-control" placeholder="Masukkan Nama"
                               required="">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="example@mail.com" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->

                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="sandi" class="form-control" placeholder="Masukkan Password">
                    </div>


                </div>
                <div class="modal-footer clearfix">

                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>

                    <button type="submit" id="alert" name="kirim" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Simpan Data</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->

<!-- page script -->
<script type="text/javascript">
    $(function() {
        
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
    });
</script>



