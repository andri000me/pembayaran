<?php
$nim=$_GET['nim'];
include "config/koneksi.php";
$query="delete from orang_tua where nim='$nim'";
$hasil=mysql_query($query);
if($query){
		$alert = "<div class=\"alert alert-info alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-info\"></i>
                    <strong>Info!</strong> Data Berhasil Di Hapus.
                  </div>";
    $_SESSION['alert'] = $alert;
} else {
    $alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <i class=\"fa fa-ban fa-fw\"></i>
                <h4>Warning..!!</h4>
                Maaf, Data Gagal dihapus..!!
               
             </div>";
            $_SESSION['alert'] = $alert;
}
?>
    <script type="text/javascript">document.location = "index.php?modul=data_ortu";</script>
    <?php