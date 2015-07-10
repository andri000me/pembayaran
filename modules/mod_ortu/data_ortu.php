<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Data Ortu</small>
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
                <h3 class="box-title">Data Wali Mahasiswa/Orang Tua
                    <a href="#" id="0" class="btn btn-primary" data-toggle="modal" data-target="#compose-modal">
                        <i class="fa fa-plus-square-o"></i> Tambah Wali
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
                            <th>Nim</th>
                            <th>Nama Mahasiswa</th>
                            <th>No Hp</th>
                            <th>Nama Wali Mahasiswa</th>
                            <th>No Hp Wali</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config/koneksi.php';
                        $i = 1;


                        $query = mysql_query("select mahasiswa.nim,mahasiswa.nama_mahasiswa,mahasiswa.no_hp,
                                              orang_tua.nama,orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                                              mahasiswa.nim=orang_tua.nim");

                        // tampilkan data siswa selama masih ada
                        while ($data = mysql_fetch_array($query)) {
                            ?>
                            <tr class="">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['nama_mahasiswa']; ?></td>
                                <td><?php echo $data['no_hp']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['no_telpon']; ?></td>

                                <td>

                                    <a href="index.php?modul=ubah_ortu&nim=<?php echo $data['nim']; ?>" class="ubah"  title="" data-toggle="tooltip" data-original-title="Ubah Data Wali <?php echo $data['nama']; ?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="index.php?modul=hapus_ortu&nim=<?php echo $data['nim']; ?>" title="" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Anda yakin menghapus Data Wali dengan Nama : <?php echo $data['nama']; ?> ?');">
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


<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i> Tambah Data Wali</h4>
            </div>
            <div class="form-group">
                        <div class="col-lg-12" id="pesan">        
                        </div>
                    </div>
            <form action="index.php?modul=simpan_ortu" method="post">
                <div class="modal-body">
                     <div class="form-group">
                         <label>Nim Mahasiswa</label><br>
                        <select name="nim" id="nim" multiple="multiple" style="width: 570px" class="form-control">
                            <?php
                                $q = mysql_query("SELECT nim, nama_mahasiswa from mahasiswa");
                                while($r = mysql_fetch_array($q)) {
                                    ?>
                            <option value="<?php echo $r['nim'] ?>">
                                <?php echo $r['nim']." ".$r['nama_mahasiswa'] ?>
                            </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Wali</label>
                        <input type="text" name="nama"class="form-control" placeholder="Masukkan Nama"
                               required="">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name ="status" id="jenjang" class="form-control">
                            <option>Pilih Status</option>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Saudara">Saudara</option>
                            <option value="Lainnya">lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label>No Telpon Wali/Ortu</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                        <input type="text" class="form-control" name="telpon" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="">
                    </div><!-- /.input group -->
                  </div>

                </div>
                <div class="modal-footer clearfix">

                    <button type="reset"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>

                    <button type="submit" id="alert" name="kirim" class="btn btn-primary pull-left btn-flat"><i class="fa fa-save"></i> Simpan Data</button>
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

<script src="http://127.0.0.1/SMS/pembayaran/js/select2.js" type="text/javascript"></script>
<script src="http://127.0.0.1/SMS/pembayaran/js/select2.min.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
                                       $(function() {
                $("#example1").dataTable();
                $("#baca").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
                
            });
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#nim").select2({
			placeholder: 'Pilih Mahasiswa',
			allowClear: true
		});
	});
</script>