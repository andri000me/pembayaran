<?php
$q = mysql_query('select ID, ReceivingDateTime from inbox') or die('Gagal');

$counter = 0;
$now = date('Y-m-d');
while ($r = mysql_fetch_array($q)) {
    $a = $r['ReceivingDateTime'];
    $tgl = substr($a, 0, 10);
    if ($tgl == $now)
        $counter++;
}
$g = mysql_query('select *from mahasiswa');
$h = 0;
while ($p = mysql_fetch_array($g)) {
    $h++;
}
$info = mysql_query('select * from informasi');
$i = 0;
while ($j = mysql_fetch_array($info)) {
    $i++;
}
$lunas=mysql_query('select * from pembayaran where status="Lunas"');
$p=0;
while ($l =mysql_fetch_array($lunas)){
    $p++;
}
$dispen=mysql_query('select * from pembayaran where status="Dispensasi"');
$w=0;
while ($t =mysql_fetch_array($dispen)){
    $w++;
}
$gagal=mysql_query('select * from sentitems where Status="SendingError"');
    $gl=0;
    while ($g1=mysql_fetch_array($gagal)) {
        $gl++;
    }

?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Dashboard</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <i class="fa  fa-bookmark"></i>
                <h3 class="box-title">Beranda Informasi</h3>
                <!-- tools box -->

            </div><br>
            
          
            
            <div class="callout callout-danger">
                <i class="fa fa-info"></i>

                <b>Info Penting..!!</b>
                <br> Silahkan Jalankan Service Pesan Otomatis dengan membuka Service di Tab Baru..
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="box-body">
                <div class="row">
                
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
<?php echo $counter ?>
                                </h3>
                                <p>
                                    Pesan Baru Hari Ini
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <a href="index.php?modul=Inbox" class="small-box-footer">
                                Lihat Selengkapnya.. <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
<?php echo $i ?><sup style="font-size: 20px"></sup>
                                </h3>
                                <p>
                                    Informasi Baru Keuangan
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bullhorn"></i>
                            </div>
                            <a href="index.php?modul=Informasi" class="small-box-footer">
                                Baca Selengkapnya.. <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
<?php echo $h ?>
                                </h3>
                                <p>
                                    Data Mahasiswa Aktif
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="index.php?modul=datamahasiswa" class="small-box-footer">
                                Baca Selengkapnya.. <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3>
                                    <?php echo $p ?>
                                </h3>
                                <p>
                                    Data Pembayaran (Lunas)
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-usd"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Baca Selengkapnya.. <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <?php
                $d = 0;
                $bts = 7;
                $btsSekarang = date('Y-m-d');
                $datas = array();
                $a = mysql_query("SELECT kd_pembayaran,nim, tgl_bayar,status from pembayaran where status='Dispensasi'");
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
                        $datas[] = array($b['kd_pembayaran'], $b['status']);
                    }
                }
                ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3>
                                    <?php echo $d ?>
                                </h3>
                                <p>
                                    Data Pembayaran (Dispensasi)
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <a href="index.php?modul=datadispensasi" class="small-box-footer">
                                Baca Selengkapnya.. <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
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

                    <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $c ?></h3>
                  <p>Informasi Dikirim Ulang</p>
                </div>
                <div class="icon">
                <i class="glyphicon glyphicon-refresh"></i>
                </div>
                <a href="index.php?modul=Informasi" class="small-box-footer">Baca Selengkapnya.. <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $gl ?></h3>
                  <p>Informasi Gagal Dikirim</p>
                </div>
                <div class="icon">
                <i class="fa fa-frown-o"></i>
                </div>
                <a href="index.php?modul=gagal" class="small-box-footer">Baca Selengkapnya.. <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

                </div><!-- /.row -->

                <!-- Main row -->



                </section><!-- /.Left col -->
            </div>
        </div>


    </section><!-- /.content -->

</aside><!-- /.right-side -->