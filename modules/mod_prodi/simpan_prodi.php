<?php

//print_r($_POST);
include "config/koneksi.php";
$kode = $_POST['kode'];
$jenjang = $_POST['jenjang'];
$jurusan = $_POST['jurusan'];
$nama = $_POST['nama'];
$cekdata = "select kd_prodi from prodi where kd_prodi = '$kode'";
$ada = mysql_query($cekdata)or die(mysql_error());
if(mysql_num_rows($ada)>0){
$alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <i class=\"fa fa-ban fa-fw\"></i>
                <h4>Warning..!!</h4>
                Maaf, Data yang Anda Masukkan Sudah Ada..!!
               
             </div>";
            $_SESSION['alert'] = $alert;
 
}else{
$sql="insert into prodi values('$kode','$jenjang','$jurusan','$nama')";
$query = mysql_query($sql);
if ($query) {
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
    <script type="text/javascript">document.location = "index.php?modul=prodi";</script>
    <?php