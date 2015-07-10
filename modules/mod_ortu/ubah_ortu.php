<?php
	include "config/koneksi.php";
	$nim=$_GET['nim'];
	$sql="select * from orang_tua where nim='$nim' limit 1";
	$query=mysql_query($sql);
	$data = mysql_fetch_array($query);
        
                           
	//print_r($data);
?>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Ubah Data Orang Tua</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Orang Tua</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->

        <div class="row center">
            <div class="col-md-7 center">
              <!-- DIRECT CHAT PRIMARY -->
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                    <i class="glyphicon glyphicon-edit"></i>
                  <h3 class="box-title">Form Ubah Data Wali/Orang Tua</h3>
                 
                </div><!-- /.box-header -->


            <div class="box-body">

                <form action="index.php?modul=proses_ubahortu" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Wali</label>
                        <input type="text" name="nama"class="form-control" placeholder="Masukkan Nama"
                               required="" value="<?php echo $data['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat"><?php echo $data['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name ="status" class="form-control">
                            <option>Pilih Status Wali</option>
                            <option value="Orang Tua" <?php echo ($data['status'] == "Orang Tua") ? 'selected' : ''; ?>>Orang Tua</option>
                            <option value="Saudara" <?php echo ($data['status'] == "Saudara") ? 'selected' : ''; ?>>Saudara</option>
                            <option value="Lainnya" <?php echo ($data['status'] == "lainnya") ? 'selected' : ''; ?>>Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>No Telpon</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-phone-alt"></i>
                            </div>
                            <input type="text" name="telpon" class="form-control" value="<?php echo $data['no_telpon']; ?>" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nim Mahasiswa</label>
                        <input type="text" name="nim"class="form-control" placeholder="Masukkan Nama"
                               readonly="" value="<?php echo $data['nim']; ?>">
                       
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12" id="pesan">        
                        </div>
                    </div>


                </div>
                <div class="modal-footer clearfix">

                    <a href="index.php?modul=data_ortu"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button></a>

                    <button type="submit" id="alert" name="kirim" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Simpan Data</button>
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