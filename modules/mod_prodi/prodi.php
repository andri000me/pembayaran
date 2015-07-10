<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Program Studi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Prodi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
                <i class="glyphicon glyphicon-th-list"></i>
                <h3 class="box-title">Daftar Program Studi

                    <a href="#" id="0" class="btn btn-primary" data-toggle="modal" data-target="#compose-modal">
                        <i class="fa fa-plus-square-o"></i> Tambah Prodi
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
                            <th>#</th>
                            <th>Kode Prodi</th>
                            <th>Jenjang</th>
                            <th>Jurusan</th>
                            <th>Nama Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config/koneksi.php';
                        $i = 1;


                        $query = mysql_query("SELECT * FROM prodi");

                        // tampilkan data siswa selama masih ada
                        while ($data = mysql_fetch_array($query)) {
                            ?>
                            <tr class="">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['kd_prodi']; ?></td>
                                <td><?php echo $data['jenjang']; ?></td>
                                <td><?php echo $data['jurusan']; ?></td>
                                <td><?php echo $data['nama_prodi']; ?></td>


                                <td>
                                    
                                    <a href="index.php?modul=ubah_prodi&kd_prodi=<?php echo $data['kd_prodi']; ?>" class="ubah"  title="" data-toggle="tooltip" data-original-title="Ubah Data Prodi <?php echo $data['kd_prodi'];?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="index.php?modul=hapus_prodi&kd_prodi=<?php echo $data['kd_prodi']; ?>" title="" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Anda yakin menghapus Prodi dengan Nama : <?php echo $data['nama_prodi']; ?> ?');">
                                        <i class="glyphicon glyphicon-trash"></i>

                                    </a>
                                </td>


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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-institution"></i> Tambah Data</h4>
            </div>
            <form id="simpan" action="index.php?modul=simpan_prodi" method="post" onsubmit="return validasi()">
                 <div class="form-group">
                        <div class="col-lg-12" id="pesan">        
                        </div>
                    </div>
                <div class="modal-body">
                       
               


                    <div class="form-group">
                        <label for="inputKode">Kode Prodi</label>
                        <input type="text" id="inputKode" name="kode" class="form-control" placeholder="Masukkan Kode" required/>
                    </div>
                    <small id="alert"></small>

                    <div class="form-group">
                        <label>Jenjang</label>
                        <select name ="jenjang" id="jenjang" class="form-control">
                            <option>Pilih Jenjang</option>
                            <option value="S1">S1</option>
                            <option value="D3">D3</option>
                            <option value="D1">D1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select name ="jurusan" id="jurusan" class="form-control">
                            <option>Pilih Jurusan</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Manajemen Informatika">Manajemen Informatia</option>
                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="inputProdi">Nama Prodi</label>
                        <input type="text" id="inputProdi" name="nama" class="form-control" placeholder="Masukkan Nama" required/>
                    </div>


                </div>
                <div class="modal-footer clearfix">

                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>

                    <button type="submit" name="submit" class="btn btn-primary btn-flat pull-left"><i class="fa fa-save"></i> Simpan Data</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
