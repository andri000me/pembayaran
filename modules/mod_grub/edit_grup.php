<?php
if(isset($_POST['kirim'])) {
	//print_r($_POST);
	include "config/koneksi.php";
	$idgroup=$_POST['idgroup'];
	$nama_group=$_POST['nama_group'];
	$sql="update groub set idgroup='$idgroup',nama_group='$nama_group' where idgroup='$_POST[idgroup]'";
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
	}
?>
  <script type="text/javascript">document.location = "index.php?modul=group";</script>
 <?php