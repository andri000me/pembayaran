<?php
	include "config/koneksi.php";
	$kode=$_GET['id'];
	$sql="select * from informasi where id='$kode' limit 1";
	$query=mysql_query($sql);
	$data = mysql_fetch_array($query);
	//print_r($data);
?>

<script>
            function Count() {
                var karakter, maksimum;
                maksimum = 146
                karakter = maksimum - (document.form1.info.value.length);
                if (karakter < 0) {
                    alert("Jumlah Karakter sudah:" + maksimum + "");
                    document.form1.info.value = document.form1.info.value.
                            substring(0, maksimum);
                    document.form1.counter.value = karakter;
                } else {
                    document.form1.counter.value = maksimum - (document.form1.info.value.length);
                }
            }
        </script>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Ubah Data Informasi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Informasi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        

       <div class="row center">
            <div class="col-md-7 center">
              <!-- DIRECT CHAT PRIMARY -->
              <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <i class="fa fa-info-circle"></i>
                  <h3 class="box-title">Form Ubah Informasi</h3>
                 
                </div><!-- /.box-header -->


            <div class="box-body">

               <form action="index.php?modul=update_info" method="post" name="form1">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $data[0] ?>"/>
                    <div class="form-group">
                        <label>Tujuan</label>
                         <select name ="tujuan" class="form-control">
                            <option><center>--- Pilih Tujuan ---</center></option>
                            <?php
                            include "config/koneksi.php";
                            $sql = "select * from groub";
                            $query = mysql_query($sql);
                            while ($nama = mysql_fetch_array($query)) {
                                echo "<option value=\"$nama[idgroup]\">
                                        $nama[nama_group]</option>";
                            }
                            ?>
                        </select>
                    </div>
                                        </div>
                    <div class="row">
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Jenis Info</label>
                        <select name ="jenis" class="form-control">
                            <option>Pilih Jenis</option>
                            <option value="SPP" <?php echo ($data['jenis_info'] == "SPP") ? 'selected' : ''; ?>>SPP</option>
                            <option value="SKS" <?php echo ($data['jenis_info'] == "SKS") ? 'selected' : ''; ?>>SKS</option>
                            <option value="Laboraturium" <?php echo ($data['jenis_info'] == "Laboraturium") ? 'selected' : ''; ?>>Laboraturium</option>
                            <option value="DPP Angsuran 1" <?php echo ($data['jenis_info'] == "DPP Angsuran 1") ? 'selected' : ''; ?>>DPP Angsuran 1</option>
                            <option value="DPP Angsuran 2" <?php echo ($data['jenis_info'] == "DPP Angsuran 2") ? 'selected' : ''; ?>>DPP Angsuran 2</option>
                            <option value="DPP Angsuran 3" <?php echo ($data['jenis_info'] == "DPP Angsuran 3") ? 'selected' : ''; ?>>DPP Angsuran 3</option>
                            <option value="DPP Angsuran 4" <?php echo ($data['jenis_info'] == "DPP Angsuran 4") ? 'selected' : ''; ?>>DPP Angsuran 4</option>
                            <option value="Skripsi/TA" <?php echo ($data['jenis_info'] == "Skripsi/TA") ? 'selected' : ''; ?>>Skripsi/TA</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Jenis Info</label>
                        <select name ="periode" class="form-control">
                            <option>Pilih Periode</option>
                            <option value="Genap" <?php echo ($data['periode'] == "Genap") ? 'selected' : ''; ?>>Genap</option>
                            <option value="Ganjil" <?php echo ($data['periode'] == "Ganjil") ? 'selected' : ''; ?>>Ganjil</option>
                            
                        </select>
                    </div>
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Tanggal Kirim</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal'] ;?>" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Tanggal Batas</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="tgl_batas" class="form-control" value="<?php echo $data['tgl_bts'] ;?>" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    </div>
                    </div>


                    <div class="form-group">
                        <label>Isi Informasi</label>
                        <textarea name="info" class="form-control" rows="3" placeholder="info" OnFocus="Count();" OnClick="Count();" onKeydown="Count();"
                        OnChange="Count();" onKeyup="Count();"><?php echo $data['info'] ?></textarea>
                    </div>
                     <div class="form-group">
                                                <label>Jumlah Sisa Karakter Yang Bisa Dikirim:</label>
                                                <input type="text" class="form-control input-sm" size="5" maxlength="5" style="width: 50px;" name="counter" readonly="" placeholder="146">


                                            </div>


                </div>
                <div class="modal-footer clearfix">

                    <a href="index.php?modul=Informasi"><button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button></a>

                    <button type="submit" name="kirim" class="btn btn-primary btn-flat pull-left"><i class="fa fa-save"></i> Simpan Info</button>
                </div>
            </form>
                 <small id="alert"></small>
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
            placeholder: 'Pilih Group atau Ketik Nama Group',
            allowClear: true
        });
    });
</script>