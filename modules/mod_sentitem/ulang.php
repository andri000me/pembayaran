<?php

mysql_connect('localhost', 'root', '');
mysql_select_db("db_layanan");

// $id = array();

// var_dump($_POST);

$id = $_POST['id'];
print_r($id);

foreach ($id as $key => $value) {

    $a = mysql_query("SELECT * FROM sentitems where ID='$value'") or die(mysql_error());
    while($hsl = mysql_fetch_array($a)) {
        $tujuan = $hsl['DestinationNumber'];
        $pesanSMS =  $hsl['TextDecoded'];
        $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$tujuan', '$pesanSMS', 'Gammu')");
        // $send = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$pesanSMS', 'Gammu')");
    $query=mysql_query("delete from sentitems where ID='$value'");
    }
        
 
       ?>
        <script>
            alert('Brhasil Dikrim Ulang..!!');
            window.location = 'http://localhost/SMS/pembayaran/index.php?modul=gagal';
        </script>

        <?php
    }
  

       
   

  