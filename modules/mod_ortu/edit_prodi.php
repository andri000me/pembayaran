<?php
if(isset($_POST['kirim'])) {
	//print_r($_POST);
	include "config/koneksi.php";
	$nim=$_POST['nim'];
	$nama=htmlspecialchars($_POST['nama']);
	$alamat=$_POST['alamat'];
        $status=$_POST['status'];
        $telpon=  $_POST['telpon'];
        
	$sql="update orang_tua set nim='$nim',nama='$nama',alamat ='$alamat',status='$status',no_telpon='$telpon' where nim='$_POST[nim]'";
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
    <script type="text/javascript">document.location = "index.php?modul=data_ortu";</script>
    <?php