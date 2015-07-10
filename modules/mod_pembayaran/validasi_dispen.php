<?php
    include "config/koneksi.php";
    $nim=$_GET['nim'];
    // $semester=$_GET['semester'];
    $sql="select * from pembayaran where nim='$nim' and semester and status='Dispensasi' limit 1";
    $query=mysql_query($sql);
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
            <li class="active">Validasi</li>
        </ol>
    </section>

    <!-- Main content -->
     <div class="container">
    <section class="content">

        <!-- Small boxes (Stat box) -->
       

       <div class="row center">
            <div class="col-md-7 center">
              <!-- DIRECT CHAT PRIMARY -->
              <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <i class="glyphicon glyphicon-check"></i>
                  <h3 class="box-title">Form Validasi Pembayaran Dispensasi</h3>
                 
                </div><!-- /.box-header -->


            <div class="box-body">

                <form action="index.php?modul=valid_dispen" method="post">
                    <div class="form-group">
                        <div class="col-lg-12" id="pesan">        
                        </div>
                        <?php
                        if (isset($_SESSION['alert'])) {
                            echo $_SESSION['alert'];
                        } unset($_SESSION['alert']);
                        ?>
                    </div>
                    <div class="row">
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputNama">Nim Mahasiswa</label>
                        <input type="text" id="inputNama" name="nim" 
                               class="form-control" value="<?php echo $data['nim']; ?>" readonly="" required=""/>

                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputNama">Nama Mahasiswa</label>
                        <input type="text" id="inputNama" name="nama_mhs" 
                               class="form-control" value="<?php echo $data['nama_mahasiswa']; ?>" readonly="" required=""/>

                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputProdi">Program Studi</label>
                        <input type="text" id="inputProdi" name="prodi" class="form-control" value="<?php echo $data['kd_prodi']; ?>" readonly="" required />
                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputAngkatan">Angkatan</label>
                        <input type="text" id="inputAngkatan" name="angkatan" class="form-control" value="<?php echo $data['angkatan']; ?>" readonly="" required />
                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputAngkatan">Jenis Pembayaran</label>
                        <input type="text" id="inputAngkatan" name="jenis" class="form-control" value="<?php echo $data['jenis_pembayaran']; ?>" readonly="" required />
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputAngkatan">Periode</label>
                        <input type="text" id="inputAngkatan" name="periode" class="form-control" value="<?php echo $data['periode']; ?>" readonly="" required />
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputAngkatan">Semester</label>
                        <input type="text" id="inputAngkatan" name="semester" class="form-control" value="<?php echo $data['semester']; ?>" readonly="" required />
                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Tanggal Batas Dispensasi</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date"  id="tgl" class="form-control" value="<?php echo $data['tgl_bayar'];?>" data-mask required/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    </div>

                    
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Nominal Pembayaran (Rp)</label>
                        <input type="number" min="1" id="jmlPembayaran" name="jumlah" class="form-control" value="<?php echo $data['jumlah'];?>" required/>


                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Tanggal Bayar Dispensasi</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="tanggal" id="tgl1"class="form-control"  data-mask required/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    </div>

                    <div class="col-xs-6">
                    <div class="form-group" id="ketDenda">
                    <label>Denda</label>
                        <input type="text" id="jmlDenda" name="denda" class="form-control">
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group" id="ketTotal">
                    <label>Total Bayar</label>
                        <input type="text" id="jmlBayar" name="total" class="form-control">
                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Status Pembayaran</label>
                        <select name ="status" class="form-control" required>
                            <option>Pilih Status</option>
                            <option value="Lunas">Lunas</option>
                            

                        </select>
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                         <label>ID Staf</label><br>
                        <select name="staf" id="kd" multiple="multiple" style="width: 285px" class="form-control">
                            <?php
                                $q = mysql_query("SELECT kd_staf, nama_staf from staf");
                                while($r = mysql_fetch_array($q)) {
                                    ?>
                            <option value="<?php echo $r['kd_staf'] ?>">
                                <?php echo $r['kd_staf']." ".$r['nama_staf'] ?>
                            </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                   
                    </div>
                    </div>
                    
                    
                    <div class="modal-footer clearfix">

                        <a href="index.php?modul=pembayaran"><button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button></a>

                        <button type="submit" data-loading-text="Loading..." name="kirim" class="btn btn-primary btn-flat pull-left"><i class="fa fa-save"></i> Simpan </button>
                    </div>
                </form>
            </div>
            <!-- Main row -->
        </div>
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
		$("#kd").select2({
			placeholder: 'ID Anda',
			allowClear: true
		});
	});
</script>

<script>
    $(document).ready(function () {

        $("#ketDenda").hide();
        $("#ketTotal").hide();
        $("#tgl1").change(function(){
            var tgl1 = $("#tgl1").val();
            var jmlPembayaran = $("#jmlPembayaran").val();
            $.ajax({
                url: "modules/mod_validasi/proses.php",
                type: 'POST',
                data: {"jmlPembayaran": jmlPembayaran,
                        "tgl1": tgl1,
                        "tgl":$("#tgl").val()},
                success: function (data) {
                    console.log(data);
                    var totalBayar = parseInt(data)+parseInt(jmlPembayaran);
                    $("#ketDenda").show();
                    $("#ketTotal").show();
                    $("#jmlBayar").val(totalBayar);
                    $("#jmlDenda").val(data);
                }
            });
            return false;
        });
    });
        </script>