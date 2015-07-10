<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Group</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Group</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
                <i class="glyphicon glyphicon-th-list"></i>
                <h3 class="box-title">Daftar Group Mahasiswa
                    <a href="#" id="0" class="btn btn-primary" data-toggle="modal" data-target="#compose-modal">
                        <i class="fa fa-plus-square-o"></i> Tambah Group
                    </a>

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
                            <th>Kode Group</th>
                            <th>Nama Groub</th>
                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config/koneksi.php';


                        $query = mysql_query("SELECT * FROM groub");

                        // tampilkan data siswa selama masih ada
                        while ($data = mysql_fetch_array($query)) {
                            ?>
                            <tr class="">
                                <td><?php echo $data['idgroup']; ?></td>
                                <td><?php echo $data['nama_group']; ?></td>
                                

                                <td>
                                    <a href="index.php?modul=ubah_grup&idgroup=<?php echo $data['idgroup']; ?>" class="ubah" title="" data-toggle="tooltip" data-original-title="Ubah Group <?php echo $data['nama_group'];?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="index.php?modul=hapus_grup&idgroup=<?php echo $data['idgroup']; ?>" title="" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Anda yakin menghapus Prodi dengan Nama : <?php echo $data['nama_group']; ?> ?');">
                                        <i class="glyphicon glyphicon-trash"></i>

                                    </a>
                                </td>


                            </tr>
                            <?php
                        }
                        ?>


                    </tbody>

                </table>
            </div><!-- /.box-body -->
            <!-- Main row -->


    </section><!-- /.Left col -->

</section><!-- /.content -->
</aside><!-- /.right-side -->
<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->

<!-- page script -->
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>



<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="box box-solid box-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-users"></i> Tambah Groub Mahasiswa</h4>
            </div>
            <form action="index.php?modul=simpan_group" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Group</label>
                        <small>*Gunakan Kode Tahun Angkatan untuk Grup Angkatan dan Kode Prodi utk Grup Skripsi/TA
                        <input type="text" name="kode"class="form-control" placeholder="Masukkan Kode"
                               required="">
                    </div>
                    
                    <div class="form-group">
                        <label>Nama Group</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-group"></i>
                            </div>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Group" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->



                </div>
                <div class="modal-footer clearfix">

                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>

                    <button type="submit" name="kirim" class="btn btn-primary pull-left btn-flat"><i class="fa fa-save"></i> Simpan Info</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div>
</div><!-- /.modal -->
