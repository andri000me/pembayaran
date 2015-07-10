<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Informasi Pesan Terkirim</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Send Items</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-reply"></i>
                <h3 class="box-title">Pesan Terkirim

                </h3>
                
                <!-- tools box -->


            </div>


            <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo $_SESSION['alert'];
                    } unset($_SESSION['alert']);
                    ?>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pengirim</th>
                            <th>Isi Sms</th>
                            <th>Tanggal Kirim</th>
                            <th>Report</th>
                            <th>Aksi</th>
                        </tr>

                    <tbody>
                        <?php
                        include 'config/koneksi.php';


                        $query = mysql_query("SELECT * FROM sentitems");

                        // tampilkan data siswa selama masih ada
                        while ($data = mysql_fetch_array($query)) {
                             $status=$data['Status'];
                            ?>
                            <tr class="">
                                <td><?php echo $data['ID']; ?></td>
                                <td><?php echo $data['DestinationNumber']; ?></td>
                                <td><?php echo $data['TextDecoded']; ?></td>
                                <td><?php echo $data['SendingDateTime']; ?></td>
                               <td>
                                    
                                    <?php
                                    if($status=="SendingOKNoReport"){
                                    echo '<span class="label label-success"></i> SendingOKNoReport</span>';
                                        }
                                    elseif($status=="SendingError"){
                                        echo '<span class="label label-danger"></i> SendingError</span>';
                                    // echo "<a href='index.php?modul=dispensasi&nim=$data[nim]' class='btn btn-danger btn-xs btn-flat'  data-toggle='tooltip' data-original-title='Kirim Ulang'><i class='glyphicon glyphicon-refresh'></i> Dispensasi</a>";
                                        }
                                        elseif($status=="DeliveryFailed"){
                                           echo '<span class="label label-warning"></i> DeliveryFailed</span>'; 
                                        }
                                        elseif ($status=="DeliveryPending") {
                                             echo '<span class="label label-info"></i> DeliveryPending</span>';
                                        }
                                        ?>

                                </td>

                                <td>
                                    
                                    <?php
                                    if($status=="SendingError"){
                                    echo "<a href='index.php?modul=gagal' data-toggle='tooltip' data-original-title='Kikrim Ulang'><i class='glyphicon glyphicon-refresh'></i></a>";
                                        }
                                    elseif($status=="DeliveryFailed"){
                                    echo "<a href='index.php?modul=gagal' data-toggle='tooltip' data-original-title='Kikrim Ulang'><i class='glyphicon glyphicon-refresh'></i></a>";
                                        }

                                        ?>
                                        <a href="index.php?modul=hapus_send&ID=<?php echo $data['ID']; ?>" title="" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Anda yakin menghapus Inbox dengan Pengirim : <?php echo $data['DestinationNumber']; ?> ?');">
                                        <i class="glyphicon glyphicon-trash"></i>
                                </td>

                               <!--  <td>

                                    <a href="index.php?modul=hapus_send&ID=<?php echo $data['ID']; ?>" title="" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Anda yakin menghapus Inbox dengan Pengirim : <?php echo $data['DestinationNumber']; ?> ?');">
                                        <i class="glyphicon glyphicon-trash"></i>

                                    </a>
                                </td> -->


                            </tr>
    <?php
}
?>

                        </thead>  
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
                                                                    $("#example1").dataTable();
                                                                    $('#example2').dataTable({
                                                                        "bPaginate": true,
                                                                        "bLengthChange": false,
                                                                        "bFilter": true,
                                                                        "bSort": true,
                                                                        "bInfo": true,
                                                                        "bAutoWidth": false
                                                                    });
                                                                });
</script>