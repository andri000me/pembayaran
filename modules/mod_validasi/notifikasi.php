<?php
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

//print_r($_POST);
include "config/koneksi.php";
$nim = $_POST['nim'];
$nama_mhs = htmlspecialchars($_POST['nama_mhs']);
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$jenis = $_POST['jenis'];
$periode = $_POST['periode'];
$semester= $_POST['semester'];
$tanggal = $_POST['tanggal'];
//$jumlah = number_format($_POST['jumlah'],0,",",".");
$jumlah=$_POST['jumlah'];
$denda=$_POST['denda'];
$total=$_POST['total'];
$status = $_POST['status'];
$staf = $_POST['staf'];
     $valid ="insert into pembayaran values('','$tanggal','$nim','$nama_mhs','$prodi','$angkatan','$jenis','$periode','$semester','$jumlah','$denda','$total','$status','$staf')";
     $query2=  mysql_query($valid);
    
    $test=mysql_query("select * from pembayaran where nim='$nim'");
     $b = mysql_fetch_array($test);
    $c=DateToIndo($b['tgl_bayar']);
    $d=number_format($b['total_bayar']);
    $f=number_format($b['jumlah']);
     if ($status == "Lunas") {
         
            $sql = "select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,
                    orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                    mahasiswa.nim=orang_tua.nim where mahasiswa.nama_mahasiswa='$nama_mhs'";
            $query = mysql_query($sql);
            while ($hasil = mysql_fetch_array($query)) {
                $nomer1 = $hasil['no_hp'];
                $nomer2 = $hasil['no_telpon'];
                $reply	= "Terima Kasih ".$nama_mhs." Telah Melakukan pembayaran ".$jenis." utk semester ".$semester.", pada tgl ".$c." sejumlah Rp ".$d." dengan Status ".$status;
                $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$nomer1', '$reply')");
                $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$nomer2', '$reply')");
            }
     }elseif ($status=="Dispensasi") {
          $sql = "select mahasiswa.nim,mahasiswa.no_hp,mahasiswa.nama_mahasiswa,
                    orang_tua.no_telpon FROM mahasiswa INNER JOIN orang_tua ON
                    mahasiswa.nim=orang_tua.nim where mahasiswa.nama_mahasiswa='$nama_mhs'";
            $query = mysql_query($sql);
            while ($hasil = mysql_fetch_array($query)) {
                $nomer1 = $hasil['no_hp'];
                $nomer2 = $hasil['no_telpon'];
                $reply	= "Terima Kasih ".$nama_mhs." tlh Mengurus Dispensasi ".$jenis." utk semester ".$semester.", Batas waktu tgl ".$c." sejumlah Rp ".$f.",silahkan lakukan pembayaran sblm jatuh tempo";
                $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$nomer1', '$reply')");
                $sendSMS = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('$nomer2', '$reply')");
            }
         
    
}

 if ($sendSMS) {
            $alert = "<div class=\"alert alert-info alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-info\"></i>
                    <strong>Info!</strong> Pembayaran Mahasiswa $nama_mhs Sudah di Validasi..!!
                  </div>";
        $_SESSION['alert'] = $alert;
 }
 
        ?>
    <script type="text/javascript">document.location = "index.php?modul=validasi";</script>
    <?php
    ?>