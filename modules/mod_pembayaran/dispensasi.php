 <?php
                $d = 0;
                $bts = 7;
                $btsSekarang = date('Y-m-d');
                $datas = array();
                 $a = mysql_query("SELECT kd_pembayaran,nim, nama_mahasiswa,jenis_pembayaran,tgl_bayar,jumlah,status,kd_staf from pembayaran where status='Dispensasi'");
                while ($b = mysql_fetch_array($a)) {
                    $tgl_bts = $b['tgl_bayar'];
                    $btsThn = substr($tgl_bts, 0, 4);
                    $btsBln = substr($tgl_bts, 5, 2);
                    $btsHri = substr($tgl_bts, 8, 2);

                    $btsHri = $btsHri - $bts;

                    if ($btsHri < 0) {
                        $btsHri = 30 + $btsHri;
                        $btsBln = $btsBln - 1;
                        if ($btsBln <= 0) {
                            $btsBln = 12;
                            $btsThn = $btsThn - 1;
                        }
                    }

                    $btsFixed = $btsThn . "-" . $btsBln . "-" . $btsHri;
                    if ($btsFixed == $btsSekarang) {
                        $d++;
                        $datas[] = array($b['kd_pembayaran'],$b['tgl_bayar'],$b['nim'],$b['nama_mahasiswa'],$b['jenis_pembayaran'],$b['jumlah'],$b['status'],$b['kd_staf']);
                    }
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
                        Data Pembayaran Mahasiswa | Dispensasi H-7
                       <small></small> 
                    </h1></section>
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
              <i class="glyphicon glyphicon-th-list"></i>
                <h3 class="box-title">Data Mahasiswa Dispensasi
                    <a href="#" id="0" class="btn btn-warning btn-flat" data-toggle="modal" data-target="#modal-dispen">
                        <i class="fa fa-warning"></i> Kirim Peringatan
                    </a>

                </h3>  
                
                
                
                
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
                            
                            <th width="10%" align="center">Jenis Pembayaran</th>
        
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Kode Staf</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($datas as $value) {
                        ?>
                            <tr class="">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value[1] ?></td>
                                <td><?php echo $value[2] ?></td>
                                <td><?php echo $value[3] ?></td>
                                
                                <td><?php echo $value[4] ?></td>
                                
                                <td>Rp.<?php echo number_format($value[5])?></td>
                                <td><?php echo $value[6] ?></td>
                                <td><?php echo $value[7] ?></td>

                                <td>
                                    <small>Batas Waktu Tinggal 7 Hari Lagi<br/>
                                    </small>
                                    
                                    <?php
                                    // if($value[6]=="Dispensasi"){
                                   // echo "<a href='index.php?modul=dispensasi&nim=$b[nim]' class='btn btn-danger btn-xs btn-flat'  data-toggle='tooltip' data-original-title='Lunasi Pembayaran'><i class='fa  fa-usd'></i> Lunasi</a>";
                                        //}
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

<div class="modal fade" id="modal-dispen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-warning"></i> Pesan Warning Dispensasi</h4>
            </div>
            <form id="simpan" action="index.php?modul=peringatan" method="post" onsubmit="return validasi()">
                 <div class="form-group">
                        <div class="col-lg-12" id="pesan">        
                        </div>
                    </div>
                <div class="modal-body">
                       
               


                    <div class="form-group">
                        <label for="inputKode">Tujuan</label>
                        <input type="text" id="inputKode" name="tujuan" class="form-control" value="Dispensasi" readonly>
                    </div>
                    <small id="alert"></small>

                    

                   <div class="form-group">
                        <label>Isi Informasi</label>
                        <textarea name="info" class="form-control" rows="3" placeholder="Masukkan Informasi"></textarea>
                    </div>


                </div>
                <div class="modal-footer clearfix">

                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>

                    <button type="submit" name="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Kirim Info</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->