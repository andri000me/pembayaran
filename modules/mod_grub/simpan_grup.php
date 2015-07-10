<?php
	//print_r($_POST);
	include "config/koneksi.php";
	$kode=$_POST['kode'];
	$nama=htmlspecialchars($_POST['nama']);
	
        $cekdata = "select idgroup from groub where idgroup = '$kode'";
$ada = mysql_query($cekdata)or die(mysql_error());
if(mysql_num_rows($ada)>0){
$alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <i class=\"fa fa-ban fa-fw\"></i>
                <h4>Warning..!!</h4>
                Maaf, Data yang Anda Masukkan Sudah Ada..!!
               
             </div>";
            $_SESSION['alert'] = $alert;
           
                
            //header("location:index.php?modul=datastaf");
 
}else{
	$sql="insert into groub values('$kode','$nama')";
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
    <script type="text/javascript">document.location = "index.php?modul=group";</script>
    <?php