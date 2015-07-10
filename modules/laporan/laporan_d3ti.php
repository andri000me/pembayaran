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
                        Laporan Data Pembayaran Mahasiswa |
                         <small>Program Studi : D3 TI</small>
                        
                    </h1></section>
    <section class="content-header">                    
                    <form method="post">


                        <div class="box-body">

                            <div class="row">
                                <div class="col-xs-1">
                                    <label>Prodi</label><br>
                                    <label>
                                        <input required=""  value="D3TI"type="radio" name="prodi" class="flat-red" />
                                        D3 TI
                                    </label>

                                </div>
                                <div class="col-xs-2">
                                    <label>Status</label><br>
                                    <label>
                                        <input required=""  value="Lunas"type="radio" name="status" class="flat-red" />
                                        Lunas
                                    </label>

                                    <label>
                                        <input required=""  value="Dispensasi" type="radio" name="status" class="flat-red"/>
                                        Dispensasi
                                    </label>
                                </div>
                                
                                <!--                                <div class="col-xs-2">
                                                                    <label>Periode</label><br>
                                                                    <label> 1<input  value="1"type="checkbox" name="periode"   /></label>
                                                                    <label> 2<input  value="2"type="checkbox" name="periode"   /></label><br>
                                                                </div>-->
                                <div class="col-xs-2">
                                    <label>Jenis Pembayaran</label>
                                  
                                    <select required="" name="jenis" class="form-control">
                                        <option value="">Jenis Pembayaran</option>
                                        <option value="SPP" >SPP</option>
                                        <option value="SKS" >SKS</option>
                                        <option value="Laboratorium">Laboratorium</option>
                                       
                                        <option value="DPP" >DPP</option>
                                        <option value="Skripsi/TA" >Skripsi/TA</option>
                                        
                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <label>Angkatan</label>
                                  
                                    <select required="" name="angkatan" class="form-control">
                                        <option value="">Pilih Angkatan</option>
                                        <option value="2011" >2011</option>
                                        <option value="2012" >2012</option>
                                        <option value="2013" >2013</option>
                                        <option value="2014" >2014</option>
                                        <option value="2015" >2015</option>
                                        <option value="2016" >2016</option>
                                        <option value="2017" >2017</option>
                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <label>Dari Tanggal</label><br>
                                    <input value="awal" type="date" name="awal" class="form-control" />
                                </div>
                                <div class="col-xs-2">
                                     <label>Sampai Tanggal</label>
                                     <input value="akhir" type="date" name="akhir" class="form-control" />
                                </div>
                                 <div class="col-xs-2">

                                    <label>Periode</label>
                                  
                                    <select required="" name="periode" class="form-control">
                                        <option value="">Pilih Periode</option>
                                        <option value="Ganjil" >Ganjil</option>
                                        <option value="Genap" >Genap</option>
                                        
                                        
                                    </select>
                                </div>

                            

                        </div>
                        <br/>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-7">
                                    <button  style="width:auto"  id="simpan" type="submit" name="proses" class="btn btn-primary btn-flat" ><i class="fa fa-filter"></i> Filter Data </button>
                                    <a id="pdf"  class="btn btn-primary btn-flat"   href="http://localhost/SMS/pembayaran/modules/laporan/laporan_pdf_d3ti.php?tgl_awal=<?php echo $_POST['awal']; ?>&tgl_akhir=<?php echo $_POST['akhir'];?>&kd_prodi=<?php echo $_POST['prodi']; ?>&angkatan=<?php echo $_POST['angkatan']; ?>&jenis_pembayaran=<?php echo $_POST['jenis'];?>&periode=<?php echo $_POST['periode'];?>&status=<?php echo $_POST['status'];?>" target="_blank"><i class="fa  fa-print"></i> Cetak PDF</a>
                                     <a id="exel"  class="btn btn-primary btn-flat"   href="http://localhost/SMS/pembayaran/modules/laporan/laporan_exel_d3ti.php?tgl_awal=<?php echo $_POST['awal']?>&tgl_akhir=<?php echo $_POST['akhir'];?>&kd_prodi=<?php echo $_POST['prodi'] ?>&angkatan=<?php echo $_POST['angkatan'] ?>&jenis_pembayaran=<?php echo $_POST['jenis'] ?>&periode=<?php echo $_POST['periode'];?>&status=<?php echo $_POST['status'] ?>" target="_blank"><i class="fa fa-file-excel-o"></i> Cetak Excel</a>
                                     <a class="btn btn-primary btn-flat" href="http://localhost/SMS/pembayaran/modules/laporan/lap_d3ti.php" target="_blank"><i class="fa fa-file-excel-o"></i> Cetak Semua</a>
                                </div>
                            </div>
                        </div>      
                        <script>
                            $("#pdf").hide();
                            $("#exel").hide();

                        </script> 
                    </form>
                    <?php
                    if (isset($_POST['proses'])) {
                        ?>
                        <script>
                            $("#pdf").show();
                            $("#exel").show();

                        </script>      
                        <?php
                        //$tgl = $_POST['tanggal'];
                        $prodi = $_POST['prodi'];
                        $status= $_POST['status'];
                        $jenis=$_POST['jenis'];
                        $periode=$_POST['periode'];
                        $angkatan=$_POST['angkatan'];
                        $awal=$_POST['awal'];
                        $akhir=$_POST['akhir'];
                       
                        
                        $sql = "select * from pembayaran where tgl_bayar>='$awal' and tgl_bayar<='$akhir' and kd_prodi='D3TI' and angkatan='$angkatan' and jenis_pembayaran='$jenis' and periode='$periode' and status='$status' order by nim asc";
                    } else {
                        $sql = "SELECT * FROM pembayaran where kd_prodi='D3TI' order by nim asc";
                    }
                    ?>                    
                </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
               <!--  <h3 class="box-title">Rekapitulasi Pembayaran Mahasiswa | Lunas</h3> -->
                
                
                
                
            </div><!-- /.box-header --><br>
            


             <div class="box-body table-responsive" id="data-mahasiswa">
                
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Bayar</th>
                            <th>Nim Mahasiswa</th>
                            <th>Nama Mahasiswa</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                            <th>Jenis Pembayaran</th>
                            <th>Semester</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Kode Staf</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config/koneksi.php';
                        $i = 1;

                         $query = mysql_query($sql);
                                                while ($data = mysql_fetch_assoc($query)) {
                                                    $nim = $data['nim'];
                                                    $status=$data['status'];
                                                    $jumlah=number_format($data['jumlah'],0,",",".");
                                                    
                                                    ?>
                            <tr class="">
                                <td><?php echo $i; ?></td>
                                <td><?php echo (DateToIndo("$data[tgl_bayar]")); ?></td>
                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['nama_mahasiswa']; ?></td>
                                <td><?php echo $data['kd_prodi']; ?></td>
                                <td><?php echo $data['angkatan']; ?></td>
                                <td><?php echo $data['jenis_pembayaran']; ?></td>
                                 <td><?php echo $data['semester']; ?></td>
                                <td>Rp. <?php echo $jumlah?></td>
                                <td>
                                <?php 
                                if($status=="Lunas"){
                                    echo '<span class="badge bg-aqua">Lunas</span>';
                                }elseif ($status=="Dispensasi") {
                                    echo '<span class="badge bg-red">Dispensasi</span>';
                                    }?>
                               </td>
                                <td><?php echo $data['kd_staf']; ?></td>

                               


                            </tr>
                            <?php
                            $i++;
                        }
                        ?>


                    </tbody>

                </table>
            </div><!-- /.box-body -->
            <!-- Main row -->


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
            "bAutoWidth": false
        });
    });
</script>


