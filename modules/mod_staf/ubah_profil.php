<?php
if(isset($_POST['kirim'])) {
	//print_r($_POST);
	include "config/koneksi.php";
	$kd_staf=$_POST['kd_staf'];
	$nama_staf=$_POST['nama_staf'];
	$alamat=$_POST['alamat'];
	$email=$_POST['email'];
        $password=$_POST['password'];
	$sql="update staf set kd_staf='$kd_staf',nama_staf='$nama_staf',alamat ='$alamat',email='$email',password='$password' where kd_staf='$_POST[kd_staf]'";
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
    <script type="text/javascript">document.location = "index.php?modul=profil";</script>
    <?php