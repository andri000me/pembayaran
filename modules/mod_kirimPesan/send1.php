<?php

include 'config/koneksi.php';
$tujuan = $_POST['tujuan'];
$message = $_POST['message'];
 $a = mysql_query("SELECT * FROM mahasiswa where angkatan='$tujuan'") or die(mysql_error());
    $b = mysql_fetch_array($a);
    $angkatan = $b['angkatan'];


$query = "select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,mahasiswa.idgroup,
                    orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                    mahasiswa.nim=orang_tua.nim";
$hasil = mysql_query($query);
while ($r = mysql_fetch_array($hasil)) {
    
    $nomer1 = $r['no_hp'];
    $nomer2 = $r['no_telpon'];
    $group = explode('|', $r['idgroup']);
    if (in_array($tujuan, $group)) {
        mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer1', '$message', 'Gammu')");
        mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$message', 'Gammu')");
    }  
}

 if ($tujuan == $angkatan) {
            $sql = "select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,
                    orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                    mahasiswa.nim=orang_tua.nim where mahasiswa.angkatan='$angkatan'";
            $query = mysql_query($sql);
            while ($hasil = mysql_fetch_array($query)) {
                $nomer1 = $hasil['no_hp'];
                $nomer2 = $hasil['no_telpon'];
                
                $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$nomer1', '$message')");
                $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$nomer2', '$message')");
            }

        } else if ($tujuan == 'Semua') {
            $sql = "select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,
                    orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                    mahasiswa.nim=orang_tua.nim;";
            $query = mysql_query($sql);
            while ($hasil = mysql_fetch_array($query)) {
                $nomer1 = $hasil['no_hp'];
                $nomer2 = $hasil['no_telpon'];
                $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded)VALUES ('$nomer1', '$message')");
                $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded)VALUES ('$nomer2', '$message')");
            }
        }

        if ($sendSMS) {
           $alert = "<div class=\"alert alert-info alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-info\"></i>
                    <strong>Info!</strong> Info Berhasil di Kirim...!!
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
    <script type="text/javascript">document.location = "index.php?modul=kirimpesan";</script>
    <?php
    ?>
    