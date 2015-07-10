<?php
if(isset($_POST['kirim'])) {
	//print_r($_POST);
	include "config/koneksi.php";
	$kd_prodi=$_POST['kd_prodi'];
	$jenjang=$_POST['jenjang'];
	$jurusan=$_POST['jurusan'];
	$nama_prodi=$_POST['nama_prodi'];
        
	$sql="update prodi set kd_prodi='$kd_prodi',jenjang='$jenjang',jurusan ='$jurusan',nama_prodi='$nama_prodi' where kd_prodi='$_POST[kd_prodi]'";
	$query = mysql_query($sql);
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
?>
    <script type="text/javascript">document.location = "index.php?modul=prodi";</script>
    <?php