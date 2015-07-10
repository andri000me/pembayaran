<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Informasi Pesan Keluar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Outbox</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-reply-all"></i>
                <h3 class="box-title">Pesan Outbox
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
                            <th>Tujuan</th>
                            <th>Isi Sms</th>
                            <th>Report</th>
                            <th>Aksi</th>
                        </tr>

                    <tbody>
                        <?php
                        include 'config/koneksi.php';

                        $query = mysql_query("SELECT * FROM outbox");
                        // tampilkan data siswa selama masih ada
                        while ($data = mysql_fetch_assoc($query)) {
                            $nomer = mysql_query("SELECT nama_mahasiswa FROM mahasiswa WHERE no_hp = '$data[DestinationNumber]'");
                            $d = mysql_fetch_array($nomer);
                            if ($d['nama_mahasiswa'] == "")
                                $sendingname = $data['DestinationNumber'];
                            else
                                $sendingname = $d['nama_mahasiswa'];
                            ?>
                            <tr class="">
                                <td><?php echo $data['ID']; ?></td>
                                <td><?php echo $sendingname; ?></td>
                                <td><?php echo $data['TextDecoded']; ?></td>
                                <td><?php echo $data['DeliveryReport']; ?></td>

                                <td>

                                    <a href="index.php?modul=hapus_outbox&ID=<?php echo $data['ID']; ?>" title="" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Anda yakin menghapus Inbox dengan Pengirim : <?php echo $data['DestinationNumber']; ?> ?');">
                                        <i class="glyphicon glyphicon-trash"></i>

                                    </a>
                                </td>


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
