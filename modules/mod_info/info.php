<script>
            function Count() {
                var karakter, maksimum;
                maksimum = 146
                karakter = maksimum - (document.form1.info.value.length);
                if (karakter < 0) {
                    alert("Jumlah Karakter sudah:" + maksimum + "");
                    document.form1.info.value = document.form1.info.value.
                            substring(0, maksimum);
                    document.form1.counter.value = karakter;
                } else {
                    document.form1.counter.value = maksimum - (document.form1.info.value.length);
                }
            }
        </script>
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
            <small>Informasi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Informasi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
                <i class="glyphicon glyphicon-th-list"></i>
                <h3 class="box-title">Daftar Informasi
                    <a href="#" id="0" class="btn btn-primary" data-toggle="modal" data-target="#compose-modal">
                        <i class="fa fa-plus-square-o"></i> Tambah Info
                    </a>

                </h3>
                <!-- tools box -->

            </div>

            <div class="nav-tabs-custom">
                <?php
                $c = 0;
                $bts = 7;
                $btsSekarang = date('Y-m-d');
                $datas = array();
                $a = mysql_query("SELECT id, info, tgl_bts from informasi");
                while ($b = mysql_fetch_array($a)) {
                    $tgl_bts = $b['tgl_bts'];
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
                        $c++;
                        $datas[] = array($b['id'], $b['info']);
                    }
                }
                ?>
                <!-- Tabs within a box -->
                <div class="tabs-x tabs-above tab-align-left tab-bordered">
                       <ul id="w1" class="nav nav-tabs" role="tablist">

                        <li class="active"><a href="#in" data-toggle="tab" aria-expanded="false"><i class="fa fa-check-circle-o"></i>  Terkirim</a></li>
                        <li class=""><a href="#blm" data-toggle="tab" aria-expanded="true">Kirim Ulang <label class="label label-info"><?php echo $c ?></label></a></li>
                    </ul>
                    <div class="tab-content no-padding">

                        <div class="tab-pane active" id="in" >
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
                                        <th>Info</th>
                                        <th>Jenis Info</th>
                                        <th>Periode</th>
                                        <th>Tujuan</th>
                                        <th>Tanggal Kirim</th>
                                        <th>Batas Terakhir</th>
                                        <th>Proses</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'config/koneksi.php';


                                    $query = mysql_query("SELECT * FROM informasi");

                                    // tampilkan data siswa selama masih ada
                                    while ($data = mysql_fetch_array($query)) {
                                        ?>
                                        <tr class="">
                                            <td><?php echo $data['id']; ?></td>
                                            <td><?php echo $data['info']; ?></td>
                                            <td><?php echo $data['jenis_info'];?></td>
                                            <td><?php echo $data['periode'];?></td>
                                            <td><?php echo $data['tujuan']; ?></td>

                                            <td><?php echo $tanggal=DateToIndo($data['tanggal']);?></td>
                                            <td><?php echo $tgl_bts=DateToIndo($data['tgl_bts']); ?></td>
                                            <td><?php echo $data['Proses']; ?></td>

                                            <td>
                                                <a href="index.php?modul=ubah_info&id=<?php echo $data[0]; ?>" class="ubah" title="" data-toggle="tooltip" data-original-title="Ubah Data Tujuan <?php echo $data['tujuan']; ?>">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a href="index.php?modul=hapus_info&id=<?php echo $data[0]; ?>" title="" data-toggle="tooltip" data-original-title="Hapus Data" onclick="return confirm('Anda yakin menghapus Informasi tujuan : <?php echo $data['tujuan']; ?> ?');">
                                                    <i class="glyphicon glyphicon-trash"></i>

                                                </a>
                                            </td>


                                        </tr>
                                        <?php
                                    }
                                    ?>


                                </tbody>

                            </table>
                            </div>

                        </div>
                        <div class="tab-pane" id="blm">
                            <ol class="breadcrumb">
                                <li><i class="fa fa-refresh"></i> Daftar Info Yang Harus Dikirim Ulang</li>
                                
                            </ol>

                            <form action="modules/mod_info/save.php" method="POST">
                                <div class="box-body">
                                    <ul class="todo-list">
                                        <?php
                                        foreach ($datas as $value) {
                                            ?>
                                            <li>
                                                <input class="icheckbox_flat-blue checked" type="checkbox" name="id[]" value="<?php echo $value[0] ?>" />
                                                <b>Mengingatkan kembali: <?php echo $value[1] ?></b>      
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix no-border">
                                    <button class="btn btn-success pull-right" type="submit"><i class="glyphicon glyphicon-refresh"></i> Kirim Ulang</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
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



<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-info"></i> Informasi Baru</h4>
            </div>
            <form action="index.php?modul=simpan_info" method="post" name="form1">
                <div class="modal-body">


                    <div class="form-group">
                        <label>Group Tujuan</label>
                        <select name ="tujuan" class="form-control">
                            <option><center>--- Pilih Tujuan ---</center></option>
                            <?php
                            include "config/koneksi.php";
                            $sql = "select * from groub";
                            $query = mysql_query($sql);
                            while ($nama = mysql_fetch_array($query)) {
                                echo "<option value=\"$nama[idgroup]\">
				                        $nama[nama_group]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row">
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Jenis Info</label>
                        <select name ="jenis" id="jenjang" class="form-control">
                            <option>Pilih Jenis</option>
                            <option value="SPP">SPP</option>
                            <option value="SKS">SKS</option>
                            <option value="Laboraturium">Laboraturium</option>
                            <option value="DPP Angsuran 1">DPP Angsuran 1</option>
                            <option value="DPP Angsuran 2">DPP Angsuran 2</option>
                            <option value="DPP Angsuran 3">DPP Angsuran 3</option>
                            <option value="DPP Angsuran 4">DPP Angsuran 4</option>
                            <option value="Skripsi/TA">Skripsi/TA</option>
                           
                        </select>
                    </div>
                    </div>
                    

                    
                    <div class="col-xs-6">
                    <div class="form-group">
                        <label>Periode</label>
                        <select name ="periode" id="jenjang" class="form-control">
                            <option>Pilih Periode</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>}
                            
                        </select>
                    </div>
                    </div>
                    
                     <div class="col-xs-6">
                    <div class="form-group">
                        <label>Tanggal Kirim</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="tanggal" class="form-control" placeholder="yyyy/mm/dd" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    </div>

                     <div class="col-xs-6">
                    <div class="form-group">
                        <label>Batas Terakhir</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="batas" class="form-control" placeholder="yyyy/mm/dd" data-mask/>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    </div>
                    </div>

                    <div class="form-group">
                        <label>Isi Informasi</label>
                        <textarea name="info" class="form-control" rows="3" 
                        OnFocus="Count();" OnClick="Count();" onKeydown="Count();"
                        OnChange="Count();" onKeyup="Count();"  placeholder="Masukkan Pesan"></textarea>
                    </div>
                    <div class="form-group">
                                                <label>Jumlah Sisa Karakter Yang Bisa Dikirim:</label>
                                                <input type="text" class="form-control input-sm" size="5" maxlength="5" style="width: 50px;" name="counter" readonly="" placeholder="146">


                                            </div>


                </div>
                <div class="modal-footer clearfix">

                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>

                    <button type="submit" name="kirim" class="btn btn-primary btn-flat pull-left"><i class="fa fa-save"></i> Simpan Info</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
