<?php

	include "config/koneksi.php";
	$info=$_POST['info'];
    $jenis=$_POST['jenis'];
    $periode=$_POST['periode'];
	$tujuan=$_POST['tujuan'];
	$tanggal=$_POST['tanggal'];
        $batas = $_POST['batas'];
	$sql="insert into informasi(jenis_info,periode,info,tujuan,tanggal, tgl_bts)
	values('$jenis','$periode','$info','$tujuan','$tanggal', '$batas')";
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
 ?>
    <script type="text/javascript">document.location = "index.php?modul=Informasi";</script>
    <?php