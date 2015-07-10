<?php
session_start();
// Define relative path from this script to mPDF
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=laporan_keuanganD3MI".date('dmY').".xls")
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<?php
include '../../config/koneksi.php';
?>
<html>

    <head>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
       
    </head>
    <body>
        <?php
        include '../../config/koneksi.php';
        $bulan=date("d-m-Y");
        
         $angkatan=$_GET['angkatan'];
         $prodi = $_GET['kd_prodi'];
         $status= $_GET['status'];
         $jenis=$_GET['jenis_pembayaran'];
         $periode=$_GET['periode'];
         $awal=$_GET['tgl_awal'];
         $akhir=$_GET['tgl_akhir'];

        //$sql = "select * from pembayaran where tgl_bayar='$akhir' and kd_prodi='S1TI' and angkatan='$angkatan' and jenis_pembayaran='$jenis' and status='$status'";
        $sql="select * from pembayaran where DATE_FORMAT(tgl_bayar,'%Y-%m-%d')>='$awal' and DATE_FORMAT(tgl_bayar,'%Y-%m-%d')<='$akhir' and kd_prodi='D3MI' and angkatan='$angkatan' and jenis_pembayaran='$jenis' and periode='$periode' and status='$status'";
        ?>
        
        ?>

     
        <!-- <img src="../../modules/laporan/header2.png" style="width:1000px;height:100px; margin-center: 200px" align="center"><br> -->
        <h3 align="center">Rekapitulasi Pembayaran Biaya Kuliah</h3>
        
        <h4>
        <div class="col-xs-10 table-responsive">
        <table class="table table-striped">
                               
                                <tbody>
                                        <tr>
                                            <td><strong>Program Studi</strong></td>
                                            
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $prodi; ?></strong></td>

                                        </tr>
                                        <tr>
                                            <td><strong>Status</strong></td>
                                            
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $status; ?></strong></td>

                                        </tr>

                                        <tr>
                                            <td><strong>Status</strong></td>
                                            
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $jenis; ?></strong></td>

                                        </tr>
                                        <tr>
                                            <td><strong>Angkatan</strong></td>
                                           
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $angkatan; ?></strong></td>

                                        </tr>

                                        <tr>
                                            <td><strong>Periode</strong></td>
                                           
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $periode; ?></strong></td>

                                        </tr>
                                        <tr>
                                            <td><strong>Periode Tanggal</strong></td>
                                           
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $awal ?> sampai <?php echo $akhir?></td>

                                        </tr>
                                    </tbody>
                            </table>
                            </strong>
                            </div>
        </h4>
        <table align="center" border="1">
                                           
                    <thead>
                        <tr font="Arial"> 

                            <th align="center">Tanggal Bayar</th>
                            <th align="center">Nim Mahasiswa</th>
                            <th align="center">Nama Mahasiswa</th>
                            <th align="center">Semester</th>
                            <th align="center">Jumlah</th>
                            <th align="center">Denda</th>
                           
                            
                            <th align="center" colspan="2">Kode Staf</th>
                        </tr>
                        </thead>
                                            <tbody>
                                                <?php
                                                include '../../config/koneksi.php';



                                                $query = mysql_query($sql);
                                                while ($row = mysql_fetch_assoc($query)) {
                                                    $nim = $row['nim'];
                                                    
                                                    ?>

                                                    <tr>
                                                    

                                                        <!--td><?php //echo $no; ?></td-->
                                                        <td><?php echo $row['tgl_bayar'] ?></td>
                                                        <td><?php echo $row['nim'] ?></td>
                                                        <td width="20%" align="left" font-size: 10pt;><?php echo $row['nama_mahasiswa'] ?></td>
                                                        <td width="10%" align="left"><?php echo $row['semester'] ?></td>
                                                        <td width="10%" align="left"><?php echo $row['jumlah'] ?></td>
                                                        <td width="10%" align="left"><?php echo $row['jumlah'] ?></td>
                                                        
                                                        <td colspan="2" width="5%" align="left"><?php echo $row['kd_staf'] ?></td>
                                                        

                                                        
                                                    </tr>

                                                        <?php
                                                    }
                                                    ?>
                                                         
                                                        <tr>
                                                          
                                                          <td colspan="5"><h4>Total</h4></td>
                                                         <?php 

                                                                $sql1="SELECT SUM(jumlah) AS total_uang FROM pembayaran where kd_prodi='D3MI' and angkatan='$angkatan' and jenis_pembayaran='$jenis' and DATE_FORMAT(tgl_bayar,'%Y-%m-%d')>='$awal' and DATE_FORMAT(tgl_bayar,'%Y-%m-%d')<='$akhir' and periode='$periode'";
                                                            //$sql1 = "SELECT SUM(jumlah) AS total_uang FROM pembayaran ";
                                                                $result = mysql_query($sql1) or die (mysql_error());
                                                                $t = mysql_fetch_array($result);
                                                                $biaya=($t['total_uang']);
                                                                $total=number_format($t['total_uang']);
                                                            echo "<td>Rp " . $total . " </td>";
                                                            $sql2 = "SELECT SUM(denda) AS total_denda FROM pembayaran where kd_prodi='D3MI' and angkatan='$angkatan' and jenis_pembayaran='$jenis' and DATE_FORMAT(tgl_bayar,'%Y-%m-%d')>='$awal' and DATE_FORMAT(tgl_bayar,'%Y-%m-%d')<='$akhir' and periode='$periode'";
                                                                    $result1 = mysql_query($sql2) or die (mysql_error());
                                                                    $t1 = mysql_fetch_array($result1);
                                                                    $biaya1=($t1['total_denda']);
                                                                echo "<td colspan='2'> <h5>Rp. " . number_format($t1['total_denda']) . " </h5></td>";
                                                             // $terbilang = new Terbilang($t);
                                                            
                                                             // echo $terbilang 
                                                            ?>

                                                        </tr>
                                                        <tr>
                                                          
                                                          <td colspan="5"><h4>Total Keseluruhan<h4></td>
                                                          <?php 
                                                                $subtotal=$biaya+$biaya1;
                                                                echo "<td colspan='3' align='left'><h3>Rp " .number_format($subtotal) . "</h3></td>";
                                                            ?>
                                                        <!--   <td colspan="3">@twitter</td> -->
                                                          
                                                        </tr>
                                            </tbody>   
                                        </table>
                                        <table class="table table-condensed">
              <thead>
              <!-- <tr>
         
                    <td width="33%">Mataram, <?php echo(DateToIndo(date('Y m d')));?></td>
                 </tr> -->
                <tr>
                  
                  <th>Mataram, <?php echo(DateToIndo(date('Y m d')));?></th>
                  
                </tr>
              
  </table>
                                        <table class="table table-condensed">
              <thead>
                <tr>
                  
                  <th align="center">Staf Keuangan</th>
                  <th align="center">Kabag Keuangan dan Adum</th>
                  <th align="center">Mengetahui<br/>Pembantu Ketua II</th>
                <th align="center">Mengetahui<br/>Ketua<br/>Ketua STMIK Bumigora</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                 
                  <td align="center"><br/><br/><br/><?php echo $_SESSION['nama']; ?><br/>Nik <?php echo $_SESSION['kode']; ?></td>
                  <td align="center"><br/><br/><br/>Riadatul Jannah<br/>NIK 98.8912</td>
                  <td align="center"><br/><br/><br/>I Gusti Ayu Dasriani<br/>NIK 10.009012</td>
                  <td align="center"><br/><br/><br/>Ir Anthony Anggrawan, MT., PhD<br/>NIP 1278318927381792</td>
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
</body>

</html>
<!--CONTOH Code END-->