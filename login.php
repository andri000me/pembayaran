<?php
ob_start();
session_start();
if (isset($_SESSION['login-admin']))
        header("location:index.php");
?>
<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Layanan Informasi Pembayaran Kuliah Berbasis SMS | Administrator</title>
        <meta name="description" content="The plugin will detect your mouse wheel and swipe gestures to determine which way the page should scroll." />
        <meta name="keywords" content="ekstrakurikuler, kegiatan ekskul mahasiswa, stmik bumigora, mataram" />
        <meta name="author" content="kemahasiswaan stmik bumigora mataram" />
        <!-- Bootstrap core CSS -->
        <link href="style/super-hero/bootstrap.css" rel="stylesheet">
        <!-- CSS Pagescroll-->
        <link rel="stylesheet" type="text/css" href="style/super-hero/onepage-scroll.css" />
        <link rel="stylesheet" href="style/super-hero/style.css">
        <!-- Custom styles for font-awesome -->
        <link rel="stylesheet" href="style/font-awesome-4.1.0/css/font-awesome.min.css">
        <!-- favicon STMIK -->
        <link rel="shortcut icon" href="style/ico/stmik.png">
        <!-- Custom js for page-scroll -->
        <script type="text/javascript" src="style/super-hero/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="style/super-hero/js/jquery.onepage-scroll.js"></script>
        <script type="text/javascript" src="daftar-user.js"></script>
    </head>
    <body>

        <header>
            <img src="style/img/logo-stmik.png" alt="logo STMIK Bumigora" width="100" height="100">
            <h1>Layanan Informasi Pembayaran Kuliah Berbasis SMS Gateway</h1>
            <small>STMIK Bumigora Mataram</small>
            
            <img src="style/img/outbox.png" alt="toga" width="80" height="78" style="position:absolute; left:150px;margin-top:-19px;">
        </header>
        <div class="main">

            <section class="page one">
                <div class="page-container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="well">
                                <form class="form-horizontal" method="POST" action="proses-login.php">
                                    <fieldset>
                                        <legend><i class="fa fa-users fa-fw fa-2x"></i> Form Login Staf/Administrator</legend>
                                        <div class="form-group">
                                            <label for="inputUsername" class="col-lg-2 control-label">Username</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" placeholder="Username" type="text" name="user" autofocus required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="inputPassword" placeholder="Password" type="password" name="sandi">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-10 col-lg-offset-2">
                                                <button type="submit" name="login-staf" class="btn btn-success">Masuk <i class="fa fa-sign-in fa-fw fa-lg"></i>
                                                </button>
                                                <a class="btn btn-default" data-toggle="modal" data-target="#lupaPass"><i class="fa fa-history fa-fw fa-lg"></i>Lupa Password ?</a>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($_SESSION['info-login'])) {
                                            echo $_SESSION['info-login'];
                                        }
                                        unset($_SESSION['info-login']);
                                        ?>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-7 col-md-offset-1">
                           
                            <h2 style="color:#2064ff;"><i class="fa fa-user fa-fw fa-2x"></i>Login Staf/Administrator</h2>
                            <p style="color:#4e5d6c;">
                               
                            </p>
                             <?php
                                        if (isset($_SESSION['info-daftar'])) {
                                            echo $_SESSION['info-daftar'];
                                        }
                                        unset($_SESSION['info-daftar']);
                                        ?>
                        </div>
                    </div>
                    <div style="position:absolute;bottom:-200px;float:left;">
                        <footer>
                            <p style="width:100%;color:#4e5d6c;">
                                Copyright &COPY 2015 <b>STMIK Bumigora Mataram</b> <i class="fa fa-university fa-fw fa-lg"></i><br/>
                                Created By : <b><i>Muhammad Azmi (1110510004)</i></b> <i class="fa fa-graduation-cap fa-fw fa-lg"></i><br>
                                Supported By : <b><i>Boostrap & Admin-LTE</i></b> <i class="fa fa-support fa-fw fa-lg"></i>
                            </p>
                        </footer>
                    </div>
                </div>
            </section>

            <section class="page two">
                <div class="page-container">
                    <div class="row">
                        <div class="col-md-4">
                            <form class="form-horizontal well" method="POST" action="daftar_user.php">
                                <fieldset>
                                    <legend><i class="fa fa-pencil-square-o fa-fw fa-2x"></i> Daftar Akun Staf/Administrator</legend>
                                    <div class="form-group">
                                        <div class="col-lg-12" id="pesan">        
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNama" class="col-lg-2 control-label">NIK </label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="inputNama" placeholder="Masukkan NIK" name="kode" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNama" class="col-lg-2 control-label">Nama</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="inputNama" placeholder="Nama Staf" name="nama_staf" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword2" class="col-lg-2 control-label">Alamat</label>
                                        <div class="col-lg-10">
                                             <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-2 control-label"
                                        placeholder="Email"
                                        required
                                        oninvalid="this.setCustomValidity('Format Email Salah..!')">Email</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="inputEmail" placeholder="Email" name="email" type="email" required>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="inputPassword" 

                                            placeholder="Password" name="sandi" type="password" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button type="reset" class="btn btn-default"><i class="fa fa-times fa-fw fa-lg"></i>Batal</button>
                                            <button type="submit" class="btn btn-primary" name="s_user"><i class="fa fa-pencil-square-o fa-fw fa-lg"></i>Proses</button>
                                        </div>
                                    </div>
                                    
                                </fieldset>
                            </form>
                        </div>
                        <!-- col-md-5-->
                        <div class="col-md-7 col-md-offset-1">
                            <h2 style="color:white;"><i class="fa fa-pencil-square-o fa-fw fa-2x"></i>Buat Akun Anda</h2>
                            <p style="color:white;">
                                Untuk Membuat Akun, silahkan lengkapi Biodata Anda dengan mengisi Fom Biodata disamping..!!
                            </p>
                            
                        </div>

                    </div>
                    <div style="position:absolute;bottom:20px;text-align:right;margin-left:900px">
                        <footer>
                            <p style="width:97%;color:white;">
                                Copyright &COPY 2015 <b>STMIK Bumigora Mataram</b> <i class="fa fa-university fa-fw fa-lg"></i><br/>
                                Created By : <b><i>Muhammad Azmi(1110510004)</i></b> <i class="fa fa-graduation-cap fa-fw fa-lg"></i>
                                Supported By : <b><i>Boostrap & Admin-LTE</i></b> <i class="fa fa-support fa-fw fa-lg"></i>
                            </p>
                        </footer>
                    </div>
                </div>
            </section>

           
        </div>

        <!-- Modal Lupa Password -->
        <div class="modal fade" id="lupaPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-power-off fa-fw fa-lg"></i> Lupa Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="ubah_pass.php">
                            <fieldset>
                                <legend><i class="fa fa-pencil-square-o fa-fw fa-2x"></i> Ubah Akun Anda</legend>
                                <div class="form-group">
                                        <label for="inputEmail" class="col-lg-2 control-label"
                                        placeholder="Email"
                                        required
                                        oninvalid="this.setCustomValidity('Format Email Salah..!')">Username</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="inputEmail" placeholder="Username" name="username" type="email" required>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-lg-2 control-label">Password Baru</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="inputPassword" 

                                            placeholder="Masukkan Password Baru" name="password" type="password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="kirim">OK<i class="fa fa-send fa-fw fa-lg"></i></button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

       
        
            <script type="text/javascript">
                $(".main").onepage_scroll({
                    sectionContainer: "section",
                    easing: "cubic-bezier(0.180, 0.900, 0.410, 1.210)"
                });
            </script>
            <script type="text/javascript" src="style/super-hero/js/bootstrap.min.js"></script>
            <script type="text/javascript">
                (function() {
                    $('.tultip').tooltip();
                    $('#pesan').fadeOut(8000);
                })();
            </script>
    </body>
</html>

