<?php
	//print_r($_POST);
	include "config/koneksi.php";
	$nomer1=$_POST['nomer'];
        $nomer2=$_POST['nomer'];
	$pesan=mysql_real_escape_string(htmlspecialchars($_POST['pesan']));
         $sql = "select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,
                    orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                    mahasiswa.nim=orang_tua.nim where no_hp='$nomer1'";
            $query = mysql_query($sql);
            while ($hasil = mysql_fetch_array($query)) {
                $nomer1 = $hasil['no_hp'];
                $nomer2 = $hasil['no_telpon'];
                
                $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$nomer1', '$pesan')");
                $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$nomer2', '$pesan')");
            }
            
	if($sendSMS){
         $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-check\"></i>
                    <strong>Info!</strong> SMS Informasi Berhasil Dikirim..!!
                  </div>";
        $_SESSION['alert'] = $alert;

 

}
        ?>
    <script type="text/javascript">document.location = "index.php?modul=kirimpesan";</script>
    <?php
    ?>