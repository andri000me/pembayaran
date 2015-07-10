<html>
<head>

   <!-- refresh script setiap 10 detik -->
   <meta http-equiv="refresh" content="20; url=<?php $_SERVER['PHP_SELF']; ?>">
</head>
<body>
<?php
//koneksi ke mysql dan db nya
include 'config/koneksi.php';
include "autosend.php";
function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
     // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
    $BulanIndo = array("Januari", "Februari", "Maret",
     "April", "Mei", "Juni",
     "Juli", "Agustus", "September",
     "Oktober", "November", "Desember");
    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    return($result);
  }
// query untuk membaca SMS yang belum diproses
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
$sql2= mysql_query("select * from mahasiswa");
$b = mysql_fetch_array($sql2);
    $nim_mahasiswa = $b['nim'];
   
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
	$id = $data['ID'];
	$noPengirim = $data['SenderNumber'];
	$SMS = strtoupper($data['TextDecoded']);
	$pecah = explode("#",$SMS);
	if ($pecah[0] == "INFO"){
		
		$tujuan=$pecah[1];
		$query2 = "SELECT * FROM informasi where tujuan='$tujuan' AND Proses='False'";
		$hasil2 = mysql_query($query2);
		while ($data2= mysql_fetch_array($hasil2)){
			$info=$data2['info'];
			$reply = "Keuangan Info:".$info;
			$query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'Gammu')";
			$hasil3 = mysql_query($query3);
			$query = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
			mysql_query($query);
		}

	}else if ($pecah[0] == "CEK"){
		$nim		=		$pecah[1];
		$jenis      =		$pecah[2];
		$smt        = 		$pecah[3];
		if ($nim=="")  
		{$reply	= " Format Anda salah Ketik Cek#Nim Mahasiswa#Jenis Pembayaran.Terima Kasih";}
		  else if($jenis==""){$reply	= "Format Anda salah Ketik Cek#Nim Mahasiswa#Jenis Pembayaran.Terima Kasih";
		}
		$cek= mysql_query("select * from pembayaran where nim='$nim' and jenis_pembayaran='$jenis' and semester='$smt'");
		if(mysql_num_rows($cek)==0) $reply="Mahasiswa dengan nim ".$nim." belum melakukan pembayaran ".$jenis." utk semester ".$smt.". Konfirmasi Ketik Cek#Nim Mahasiswa#Jenis Pembayaran#Semester.Terima Kasih";
		else
		{
			$data2=mysql_fetch_array($cek);
			$tgl=DateToIndo($data2['tgl_bayar']);
			$nim=$data2['nim'];
			$nama=$data2['nama_mahasiswa'];
			$prodi=$data2['kd_prodi'];
			$jenis=$data2['jenis_pembayaran'];
			$smt=$data2['semester'];
			$jumlah=number_format($data2['jumlah']);
			// $jumlah=$data2['jumlah'];
			$status=$data2['status'];
			if($status=="Lunas"){
				$reply= "Keuangan Info:Mahasiswa atas Nama  ".$nama.", telah melakukan pembayaran ".$jenis." semester ".$smt." pada tgl  ".$tgl." dengan jumlah Rp ".$jumlah." ".$status."";
			}elseif ($status=="Dispensasi") {
				$reply= "Info:Mahasiswa atas Nama ".$nama.",tlh mengurus Dispensasi ".$jenis." utk semester ".$smt." sejumlah Rp ".$jumlah.",dan bts pembayaran ".$tgl.".Silahkan lunasi sblm jatuh tempo.";
			}else{
				$reply="Info:Mahasiswa atas Nama ".$nama.", Belum melakukan Pembayaran Apapun.Terima Kasih";
			}
			
		}
	
				$query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'Gammu')";
				$hasil3 = mysql_query($query3);
				$query = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
				mysql_query($query);
	}else if ($pecah[0] == "REQ"){
		$jenis_info		=		$pecah[1];
		$periode      =		$pecah[2];
		$cek= mysql_query("select * from informasi where jenis_info='$jenis_info' and periode='$periode'");
		if(mysql_num_rows($cek)==0) $reply="Info tidak ditemukan atau Format Anda salah Ketik REQ#Jenis Info#Periode(Genpa/Ganjil)";
		else
		{
			$data2=mysql_fetch_array($cek);
			$jenis_info=$data2['jenis_info'];
			$periode=$data2['periode'];
			$tanggal=DateToIndo($data2['tanggal']);
			$tgl_bts=DateToIndo($data2['tgl_bts']);
			
			//print_r($pecah);
			$reply= "Info:Pembayaran ".$jenis_info." Periode ".$periode." paling lambat tgl ".$tgl_bts.".Terima Kasih";
			
			
		}
	
				$query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'Gammu')";
				$hasil3 = mysql_query($query3);
				$query = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
				mysql_query($query);
	}elseif($pecah[0]== "HELP"){
		$help = $pecah[1];
		$reply="Untuk Format cek jadwal pembayaran ketik REQ#Jenis Info#Periode(Genap/Ganjil),utk status pembayaran ketik CEK#nim#jenis pembayaran(SPP,SKS,DPP)#semester.terima kasih";

	
	$query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'Gammu')";
		$hasil3 = mysql_query($query3);
		$query = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
		mysql_query($query);
	
	}else {$reply = "Maaf Keyword Salah Untuk Bantuan, Ketik Help";
	
	
		$query3 = "INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$noPengirim', '$reply', 'Gammu')";
		$hasil3 = mysql_query($query3);
		$query = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
		mysql_query($query);}
	}

?>
</body>
</html>