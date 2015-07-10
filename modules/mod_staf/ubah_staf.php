<?php
	include "config/koneksi.php";
	$kode=$_GET['kd_staf'];
	$sql="select * from staf where kd_staf='$kode' limit 1";
	$query=mysql_query($sql);
	$data = mysql_fetch_array($query);
	//print_r($data);
?>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Ubah Data Staf</small>
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
                <i class="glyphicon glyphicon-edit"></i>
                <h3 class="box-title">Form Ubah Data Staf


                </h3>
                <!-- tools box -->

            </div>


            <div class="box-body">

                <form action="index.php?modul=editstaf" method="post" id="chat">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Staf</label>
                        
                        <input type="text" name="kd_staf" class="form-control" value="<?php echo $data['kd_staf'];?>" readonly=""/>
                        
                    </div>
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Staf</label>
                        <input type="text" name="nama_staf" class="form-control" id="psn" value="<?php echo $data['nama_staf'];?>">
                    </div>
                     <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat"><?php echo $data['alamat'];?></textarea>
                    </div>
                    
                     <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </div>
                            <input type="email" name="email" class="form-control" value="<?php echo $data['email'];?>" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->


                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Ubah Password">
                    </div>

                   


                    
                    <div class="modal-footer clearfix">

                        <a href="index.php?modul=datastaf"><button type="" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button></a>

                        <button type="submit" data-loading-text="Loading..." name="kirim" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Ubah Data </button>
                    </div>
                </form>
                 <small id="alert"></small>
            </div>
            
            <!-- Main row -->
        </div>

    </section><!-- /.Left col -->

</section><!-- /.content -->
</aside><!-- /.right-side -->