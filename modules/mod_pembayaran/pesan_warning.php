<?php

include 'config/koneksi.php';
$tujuan = $_POST['tujuan'];
$info = $_POST['info'];
 $a = mysql_query("SELECT * FROM pembayaran where status='$status'") or die(mysql_error());
    $b = mysql_fetch_array($a);
    $status = $b['status'];


$query = "select mahasiswa.nim,mahasiswa.no_hp,
          orang_tua.no_telpon,pembayaran.nama_mahasiswa,pembayaran.status FROM mahasiswa JOIN orang_tua ON
          mahasiswa.nim=orang_tua.nim JOIN pembayaran ON mahasiswa.nim=pembayaran.nim where pembayaran.status='Dispensasi';";
$hasil = mysql_query($query);
while ($r = mysql_fetch_array($hasil)) {
    
    $nomer1 = $r['no_hp'];
    $nomer2 = $r['no_telpon'];
    
    
       $sendSMS= mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer1', '$info', 'Gammu')");
        $sendSMS=mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$info', 'Gammu')");
    }  


 
        if ($sendSMS) {
           $alert = "<div class=\"alert alert-info alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-info\"></i>
                    <strong>Info!</strong> Info Peringatan Berhasil di Kirim...!!
                  </div>";
        $_SESSION['alert'] = $alert;
 
        } else {
           $alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <i class=\"fa fa-ban fa-fw\"></i>
                <h4>Warning..!!</h4>
                SMS Informasi Gagal Dikirim, Cek Pulsa atau koneksi Modem..!!
               
             </div>";
            $_SESSION['alert'] = $alert;
        }
        ?>
    <script type="text/javascript">document.location = "index.php?modul=datadispensasi";</script>
    <?php
    ?>
    