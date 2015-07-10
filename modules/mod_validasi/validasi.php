<script>
    $(document).ready(function () {

        $("#ketDenda").hide();
        $("#ketTotal").hide();
        $("#tgl1").change(function(){
            var tgl1 = $("#tgl1").val();
            var jmlPembayaran = $("#jmlPembayaran").val();
            var status =$("#status").val();
            if (status == "Dispensasi") {
                $("#ketDenda").show(0);
                    $("#ketTotal").show(0);
                    $("#jmlBayar").val(jmlPembayaran);
                    $("#jmlDenda").val(0);
            }else {
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
        }
        });
    });
        </script>
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
            <div class="col-md-10 center">
              <!-- DIRECT CHAT PRIMARY -->
             <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <i class="glyphicon glyphicon-check"></i>
                  <h3 class="box-title">Form Validasi Pembayaran</h3>
                 
                </div><!-- /.box-header -->


            <div class="box-body">

                <form action="index.php?modul=notifikasi" method="post">
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
                        <label for="inputNim">Nim Mahasiswa</label>
                        <div class="input-group">
                            <input type="text" class="tultif form-control " id="inputNim" value="" name="nim" placeholder="Nim Anda" title="" data-toggle="tooltip" data-original-title="Gunakan Nim Untuk Mencari Mahasiswa" required />
                            <div class="input-group-btn">
                                <button type="button" id="cek_nim" class="btn btn btn-primary"><i class="fa fa-search-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputNama">Nama Mahasiswa</label>
                        <input type="text" id="inputNama" name="nama_mhs" 
                               class="form-control" placeholder="Masukkan Nama" readonly="" required=""/>

                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputAngkatan">Angkatan</label>
                        <input type="text" id="inputAngkatan" name="angkatan" class="form-control" placeholder="Masukkan Angkatan" readonly="" required />
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputProdi">Program Studi</label>
                        <input type="text" id="inputProdi" name="prodi" class="form-control" placeholder="Masukkan Prodi" readonly="" required />
                    </div>
                    </div>

                    

                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Jenis Pembayaran</label>
                       <select name ="jenis" class="form-control" id="mapel">
                            <option><center>Pilih Jenis Pembayaran</center></option>
                            <?php
                            include "config/koneksi.php";
                            $sql = "select id,jenis_info from informasi";
                            $query = mysql_query($sql);
                            while ($nama = mysql_fetch_array($query)) {
                                echo "<option value=\"$nama[jenis_info]\">
                                        $nama[jenis_info]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                    <label>Periode</label>  <select name="periode" id="SK" class="form-control">
    <!-- hasil data dari cari_kota.php akan ditampilkan disini -->
                    </select>
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="inputAngkatan">Semester</label>
                        <input type="number" id="inputAngkatan" name="semester" class="form-control" placeholder="Masukkan Semester" required />
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Tanggal Batas Bayar</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                             <select  id="tgl" class="form-control">
                             </select>
                        </div><!-- /.input group -->
                    </div><!-- /.form group--> 
                    </div>
                     <div class="col-xs-6">
                    <div class="form-group">
                        <label>Status Pembayaran</label>
                        <select name ="status" id="status" class="form-control" required>
                            <option>Pilih Status</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Dispensasi">Dispensasi</option>

                        </select>
                    </div>
                    </div>
                     <div class="col-xs-6">
                    <div class="form-group">
                        <label>Tanggal Bayar/Batas Dispensasi</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="tanggal" id="tgl1" class="form-control" placeholder="yyyy/mm/dd" data-mask required/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Nominal Pembayaran (Rp)</label>
                        <input type="number" id="jmlPembayaran" min="1" name="jumlah" class="form-control" placeholder="Masukkan Nominal" required/>


                    </div>
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
                         <label>ID Staf</label><br>
                        <select name="staf" id="kd" multiple="multiple" style="width: 438px" class="form-control">
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

                        <button type="reset" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>

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
    $("#mapel").change(function(){
        
        var id_md = $("#mapel").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "modules/mod_validasi/ambil-jenis.php",
            data: "md="+id_md,
            success: function(msg){     
                if(msg == ''){
                    alert('Tidak ada data sk');
                }
                else{
                    $("#SK").html(msg);
                     
                                                                         
                }
            }
        });    

       $.ajax({
            type: "POST",
            dataType: "html",
            url: "modules/mod_validasi/ambil-bts.php",
            data: "md=" + id_md,
            success: function(msg){     
                if(msg == ''){
                    alert('Tidak ada data sk');
                }
                else{
                    $("#tgl").html(msg);
                     
                                                                         
                }
            }
        });

    });
    </script>




