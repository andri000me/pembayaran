<?php
session_start();
if (!isset($_SESSION['login-admin']))
    header("location:login.php");
include './config/koneksi.php';

$q = mysql_query('select ID, ReceivingDateTime,SenderNumber,TextDecoded from inbox where ID') or die('Gagal');
$counter = 0;
$now = date('Y-m-d');
$online = date('d-m-Y');
$jam = date("h:m");
while ($r = mysql_fetch_array($q)) {
    $a = $r['ReceivingDateTime'];
    $pengirim = $r['SenderNumber'];
    $pesan = $r['TextDecoded'];
    $tgl = substr($a, 0, 10);
    if ($tgl == $now)
        $counter++;
}
$gagal=mysql_query('select * from sentitems where Status="SendingError"');
    $gl=0;
    while ($g1=mysql_fetch_array($gagal)) {
        $gl++;
    }


$i = 1;
$query = mysql_query("SELECT * FROM staf where nama_staf='" . $_SESSION['nama'] . "'");
$data = mysql_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<meta http-equiv="refresh" content="20; url=<?php $_SERVER['PHP_SELF']; ?>">-->
        <title>Layanan Informasi Pembayaran Kuliah</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/ionicons.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <link href="css/iCheck/flat/flat.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
        <link href="css/select2.css" rel="stylesheet"  type="text/css"/>
        <link href="css/select2.min.css" rel="stylesheet" type="text/css"/>
        <!-- favicon STMIK -->
        <link rel="shortcut icon" href="style/ico/stmik.png">
        <!-- Custom js for page-scroll -->
        <script type="text/javascript" src="style/super-hero/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="style/super-hero/js/jquery.onepage-scroll.js"></script>
        <script type="text/javascript" src="daftar-user.js"></script>

        <script src="add-master.js"></script>
        <script src="cek_nomer.js"></script>
        <script src ="modules/mod_ortu/coba.js"></script>
        <script src="js/jquery.min.js"></script>
        <script>

            /*autocomplete muncul setelah user mengetikan minimal2 karakter */
            $(function() {
                $("#mahasiswa").autocomplete({
                    source: "source.php",
                    minLength: 2,
                });
            });
        </script>

        <script src="js/jquery-ui.min.js"></script>

        <script src="js/bootstrap.min.js" type="text/javascript"></script>


        
    </head>
    <body class="skin-blue fixed">
        <?php
        include_once ('./config/koneksi.php');
        ?>
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->

                <span class="fa fa-graduation-cap"></span>
                SMS Mahasiswa
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="done tasks-menu">
                            <a href="#" >
                                <strong>Layanan Informasi Pembayaran Kuliah Berbasis SMS Gateway</strong>
                                <span>STMIK Bumigora Mataram</span>
                            </a>
                        </li>
                        
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Service Running</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="service_runing.php" target=_blanks>
                                                <i class="glyphicon glyphicon-transfer"></i> Jalankan Service
                                            </a>
                                        </li>
                                        <li>
                                            <a href="service.php" target=_blanks>
                                                <i class="glyphicon glyphicon-sort"></i> Jalankan Service Gammu
                                            </a>
                                        </li>
 
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span> Admin <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['nama']; ?>
                                        <small>Staf Keuangan</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="index.php?modul=profil" class="btn btn-default btn-flat"><i class="fa fa-user"> Profil</i></a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" data-toggle="modal" data-target="#keluarModal" class="btn btn-default btn-flat"><i class="fa fa-power-off"> Keluar</i></a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php
        include "menu.php";
        ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p> <?php echo $_SESSION['nama']; ?></p>
                            
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a><br/><br/>
                            <p> <?php echo $online;?>
                        </div>
                    </div>
                    <!-- search form -->
                    
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php">
                                <i class="fa fa-home"></i> <span>Beranda</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="index.php?modul=prodi">
                                <i class="fa fa-university"></i> <span>Program Studi</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="index.php?modul=group">
                                <i class="fa fa-group"></i> <span>Group Mahasiswa</span>
                            </a>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-envelope-o"></i>
                                <span>SMS</span><!-- <small class="badge pull-right bg-green"><?php echo $counter; ?></small> -->
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?modul=Inbox" data-toggle='tooltip' data-original-title='<?php echo $counter; ?> Pesan Masuk Hari Ini'><i class="fa fa-angle-double-right"></i> Inbox<small class="badge pull-right bg-green"><?php echo $counter; ?></small></a></li>
                                <li><a href="index.php?modul=outbox"><i class="fa fa-angle-double-right"></i> Outbox</a></li>
                                <li><a href="index.php?modul=sent" data-toggle='tooltip' data-original-title='<?php echo $gl; ?> Pesan Gagal'><i class="fa fa-angle-double-right"></i> Send<small class="badge pull-right bg-red"><?php echo $gl; ?></small></a></li>
                            </ul>
                        </li>



                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Master Data</span> 
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?modul=datamahasiswa"><i class="fa fa-angle-double-right"></i> Data Mahasiswa</a></li>
                                <li><a href="index.php?modul=data_ortu"><i class="fa fa-angle-double-right"></i> Data Wali Mahasiswa</a></li>

                            </ul>
                        </li>

                        <li class="active">
                            <a href="index.php?modul=kirimpesan">
                                <i class="fa fa-arrow-circle-o-right"></i> <span>Kirim SMS</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="index.php?modul=Informasi">
                                <i class="fa fa-bullhorn"></i> <span>Informasi Pembayaran</span>
                            </a>
                        </li>
                        
                        <li class="active">
                            <a href="index.php?modul=validasi">
                                <i class="fa fa-check-square-o"></i> <span>Validasi Pembayaran</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="index.php?modul=pembayaran">
                                <i class="fa fa-file-o"></i> <span>Data Pembayaran</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file-archive-o"></i>
                                <span>Laporan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?modul=laporan_s1"><i class="fa fa-angle-double-right"></i> Laporan S1 TI</a></li>
                                <li><a href="index.php?modul=laporan_d3ti"><i class="fa fa-angle-double-right"></i> Laporan D3 TI</a></li>
                                <li><a href="index.php?modul=laporan_d3mi"><i class="fa fa-angle-double-right"></i> Laporan D3 MI</a></li>

                            </ul>
                        </li>
                       
                        <li class="active">
                            <a href="index.php?modul=datastaf">
                                <i class="fa fa-user"></i> <span>Data Staf</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#"  data-toggle="modal" data-target="#keluarModal">
                                <i class="fa fa-power-off"></i> <span>Keluar</span>
                            </a>
                        </li>

                    </ul>
                </section>
               
            </aside>

        </div><!-- ./wrapper -->

        <!--modal keluar-->
        <div class="modal fade" id="keluarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-power-off fa-fw fa-lg"></i> Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                        Anda Yakin ingin Keluar dari Aplikasi ini ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <a href="logout.php" type="button" class="btn btn-primary">Ya, Keluar <i class="fa fa-sign-out fa-fw fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

    </body>
</html>
