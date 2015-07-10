<?php
if(isset($_POST['kirim'])) {
	//print_r($_POST);
	include "config/koneksi.php";
	$id=$_POST['id'];
	$info=$_POST['info'];
	$jenis=$_POST['jenis'];
	$periode=$_POST['periode'];
	$tujuan=$_POST['tujuan'];
	$tanggal=$_POST['tanggal'];
	$tgl_batas=$_POST['tgl_batas'];
	$sql="update informasi set id='$id',jenis_info='$jenis',periode='$periode',info='$info',tujuan ='$tujuan',tanggal='$tanggal',tgl_bts='$tgl_batas' where id='$_POST[id]'";
	$query = mysql_query($sql);
	if($query){
		 if($query){
		 $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-check\"></i>
                    <strong>Info!</strong> Data Berhasil Di Ubah.
                  </div>";
        $_SESSION['alert'] = $alert;
	} else {
		$alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <i class=\"fa fa-ban fa-fw\"></i>
                <h4>Warning..!!</h4>
                Maaf, Data Tidak bisa di Ubah..!!
               
             </div>";
            $_SESSION['alert'] = $alert;
	}
} else {echo "Tidak ada Data Yang Diubah"; }
}
?>
    <script type="text/javascript">document.location = "index.php?modul=Informasi";</script>
 <?php