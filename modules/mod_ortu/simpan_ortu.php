<?php
	//print_r($_POST);
	include "config/koneksi.php";
	$nim=$_POST['nim'];
	$nama=htmlspecialchars($_POST['nama']);
	$alamat=$_POST['alamat'];
        $status=$_POST['status'];
        $telpon=  $_POST['telpon'];
            
        $cekdata = "select nim from orang_tua where nim = '$nim'";
$ada = mysql_query($cekdata)or die(mysql_error());
if(mysql_num_rows($ada)>0){
$alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <i class=\"fa fa-ban fa-fw\"></i>
                <h4>Warning..!!</h4>
                Maaf, Data Mahasiswa yang Anda Masukkan Sudah Punya Wali..!!
               
             </div>";
            $_SESSION['alert'] = $alert;
           
                
            //header("location:index.php?modul=datastaf");
 
}else{
	$sql="insert into orang_tua values('$nama','$alamat','$status','$telpon','$nim')";
	$query = mysql_query($sql);
	if($query){
        
        $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-check\"></i>
                    <strong>Info!</strong> Data Berhasil Di Simpan.
                  </div>";
        $_SESSION['alert'] = $alert;
         //header("location:index.php?modul=datastaf");
}
}
 ?>
    <script type="text/javascript">document.location = "index.php?modul=data_ortu";</script>
    <?php