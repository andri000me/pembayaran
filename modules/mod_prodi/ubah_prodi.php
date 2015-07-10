<?php
include "config/koneksi.php";
$kode = $_GET['kd_prodi'];
$sql = "select * from prodi where kd_prodi='$kode' limit 1";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
//print_r($data);
?>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Ubah Data Program Studi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Prodi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-5 center">
              <!-- DIRECT CHAT PRIMARY -->
             <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <i class="fa fa-graduation-cap"></i>
                  <h3 class="box-title">Form Ubah Prodi</h3>
                 
                </div><!-- /.box-header -->


            <div class="box-body">

                <form action="index.php?modul=editprodi" method="post">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Prodi</label>

                        <input type="text" name="kd_prodi" class="form-control" value="<?php echo $data['kd_prodi']; ?>" readonly=""/>

                    </div>


                    <div class="form-group">
                        <label>Jenjang</label>
                        <select name ="jenjang" class="form-control">
                            <option>Pilih Jenjang</option>
                            <option value="S1" <?php echo ($data['jenjang'] == "S1") ? 'selected' : ''; ?>>S1</option>
                            <option value="D3" <?php echo ($data['jenjang'] == "D3") ? 'selected' : ''; ?>>D3</option>
                            <option value="D1" <?php echo ($data['jenjang'] == "D1") ? 'selected' : ''; ?>>D1</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label>Jurusan</label>
                        <select name ="jurusan" class="form-control">
                            <option>Pilih Jurusan</option>
                            <option value="Teknik Informatika" <?php echo ($data['jurusan'] == "Teknik Informatika") ? 'selected' : ''; ?>>Teknik Informatika</option>
                            <option value="Manajemen Informatika" <?php echo ($data['jurusan'] == "Manajemen Informatika") ? 'selected' : ''; ?>>Manajemen Informatika</option>
                            <option value="dan lainya" <?php echo ($data['jurusan'] == "dan lainnya") ? 'selected' : ''; ?>>dan lainnya</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Program studi</label>
                        <input type="text" name="nama_prodi" class="form-control" value="<?php echo $data['nama_prodi']; ?>">
                    </div>





                    <div class="modal-footer clearfix">

                        <a href="index.php?modul=prodi"><button type="" class="btn btn-danger btn-flat"><i class="fa fa-times"></i> Batal</button></a>

                        <button type="submit" data-loading-text="Loading..." name="kirim" class="btn btn-primary btn-flat pull-left"><i class="fa fa-save"></i> Ubah Data </button>
                    </div>
                </form>
            </div>
            <!-- Main row -->
        </div>
            </div>
        </div>

    </section><!-- /.Left col -->

</section><!-- /.content -->
</aside><!-- /.right-side -->