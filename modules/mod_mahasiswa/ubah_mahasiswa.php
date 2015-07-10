<?php
include "config/koneksi.php";
$nim = $_GET['nim'];
$sql = "select * from mahasiswa where nim='$nim' limit 1";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
//print_r($data);
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Validasi Pembayaran</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Ubah Mahasiswa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->

        <div class="row center">
            <div class="col-md-10 center">
              <!-- DIRECT CHAT PRIMARY -->
             <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <i class="glyphicon glyphicon-edit"></i>
                  <h3 class="box-title">Form Ubah Data Mahasiswa</h3>
                 
                </div><!-- /.box-header -->


            <div class="box-body">

                <form action="index.php?modul=ubah_mhs" method="post">

                <div class="row">
                    <div class="col-xs-6">        
                    <div class="form-group">
                        <label for="inputNama">Nim</label>
                        <input type="text" id="inputNama" name="nim" 
                               class="form-control" value="<?php echo $data['nim']; ?>" readonly="" required=""/>

                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputNama">Nama Mahasiswa</label>
                        <input type="text" id="inputNama" name="nama_mhs" 
                               class="form-control" value="<?php echo $data['nama_mahasiswa']; ?>"  required=""/>

                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputProdi">Tempat Lahir</label>
                        <input type="text" id="inputProdi" name="tempat" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" required />
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    </div>
                    <div class="col-xs-12">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat"><?php echo $data['alamat']; ?></textarea>
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>No Telpon </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" class="form-control" name="telpon" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" value="<?php echo $data['no_hp']; ?>"data-mask="">
                        </div><!-- /.input group -->
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name ="jenis" class="form-control">
                            <option>Pilih Jenis</option>
                            <option value="L" <?php echo ($data['jenis_kelamin'] == "L") ? 'selected' : ''; ?>>L</option>
                            <option value="P" <?php echo ($data['jenis_kelamin'] == "P") ? 'selected' : ''; ?>>P</option>


                        </select>
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputAngkatan">Angkatan</label>
                        <input type="text" id="inputAngkatan" name="angkatan" class="form-control" value="<?php echo $data['angkatan']; ?>" required />
                    </div>
                    </div>
                    <div class="col-xs-6">
                     <div class="form-group">
                        <label>Prodi</label><br>
                        <select name="prodi" class="form-control">
                            <option><center>--- Pilih Prodi ---</center></option>
                            <?php
                            include "config/koneksi.php";
                            $sql = "select * from prodi";
                            $query = mysql_query($sql);
                            while ($nama = mysql_fetch_array($query)) {
                                echo "<option value=\"$nama[kd_prodi]\">
                                    $nama[kd_prodi] $nama[jurusan]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Nama Group</label><br>
                        <select name="group" id="group" multiple="multiple" style="width: 430px" class="form-control">
                            <?php
                            include './config/koneksi.php';
                            $q = mysql_query("SELECT *from groub");
                            while ($r = mysql_fetch_array($q)) {
                                ?>
                                <option value="<?php echo $r['idgroup'] ?>">
                                    <?php echo $r['idgroup'] . " " . $r['nama_group'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    </div>

    
                   
                    </div>


                    <div class="modal-footer clearfix">

                        <a href="index.php?modul=datamahasiswa"><button type="" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button></a>

                        <button type="submit" data-loading-text="Loading..." name="kirim" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Simpan </button>
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

<script src="http://127.0.0.1/SMS/pembayaran/js/select2.js" type="text/javascript"></script>
<script src="http://127.0.0.1/SMS/pembayaran/js/select2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#group").select2({
            placeholder: 'Pilih Group',
            allowClear: true
        });
    });
</script>


