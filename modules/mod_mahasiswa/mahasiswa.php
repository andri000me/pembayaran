<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Data Mahasiswa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Mahasiswa</li>
        </ol>
    </section>
     <section class="content-header" style="background:#EDEDED"><h1>
           Data Mahasiswa |
            <small>STMIK Bumigora Mataram</small>
        </h1></section>
    <section class="content-header">                    
        <form method="post" action="index.php?modul=import" enctype="multipart/form-data">


            <div class="box-body">

                <div class="row">
                <div class="form-group">
                      <label for="exampleInputFile">File input Mahasiswa</label>
                      <input type="file" id="exampleInputFile" name="fileexcel">
                      <p class="help-block">Import File Excel Format .xls (Excel 2003)</p>
                      <small><p color="Red">*Sesuaikan Format File dengan Field Tabel Mahasiswa</p></small>
                    </div>
                    <div class="box-footer">
                    <button type="submit" name="import" class="btn btn-primary"><i class="glyphicon glyphicon-import"></i>Import</button>
                  </div>
             
                </div>

        </form>
              
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Data Mahasiswa | Aktif</h3>
                <div class="box-tools">
                    
    
                </div>
            </div><!-- /.box-header -->



            <div class="box-body table-responsive" id="data-mahasiswa">
                <table id="example1" class="table table-bordered table-striped">
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

                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Angkatan</th>
                            <th>Group Mahasiswa</th>
                            <th>Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config/koneksi.php';
                        $i = 1;
                        $query = mysql_query("SELECT * FROM mahasiswa");

                        // tampilkan data mahasiswa selama masih ada
                        while ($data = mysql_fetch_array($query)) {
                            ?>
                            <tr class="">
                                <td><?php echo $i; ?></td>

                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['nama_mahasiswa']; ?></td>

                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['no_hp']; ?></td>
                                <td><?php echo $data['jenis_kelamin']; ?></td>
                                <td><?php echo $data['angkatan']; ?></td>
                                <td><?php echo $data['idgroup']; ?></td>
                                <td><?php echo $data['kd_prodi']; ?></td>

                                <td>

                                    <a href="index.php?modul=ubah_mahasiswa&nim=<?php echo $data['nim']; ?>" class="ubah"  title="" data-toggle="tooltip" data-original-title="Ubah Data Mahasiswa <?php echo $data['nama_mahasiswa']; ?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a href="index.php?modul=hapus_mhs&nim=<?php echo $data['nim']; ?>" title="" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Anda yakin menghapus Prodi dengan Nama : <?php echo $data['nama_mahasiswa']; ?> ?');">
                                        <i class="glyphicon glyphicon-trash"></i>

                                    </a>
                                    <a href="index.php?modul=history&nim=<?php echo $data['nim']; ?>" class="ubah"  title="" data-toggle="tooltip" data-original-title="Lihat History Pembayaran <?php echo $data['nama_mahasiswa']; ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>


                            </tr>
                            <?php
                            $i++;
                        }
                        ?>


                    </tbody>

                </table>



            </div>
    </section><!-- /.Left col -->

</section><!-- /.content -->
</aside><!-- /.right-side -->
<!-- DATA TABES SCRIPT -->
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
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>