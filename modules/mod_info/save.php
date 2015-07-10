<?php

mysql_connect('localhost', 'root', '');
mysql_select_db("db_layanan");

$id = $_POST['id'];

foreach ($id as $key => $value) {
    $a = mysql_query("SELECT * FROM informasi where id='$value'") or die(mysql_error());
    $b = mysql_fetch_array($a);
    $angkatan = $b['tujuan'];
    $pesanSMS =  "Mengingatkan Kembali: ".$b['info'];
    $query3 = mysql_query("select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa, orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON mahasiswa.nim=orang_tua.nim where mahasiswa.angkatan='$angkatan'");
    while($hsl = mysql_fetch_array($query3)) {
        $nomer = $hsl['no_hp'];
        $nomer2 = $hsl['no_telpon'];
        $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer', '$pesanSMS', 'Gammu')");
        $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$pesanSMS', 'Gammu')");
    }
    if($angkatan=="Semua"){
        $pesanSMS =  "Mengingatkan Kembali: ".$b['info'];
    $query3 = mysql_query("select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa, orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON mahasiswa.nim=orang_tua.nim");
    while($hsl = mysql_fetch_array($query3)) {
        $nomer = $hsl['no_hp'];
        $nomer2 = $hsl['no_telpon'];
        $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer', '$pesanSMS', 'Gammu')");
        $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$pesanSMS', 'Gammu')");
    }
    }elseif($angkatan=="S1"){
        $pesanSMS =  "Mengingatkan Kembali: ".$b['info'];
    $query3 = mysql_query("select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,mahasiswa.idgroup,
                    orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                    mahasiswa.nim=orang_tua.nim where mahasiswa.idgroup='S1'");
    while($hsl = mysql_fetch_array($query3)) {
        $nomer = $hsl['no_hp'];
        $nomer2 = $hsl['no_telpon'];
        $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer', '$pesanSMS', 'Gammu')");
        $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$pesanSMS', 'Gammu')");
    }
    }elseif($angkatan=="D3"){
        $pesanSMS =  "Mengingatkan Kembali: ".$b['info'];
    $query3 = mysql_query("select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,mahasiswa.idgroup,
                    orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                    mahasiswa.nim=orang_tua.nim where mahasiswa.idgroup='D3'");
    while($hsl = mysql_fetch_array($query3)) {
        $nomer = $hsl['no_hp'];
        $nomer2 = $hsl['no_telpon'];
        $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer', '$pesanSMS', 'Gammu')");
        $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$pesanSMS', 'Gammu')");
    }
    }
    
    if($send) {
       ?>
        <script>
            alert('Brhasil Dikrim Ulang..!!');
            window.location = 'http://localhost/SMS/pembayaran/index.php?modul=Informasi';
        </script>
        <?php
       
    }
    
}