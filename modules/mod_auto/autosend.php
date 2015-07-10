<html>
<head>

   <!-- refresh script setiap 10 detik -->
   <meta http-equiv="refresh" content="10; url=<?php $_SERVER['PHP_SELF']; ?>">
</head>
<body>

<?php

// koneksi ke database mysql
include 'config/koneksi.php';
include_once 'auto.php';


// baca tanggal sekarang
$tglNow = date("d");
// baca bulan sekarang
$blnNow = date("m");
// baca tahun-bulan-tanggal sekarang
$now = date("Y-m-d");

echo "Tanggal   : ".$tglNow."<br/>";
echo "Bulan     : ".$blnNow."<br/>";
echo "Sekarang  : ".$now."<br/>";


$query = "SELECT * FROM informasi WHERE Proses='False' and tanggal='$now'";
$hasil1= mysql_query($query);
while ($data = mysql_fetch_array($hasil1))
{echo "Berhasil <br/>";
	
	$info=$data['info'];
    $tujuan=$data['tujuan'];
	$tanggal=$data['tanggal'];
        $a = mysql_query("SELECT * FROM mahasiswa where angkatan='$tujuan'") or die(mysql_error());
    $b = mysql_fetch_array($a);
    $angkatan = $b['angkatan'];
	echo "jumlah yang false dan tanggal : $now <br/>";
			if ($tujuan=="Semua" && $tanggal=="$now"){
					$query3= "select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,
                                                  orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                                                  mahasiswa.nim=orang_tua.nim";
					$hasil2=mysql_query($query3);
					while ($data1= mysql_fetch_array($hasil2)){
					echo "Keuangan";
						$nomer= $data1['no_hp'];
                        $nomer2 = $data1['no_telpon'];
						
						$pesanSMS = "Keuangan Info:".$info."";
						echo "$pesanSMS";
						// proses kirim sms via insert data ke tabel outbox
						$query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer', '$pesanSMS', 'Gammu')";
                                                mysql_query($query2);
                                                $query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$pesanSMS', 'Gammu')";
						mysql_query($query2);
						$query3= "UPDATE informasi SET Proses = 'True' WHERE tanggal = '$now'";
						$hasil3= mysql_query($query3);} 
			
			}else if ($tujuan==$angkatan && $tanggal=="$now"){
					$query3= "select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,
                                                  orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                                                  mahasiswa.nim=orang_tua.nim where mahasiswa.angkatan='$angkatan'";
					$hasil2=mysql_query($query3);
					while( $data1= mysql_fetch_array($hasil2)){
							echo "@Keuangan </br>";
							$nomer= $data1['no_hp'];
                                                        $nomer2= $data1['no_telpon'];
							$pesanSMS = "Keuangan Info:".$info.",Konfirmasi Ketik Cek#Nama Mahasiswa#Jenis Pembayaran#Semester.Terima Kasih";
							echo"$pesanSMS";
							$query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer', '$pesanSMS', 'Gammu')";
                                                        mysql_query($query2);
                                                        $query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$pesanSMS', 'Gammu')";
							mysql_query($query2);
							$query3= "UPDATE informasi SET Proses = 'True' WHERE tanggal = '$now'";
							mysql_query($query3);
							
							}

			}else if ($tujuan=="S1" && $tanggal=="$now"){
					$query3= "select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,mahasiswa.idgroup,
                    orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                    mahasiswa.nim=orang_tua.nim";
					$hasil2=mysql_query($query3);
					while( $data1= mysql_fetch_array($hasil2)){
							echo "@Keuangan </br>";
							$nomer= $data1['no_hp'];
                            $nomer2= $data1['no_telpon'];
							$pesanSMS = "Keuangan Info:".$info.",Konfirmasi Ketik Cek#Nama Mahasiswa#Jenis Pembayaran#Semester.Terima Kasih";
							echo"$pesanSMS";
							$query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer', '$pesanSMS', 'Gammu')";
                                                        mysql_query($query2);
                                                        $query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$pesanSMS', 'Gammu')";
							mysql_query($query2);
							$query3= "UPDATE informasi SET Proses = 'True' WHERE tanggal = '$now'";
							mysql_query($query3);
							
							}
							
   
    
	

}else if ($tujuan=="D3" && $tanggal=="$now"){
					$query3= "select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,mahasiswa.idgroup,
                    orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                    mahasiswa.nim=orang_tua.nim";
					$hasil2=mysql_query($query3);
					while( $data1= mysql_fetch_array($hasil2)){
							echo "@Keuangan </br>";
							$nomer= $data1['no_hp'];
                            $nomer2= $data1['no_telpon'];
							$pesanSMS = "Keuangan Info:".$info.",Konfirmasi Ketik Cek#Nama Mahasiswa#Jenis Pembayaran#Semester.Terima Kasih";
							echo"$pesanSMS";
							$query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer', '$pesanSMS', 'Gammu')";
                                                        mysql_query($query2);
                                                        $query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$nomer2', '$pesanSMS', 'Gammu')";
							mysql_query($query2);
							$query3= "UPDATE informasi SET Proses = 'True' WHERE tanggal = '$now'";
							mysql_query($query3);
							
							}
							
   
    
	

}
}

?>

</body>
</html>