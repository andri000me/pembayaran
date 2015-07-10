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
include "config/koneksi.php";
$nim = $_GET['nim'];
$sql = "select mahasiswa.nim,mahasiswa.nama_mahasiswa,mahasiswa.kd_prodi,
        pembayaran.tgl_bayar,pembayaran.jenis_pembayaran,pembayaran.semester,pembayaran.jumlah,pembayaran.`status`
        FROM mahasiswa INNER JOIN pembayaran ON
        mahasiswa.nim=pembayaran.nim where mahasiswa.nim='$nim' order by semester asc";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
//print_r($data);
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Data Pembayaran</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Data Pembayaran</li>
        </ol>
    </section>
    <section class="content-header" style="background:#EDEDED"><h1>
                        History Pembayaran <?php echo $data['nama_mahasiswa']?> 
                       <small></small> 
                    </h1></section>
    

    <!-- Main content -->
    <section class="content">
    <div class="row center">
            <div class="col-md-12 center">

        <!-- Small boxes (Stat box) -->
        <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <i class=" fa fa-file-text-o"></i>
                  <h3 class="box-title">List History Pembayaran <?php echo $data['nama_mahasiswa'] ?></h3>
                 
                
                
                
                
                
                
            </div><!-- /.box-header --><br>
             
                        <div class="col-xs-8 table-responsive">
                            <table>
                               
                                <tbody>
                                        <tr>
                                            
                                            <td><strong>NIM</strong></td>
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $data['nim']; ?></strong></td>

                                        </tr>
                                        <tr>
                                            
                                            <td><strong>Nama Mahasiswa</strong></td>
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $data['nama_mahasiswa']; ?></strong></td>

                                        </tr>
                                         <tr>
                                            
                                            <td><strong>Program Studi</strong></td>
                                            <td><strong>:</strong></td>
                                            <td><strong><?php echo $data['kd_prodi']; ?></strong></td>

                                        </tr>
                                </tbody>
                            </table>
                        
            </div><br/><br/>
            

            <div class="box-body table-responsive" id="data-mahasiswa">
            
                <table id="example2" class="table table-bordered table-striped">
                
                    <thead>
                        <tr>
                            <th>#</th>
                             <th>Tanggal Bayar</th>
                           
                            <th width="10%" align="center">Jenis Pembayaran</th>
                            
                            <th>Semester</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config/koneksi.php';
                        $i = 1;

                         $query = mysql_query($sql);
                                                while ($data = mysql_fetch_assoc($query)) {
                                                    $nim = $data['nim'];
                                                    $jumlah=number_format($data['jumlah']);
                                                    $status=$data['status'];
                                                    ?>
                            <tr class="">
                                <td><?php echo $i; ?></td>
                                <td><?php echo (DateToIndo("$data[tgl_bayar]")); ?></td>
                                
                                
                                <td><?php echo $data['jenis_pembayaran']; ?></td>
                                
                                <td><?php echo $data['semester']; ?></td>
                                <td>Rp.<?php echo $jumlah; ?></td>
                                <!-- <td><?php echo $status; ?></td> -->
                                <td>
                                    <?php
                                    if($status=="Lunas"){
                                    echo '<span class="badge bg-green"><i class="fa  fa-trophy" readonly></i> Lunas</span>';
                                        }
                                    elseif($status=="Dispensasi"){
                                    echo '<span class="badge bg-red"><i class="fa  fa-credit-card" readonly></i> Dispensasi</span>';
                                        }
                                        ?>
                                </td>

                                


                            </tr>
                            <?php
                            $i++;
                             
                        }
                        ?>


                    </tbody>

                </table>
                </div>

            </div><!-- /.box-body -->
            <!-- Main row -->
            </div>
            </div>

   

    </section><!-- /.Left col -->
    

</section><!-- /.content -->
</aside><!-- /.right-side -->

<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->

<!-- page script -->
<script type="text/javascript">
    $(function() {
        
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": true
        });
    });
</script>

