<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Informasi Pesan Masuk</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Inbox</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-inbox"></i>
                <h3 class="box-title">Pesan Masuk
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
                            <th>Proses</th>
                            <th>Aksi</th>
                        </tr>

                    <tbody>
                        <?php
                        include 'config/koneksi.php';


                        $query = mysql_query("SELECT * FROM inbox");

                        // tampilkan data siswa selama masih ada
                        while ($data = mysql_fetch_array($query)) {
                            ?>
                            <tr class="">
                                <td><?php echo $data['ID']; ?></td>
                                <td><?php echo $data['SenderNumber']; ?></td>
                                <td><?php echo $data['TextDecoded']; ?></td>
                                <td><?php echo $data['Processed']; ?></td>

                                <td>

                                    <a href="index.php?modul=hapus_inbox&ID=<?php echo $data['ID']; ?>" title="" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Anda yakin menghapus Inbox dengan Pengirim : <?php echo $data['SenderNumber']; ?> ?');">
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
