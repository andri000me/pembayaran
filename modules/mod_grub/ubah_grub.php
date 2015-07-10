<?php
	include "config/koneksi.php";
	$kode=$_GET['idgroup'];
	$sql="select * from groub where idgroup='$kode' limit 1";
	$query=mysql_query($sql);
	$data = mysql_fetch_array($query);
	//print_r($data);
?>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Ubah Data Group</small>
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
                    <i class="fa fa-users"></i>
                  <h3 class="box-title">Form Ubah Group</h3>
                 
                </div><!-- /.box-header -->


            <div class="box-body">

               <form action="index.php?modul=proses_grub" method="POST">
                
                    
                   
                    <div class="form-group">
                        <label>Kode Group</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-group"></i>
                            </div>
                            <input type="text" name="idgroup" class="form-control" value="<?php echo $data['idgroup'] ;?>"/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    <div class="form-group">
                        <label>Nama Group</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <input type="text" name="nama_group" class="form-control" value="<?php echo $data['nama_group'] ;?>"/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->


                    


                
                <div class="modal-footer clearfix">

                    <a href="index.php?modul=group"><button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button></a>

                    <button type="submit" name="kirim" class="btn btn-primary btn-flat pull-left"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
                 <small id="alert"></small>
            </div>
            
            <!-- Main row -->
        </div>
            </div>
       </div>

    </section><!-- /.Left col -->


</aside><!-- /.right-side -->
