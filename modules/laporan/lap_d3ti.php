<?php
session_start();
if (!isset($_SESSION['login-admin']))
    header("location:login.php");
// Define relative path from this script to mPDF
$nama_dokumen = 'Rekap data Pembayaran'; //Beri nama file PDF hasil.

include('../../library/mpdf.php');


$mpdf=new mPDF('utf-8', 'A4-L'); // Create new mPDF Document
$mpdf=new mPDF('utf-8', array(190,236));
$mpdf=new mPDF('','', 0, '', 15, 15, 16, 16, 9, 9, 'L');
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<?php
include '../../config/koneksi.php';
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
?>
<html>

    <head>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <title>Laporan Data Pembayaran Mahasiswa</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- daterange picker -->
        <link href="../../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="../../css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="../../css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="../../css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <!-- Theme style -->
        <link href="./.../css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <?php
        include '../../config/koneksi.php';
        $bulan=date("d-m-Y");
        
        

        $sql = "select * from pembayaran where kd_prodi='D3TI' order by nim asc";
        
        ?>

        <img src="../../modules/laporan/header2.png" style="width:1000px;height:100px; margin-center: 200px" align="center"><br>
        <h3 align="center">Rekapitulasi Pembayaran Biaya Kuliah</h3>
        
        <h4>
         <div class="col-xs-3 table-responsive">
        <table class="table table-striped">
                               
                                <tbody>
                                        <tr>
                                            <td><strong>Program Studi</strong></td>
                                            
                                            <td><strong>:</strong></td>
                                            <td><strong>D3TI</strong></td>

                                        </tr>
                                        <tr>
                                            <td><strong>Jenis</strong></td>
                                            
                                            <td><strong>:</strong></td>
                                            <td><strong>Semua Jenis</strong></td>

                                        </tr>

                                        
                                        
                                    </tbody>
                            </table>
                            </div>
        </h4>
        
         <div class="box-body table-responsive">

                <table class="table table-bordered table-hover" autosize="3">

                    <thead  color="#7fffd4">
                        <tr font="Arial"> 

                            <th align="center">No</th>
                            <th align="center">Tanggal Bayar</th>
                            <th align="center">Nim</th>
                            <th align="center">Nama Mahasiswa</th>
                            
                            <th align="center">Angkatan</th>
                            <th align="center">Jenis Pembayaran</th>
                            <th align="center">Periode</th>
                            <th align="center">Semester</th>
                            <th align="center">Jumlah</th>
                            <th align="center">Denda</th>
                            <th align="center">Status</th>
                            <th align="center">Kode Staf</th>
                        </tr>
                        </thead>
                                            <tbody>
                                                <?php
                                                $no=1;
                                                include '../../config/koneksi.php';



                                                 $query = mysql_query($sql);
                                                while ($row = mysql_fetch_assoc($query)) {
                                                    $nim = $row['nim'];
                                                    $jumlah=number_format($row['jumlah']);
                                                    $denda=number_format($row['denda']);
                                                   
                                                    ?>

                                                    <tr>
                                                    <td width="3%" align="left"><?php echo $no; ?></td>

                                                        <!--td><?php echo $no; ?></td-->
                                                        <td  width="10%" align="left"><?php echo (DateToIndo("$row[tgl_bayar]")); ?></td>
                                                        <td  width="10%" align="left"><?php echo $row['nim'] ?></td>
                                                        <td width="20%" align="left" font-size: 10pt;><?php echo $row['nama_mahasiswa'] ?></td>
                                                       
                                                        <td width="10%" align="left"><?php echo $row['angkatan'] ?></td>
                                                        
                                                        <td width="10%" align="left"><?php echo $row['jenis_pembayaran'] ?></td>
                                                        <td width="10%" align="left"><?php echo $row['periode'] ?></td>
                                                        <td width="7%" align="left"><?php echo $row['semester'] ?></td>
                                                        <td width="10%" align="left">Rp <?php echo $jumlah ?></td>
                                                        <td width="10%" align="left">Rp <?php echo $denda ?></td>
                                                        <td width="10%" align="left"><?php echo $row['status'] ?></td>
                                                        
                                                        <td width="5%" align="left"><?php echo $row['kd_staf'] ?></td>
                                                        

                                                        
                                                    </tr>


                                                <?php
                                                $no++;
                                            }
                                                ?>
                                                <tr>
                                                          
                                                          <td colspan="8"><h4>Total<h4></td>
                                                          <?php 

                                                                $sql1 = "SELECT SUM(jumlah) AS total_uang FROM pembayaran where kd_prodi='D3TI' ";
                                                                    $result = mysql_query($sql1) or die (mysql_error());
                                                                    $t = mysql_fetch_array($result);
                                                                    $biaya=($t['total_uang']);
                                                                echo "<td colspan='1'> <h5>Rp. " . number_format($t['total_uang']) . " </h5></td>";
                                                            $sql2 = "SELECT SUM(denda) AS total_denda FROM pembayaran where kd_prodi='D3TI' ";
                                                                    $result1 = mysql_query($sql2) or die (mysql_error());
                                                                    $t1 = mysql_fetch_array($result1);
                                                                    $biaya1=($t1['total_denda']);
                                                                echo "<td colspan='3'> <h5>Rp. " . number_format($t1['total_denda']) . " </h5></td>";
                                                             // $terbilang = new Terbilang($t);
                                                            
                                                             // echo $terbilang 
                                                            ?>
                                                        <!--   <td colspan="3">@twitter</td> -->
                                                          
                                                        </tr>
                                                        <tr>
                                                            <td colspan="8"><h3>Total Keseluruhan</h3></td>
                                                            <?php 
                                                                $subtotal=$biaya+$biaya1;
                                                                echo "<td colspan='4' align='left'><h3>Rp " .number_format($subtotal) . "</h3></td>";
                                                            ?>
                                                        </tr>
                                            </tbody>   
                                        </table>
                                       
<table class="table table-condensed">
              <thead>
              <!-- <tr>
         
                    <td width="33%">Mataram, <?php echo(DateToIndo(date('Y m d')));?></td>
                 </tr> -->
                <tr>
                  
                  <th align="right">Mataram, <?php echo(DateToIndo(date('Y m d')));?></th>
                  
                </tr>
              
  </table>
<table class="table table-condensed">
              <thead>
                
                 <tr>
                  
                  <th align="center">Mengetahui,<br/>Ketua</th>
                  <th align="center">Setuju diteruskan ke Ketua,<br/>Pembantu Ketua II</th>
                <th align="center">Telah diperiksa dan Setuju diteruskan,<br/>Kepala Bagian Keuangan</th>
                <th align="center">Pelaksana,<br/>Staf Keuangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                 
                 
                   <td align="center"><br/><br/><br/>(Ir Anthony Anggrawan, MT,. P.hD)<br/>NIP 196112261994031001</td>
                  <td align="center"><br/><br/><br/>(Ni Gusti Ayu Dasriani, S.Kom)<br/>NIK 10.5.133</td>
                  <td align="center"><br/><br/><br/>(Riadatul Jannah, SE)<br/>NIk 12.5.182</td>
                   <td align="center"><br/><br/><br/>(<?php echo $_SESSION['nama']; ?>)<br/>NIK <?php echo $_SESSION['kode']; ?></td>
                </tr>
                
                <tr>
                  
                  <td></td>
                  <td align="center"></td>
                  <td align="center"></td>
                  <td align="center"></td>
                  <td align="center"></td>
                  <td align="center"></td>
                  <td align="center"></td>
                </tr>
                <tr>
                  
                  <td colspan="2"></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
                                        </div>
</body>

</html>
<!--CONTOH Code END-->
<?php

$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->setFooter('{PAGENO}');
$mpdf->Output($nama_dokumen . ".pdf", 'I');
exit;
?>