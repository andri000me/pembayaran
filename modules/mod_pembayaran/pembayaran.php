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
                        Data Pembayaran Mahasiswa 
                       <small></small> 
                    </h1></section>
    <section class="content-header">                    
                    <form method="post">


                        <div class="box-body">

                            <div class="row">
                                <div class="col-xs-3">
                                    <label>Program Studi</label><br>
                                    <label>
                                        <input required=""  value="S1TI"type="radio" name="prodi" class="flat-red" />
                                        S1 TI
                                    </label>
                                    <label>
                                        <input required=""  value="D3TI"type="radio" name="prodi" class="flat-red" />
                                        D3 TI
                                    </label>
                                    <label>
                                        <input required=""  value="D3MI"type="radio" name="prodi" class="flat-red" />
                                        D3 MI
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
                                        
                                        <option value="DPP Angsuran 1" >DPP Angsuran 1</option>
                                        <option value="DPP Angsuran 2" >DPP Angsuran 2</option>
                                        <option value="DPP Angsuran 3" >DPP Angsuran 3</option>
                                        <option value="DPP Angsuran 4" >DPP Angsuran 4</option>
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
                                    <label>Status Pembayaran</label>
                                  
                                    <select required="" name="status" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="Lunas" >Lunas</option>
                                        <option value="Dispensasi" >Dispensasi</option>
                                        
                                        
                                    </select>
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

                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-7">
                                    
                                    <button  style="width:auto"  id="simpan" type="submit" name="proses" class="btn btn-primary" ><i class="fa fa-filter"></i> Filter Data </button>
                                     
                                    <!--a id="dispen"  class="btn btn-primary"   href=""><i class="fa  fa-warning"></i> Kirim Info Dispensasi</a-->
                                </div>
                            </div>
                        </div>      
                         <script>
                            $("#dispen").hide();
                           

                        </script> 
                    </form>
                    <?php
                    if (isset($_POST['proses'])) {
                        ?>
                        <script>
                            $("#dispen").show();
                            
                        </script>
                             
                        <?php
                        //$tgl = $_POST['tanggal'];
                        $prodi = $_POST['prodi'];
                        
                        $jenis=$_POST['jenis'];
                        $angkatan=$_POST['angkatan'];
                        $status=$_POST['status'];
                        $periode=$_POST['periode'];
                         
                       
                        
                        $sql = "select * from pembayaran where kd_prodi='$prodi' and angkatan='$angkatan' and jenis_pembayaran='$jenis' and periode='$periode' and status='$status'";
                    } else {
                        $sql = "SELECT * FROM pembayaran order by nim asc";
                    }
                    ?>                    
                </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
                
                
                
                
                
            </div><!-- /.box-header --><br>
            


            <div class="box-body table-responsive" id="data-mahasiswa">
                <table id="example2" class="table table-bordered table-striped">
                <?php
                                if (isset($_SESSION['alert'])) {
                                    echo $_SESSION['alert'];
                                } unset($_SESSION['alert']);
                                ?>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Bayar</th>
                            <th>Nim Mahasiswa</th>
                            <th>Nama Mahasiswa</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                            <th width="10%" align="center">Jenis Pembayaran</th>
                            <th>Periode</th>
                            <th>Semester</th>
                            <th>Jumlah</th>
                            <th>Denda</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Kode Staf</th>
                            <th>Aksi</th>
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
                                                    $denda=number_format($data['denda']);
                                                    $total_byr=number_format($data['total_bayar']);
                                                    $status=$data['status'];
                                                    ?>
                            <tr class="">
                                <td><?php echo $i; ?></td>
                               
                                <td><?php echo (DateToIndo("$data[tgl_bayar]")); ?></td>
                                <td><?php echo $data['nim']; ?></td>
                                <td><?php echo $data['nama_mahasiswa']; ?></td>
                                <td><?php echo $data['kd_prodi']; ?></td>
                                <td><?php echo $data['angkatan']; ?></td>
                                <td><?php echo $data['jenis_pembayaran']; ?></td>
                                <td><?php echo $data['periode'];?></td>
                                <td><?php echo $data['semester']; ?></td>
                                <td>Rp.<?php echo $jumlah; ?></td>
                                <td>Rp.<?php echo $denda; ?></td>
                                <td>Rp.<?php echo $total_byr; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><?php echo $data['kd_staf']; ?></td>

                                <td>
                                    
                                    <?php
                                    if($status=="Lunas"){
                                    echo '<span class="badge bg-green"><i class="fa  fa-trophy" readonly></i> Lunas</span>';
                                        }
                                    elseif($status=="Dispensasi"){
                                    echo "<a href='index.php?modul=dispensasi&nim=$data[nim]' class='btn btn-danger btn-xs btn-flat'  data-toggle='tooltip' data-original-title='Lunasi Pembayaran'><i class='fa  fa-creditcard'></i> Dispensasi</a>";
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
            "bFilter": true,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": true
        });
    });
</script>

