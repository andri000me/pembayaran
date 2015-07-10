<html>
    <head>
        <title>Kirim SMS Informasi</title>
        <script>
            function Count() {
                var karakter, maksimum;
                maksimum = 160
                karakter = maksimum - (document.form1.pesan.value.length);
                if (karakter < 0) {
                    alert("Jumlah Karakter :" + maksimum + "");
                    document.form1.pesan.value = document.form1.pesan.value.
                            substring(0, maksimum);
                    document.form1.counter.value = karakter;
                } else {
                    document.form1.counter.value = maksimum - (document.form1.pesan.value.length);
                }
            }
        </script>
    </head>
    <body>
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
                    <small>Kirim Pesan</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Kirim Pesan</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Small boxes (Stat box) -->
                <div class="row center">
            <div class="col-md-8 center">
              <!-- DIRECT CHAT PRIMARY -->
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                    <i class="fa fa-envelope-o"></i>
                  <h3 class="box-title">Kirim Pesan Mahasiswa</h3>
                 
                </div><!-- /.box-header -->
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo $_SESSION['alert'];
                    } unset($_SESSION['alert']);
                    ?>
                
                   <div class="tabs-x tabs-above tab-align-left tab-bordered">
                       <ul id="w1" class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#fa-icons" data-toggle="tab"><i class="fa fa-user"></i>  Kirim Pesan Individu</a></li>
                            <li><a href="#glyphicons" data-toggle="tab"><i class="fa fa-users"></i>  Kirim Pesan Group</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- Font Awesome icons -->
                            <div class="tab-pane active" id="fa-icons" >
                                <section id="new">
                                    <div class="box-body">

                                        <form action="index.php?modul=kirim_personal" name="form1" method="post">
                                            <div class="form-group">
                                                <div class="col-lg-12" id="pesan">        
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputNim">Nim Mahasiswa</label>
                                                <div class="input-group">
                                                    <input type="text" class="tultif form-control" id="inputNim" value="" name="nim" placeholder="Nim Anda" title="" data-toggle="tooltip" data-original-title="Gunakan Nim Untuk Mencari Telepon Mahasiswa" required />
                                                    <div class="input-group-btn">
                                                        <button type="button" id="cek_nim" class="btn btn btn-primary"><i class="fa fa-arrow-circle-o-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputNomer">Nomer Tujuan</label>
                                                <input type="text" name="nomer" id="inputNomer" class="form-control" placeholder="Masukkan Nomer Tujuan +62xx"
                                                       pattern="[0-9]+"
                                                       autofocus required
                                                       oninvalid="this.setCustomValidity('Input hanya boleh Angka..!')" readonly=""/>
                                            </div>

                                            <div class="form-group">
                                                <label>Isi Pesan</label>
                                                <textarea class="form-control" rows="3" name="pesan" 
                                                          OnFocus="Count();" OnClick="Count();" onKeydown="Count();"
                                                          OnChange="Count();" onKeyup="Count();"  placeholder="Masukkan Pesan"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Maksimal Karakter:</label>
                                                <input type="text" class="form-control input-sm" size="5" maxlength="5" style="width: 50px;" name="counter" readonly="" placeholder="160">


                                            </div>

                                            <div class="box-footer clearfix">
                                                <button class="pull-right btn btn-success btn-flat" type="submit">Kirim Pesan <i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane" id="glyphicons">
                                <div class="box-body">

                                    <form action="index.php?modul=kirim_info" method="post">
                                        <div class="form-group">
                                            <label>Nama Group</label><br>
                                            <select name="tujuan" id="group" multiple="multiple" style="width: 680px" class="form-control">
                                                <?php
                                                include './config/koneksi.php';
                                                $q = mysql_query("SELECT *from groub");
                                                while ($r = mysql_fetch_array($q)) {
                                                    ?>
                                                    <option value="<?php echo $r['idgroup'] ?>">
                                                        <?php echo $r['nama_group'] ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Isi Pesan</label>
                                            <textarea class="form-control" name="message" rows="3" placeholder="Masukkan Pesan"></textarea>
                                        </div>
                                        <div class="box-footer clearfix">
                                            <button type="submit"  name="send1" class="pull-right btn btn-success btn-flat">Kirim Pesan <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                </div>
                </div>
                

                <!-- Main row -->



            </section><!-- /.Left col -->


        </aside><!-- /.right-side -->
    </body>
    <script src="http://127.0.0.1/SMS/pembayaran/js/select2.js" type="text/javascript"></script>
<script src="http://127.0.0.1/SMS/pembayaran/js/select2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#group").select2({
            placeholder: 'Pilih Group atau Ketik Nama Group',
            allowClear: true
        });
    });
</script>
</html>

