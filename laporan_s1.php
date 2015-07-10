
<?php
session_start();
if (!isset($_SESSION['login-mahasiswa']))
    header("location:../login/login.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="jquery-2.1.3.js"></script>
        <?php include '../View/header_komponen.php'; ?>
    </head>
    <body class="skin-blue" >
        <!-- header logo: style can be found in header.less -->
        <header class="header">

            <!-- Header Navbar: style can be found in header.less -->
            <?php include '../View/header.php'; ?>

        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side strech">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="background:#EDEDED"><h1>
                        Data Pengajuan Skripsi | TA
                        <small>Program Studi</small>
                    </h1></section>
                <section class="content-header">                    
                    <form method="post">


                        <div class="box-body">

                            <div class="row">
                                <div class="col-xs-4">
                                    <label>Kompetensi</label><br>
                                    <label>
                                        <input required=""  value="RPL"type="radio" name="kompetensi" class="flat-red" />
                                        RPL
                                    </label>

                                    <label>
                                        <input required=""  value="JARKOM" type="radio" name="kompetensi" class="flat-red"/>
                                        JARKOM
                                    </label>
                                    <label>
                                        <input required=""  value="MM" type="radio" name="kompetensi" class="flat-red"/>
                                        MULTIMEDIA
                                    </label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Semester</label><br>
                                    <label>
                                        <input required=""  value="Ganjil"type="radio" name="semester" class="flat-red" />
                                        Ganjil
                                    </label>

                                    <label>
                                        <input required=""  value="Genap" type="radio" name="semester" class="flat-red"/>
                                        Genap
                                    </label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Periode</label><br>
                                    <label>
                                        <input required=""  value="1" type="radio" name="periode" class="flat-red" />
                                        1
                                    </label>

                                    <label>
                                        <input required=""  value="2" type="radio" name="periode" class="flat-red"/>
                                        2
                                    </label>
                                </div>
                                <!--                                <div class="col-xs-2">
                                                                    <label>Periode</label><br>
                                                                    <label> 1<input  value="1"type="checkbox" name="periode"   /></label>
                                                                    <label> 2<input  value="2"type="checkbox" name="periode"   /></label><br>
                                                                </div>-->
                                <div class="col-xs-2">
                                    <select required="" name="tahun" class="form-control">
                                        <option value="">Tahun Akademik</option>
                                        <option value="2008/2009" >2008/2009</option>
                                        <option value="2009/2010" >2009/2010</option>
                                        <option value="2010/2011" >2010/2011</option>
                                        <option value="2011/2012" >2011/2012</option>
                                        <option value="2012/2013" >2012/2013</option>
                                        <option value="2013/2014" >2013/2014</option>
                                        <option value="2014/2015" >2014/2015</option>
                                        <option value="2015/2016" >2015/2016</option>
                                        <option value="2016/2017" >2016/2017</option>
                                        <option value="2017/2018" >2017/2018</option>
                                        <option value="2018/2019" >2018/2019</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-7">
                                    <input  style="width:auto"  id="simpan" type="submit" value="Proses" name="proses" class="btn btn-primary" >
                                    <a id="pdf"  class="btn btn-primary"   href="laporan_pdf_s1.php?tahun=<?php echo $_POST['tahun'] ?>&smt=<?php echo $_POST['semester'] ?>&periode=<?php echo $_POST['periode'] ?>&kompetensi=<?php echo $_POST['kompetensi'] ?>" target="_blank"><i class="fa  fa-print"></i> Cetak PDF</a>
                                    <a id="exel"  class="btn btn-primary"   href="laporan_exel_s1.php?tahun=<?php echo $_POST['tahun'] ?>&smt=<?php echo $_POST['semester'] ?>&periode=<?php echo $_POST['periode'] ?>&kompetensi=<?php echo $_POST['kompetensi'] ?>" target="_blank"><i class="fa  fa-table"></i> Cetak EXEL</a>
                                </div>
                            </div>
                        </div>      
                        <script>
                            $("#pdf").hide();
                            $("#exel").hide();

                        </script> 
                    </form>
                    <?php
                    if (isset($_POST['proses'])) {
                        ?>
                        <script>
                            $("#pdf").show();
                            $("#exel").show();

                        </script>      
                        <?php
                        $tahun = $_POST['tahun'];
                        $periode = $_POST['periode'];
                        $semester = $_POST['semester'];
                        $kompetensi = $_POST['kompetensi'];

                        $sql = "SELECT * FROM pengajuan inner join mahasiswa on pengajuan.nim=mahasiswa.nim   where mahasiswa.jenjang='S1-TI' and
                             pengajuan.periode='$periode' and pengajuan.tahun='$tahun' and pengajuan.smt='$semester' and mahasiswa.kompetensi='$kompetensi'";
                    } else {
                        $sql = "SELECT * FROM pengajuan inner join mahasiswa on pengajuan.nim=mahasiswa.nim and mahasiswa.jenjang='S1-TI'";
                    }
                    ?>                    
                </section>
            </aside><!-- /.right-side -->

            <br>
            <!-- Main content -->

            <div class="container" >
                <section class="right-side">
                    <div class="row" style="margin-left: -310px ">

                        <div class="col-md-12">                
                            <div class="row">

                                <div class="box">
                                    <div class="box-hader">
                                        <h3 class="box-title">Data Pengajuan</h3>
                                        <div class="box-tools">

                                        </div>
                                    </div><!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr> 

                                                    <td>Nim</td>
                                                    <td>Nama</td>
                                                    <td>Judul</td>
                                                    <td>Tanggal Pengajuan</td>
                                                    <th>Jenis</th>
                                                    <th>Catatan Prodi</th>
                                                    <th>Catatan Pokja</th>
                                                    <th>Status Pengajuan</th>
                                                    <th>Status Syarat</th>
                                                    <th>Semester</th>
                                                    <th>Periode</th>
                                                    <th>Tahun Akademik</th>
                                                    <th>Kompetensi</th>


                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include '../../library.php';



                                                $query = mysql_query($sql);
                                                while ($row = mysql_fetch_assoc($query)) {
                                                    $nim = $row['nim'];
                                                    $id_pengajuan = $row['id_pengajuan'];
                                                    ?>

                                                    <tr>

                                                        <td><?php echo $row['nim'] ?></td>
                                                        <td><?php echo $row['nama_mhs'] ?></td>
                                                        <td><?php echo $row['judul'] ?></td>
                                                        <td><?php echo $row['tgl'] ?></td>
                                                        <td><?php echo $row['jenis'] ?></td>
                                                        <td><?php
                                                            include '../../library.php';
                                                            $sql = "SELECT * FROM catatan_prodi inner join pengajuan on pengajuan.id_pengajuan=catatan_prodi.id_pengajuan"
                                                                    . " where pengajuan.id_pengajuan='$id_pengajuan' group by pengajuan.id_pengajuan ";
                                                            $query_tampil = mysql_query($sql);
                                                            while ($row2 = mysql_fetch_array($query_tampil))
                                                                $id_pengajuan = $row2['id_pengajuan'];

                                                            $sql_peng = "select * FROM catatan_prodi left join pengajuan on pengajuan.id_pengajuan=catatan_prodi.id_pengajuan"
                                                                    . " where pengajuan.id_pengajuan='$id_pengajuan'";
                                                            $query_ta = mysql_query($sql_peng);
                                                            while ($row1 = mysql_fetch_assoc($query_ta)) {



                                                                echo "<p class='table table-bordered table-striped'>" . $row1['Judul'] . "</p>";
                                                            }
                                                            ?></td>



                                                        <td  >
                                                            <?php
                                                            $sql = "SELECT * FROM catatan_seminar inner join pengajuan
                                on pengajuan.id_pengajuan=catatan_seminar.id_pengajuan where 
                                pengajuan.id_pengajuan='$id_pengajuan' ";
                                                            $query_tampil = mysql_query($sql);
                                                            while ($row2 = mysql_fetch_array($query_tampil)) {
                                                                echo "<p >" . $row2['Catatan_seminar'] . "</p>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $row['status_pengajuan'] ?></td>
                                                        <td><?php echo $row['status_syarat'] ?></td>
                                                        <td><?php echo $row['smt'] ?></td>
                                                        <td><?php echo $row['periode'] ?></td>
                                                        <td><?php echo $row['tahun'] ?></td>
                                                        <td><?php echo $row['kompetensi'] ?></td>

                                                        <td>    
                                                            <div class="btn btn-group-vertical">
                                                                <a  class="btn btn-primary" data-toggle="modal"  href="../pengajuan/pengajuan_edit.php?id_pengajuan=<?php echo $row['id_pengajuan'] ?>"><i class="fa fa-edit"></i> ubah</a>
                                                                <a  onclick="return confirm('Apakah Anda Yakin Menghapus <?php echo $row['nama_mhs'] ?> ?')" class="btn btn-primary" href="../pengajuan/pengajuan_delete.php?id=<?php echo $row['id_pengajuan'] ?>"><i class="fa fa-ban"></i>Hapus</a>
                                                                <a  class="btn btn-primary"   href="../catatan_prodi/catatan_input_1.php?nim=<?php echo $row['id_pengajuan'] ?>"><i class="fa  fa-spinner"></i> Catatan Prodi</a>
                                                                <a  class="btn btn-primary"   href="../laporan/catatan_pokja.php?nim=<?php echo $row['id_pengajuan'] ?>"><i class="fa  fa-spinner"></i> Catatan Pokja</a>

                                                            </div> 

                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                                ?>
                                            </tbody>   
                                        </table>

                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->



                            </div>





                        </div><!-- /.col (right) -->
                    </div><!-- /.row -->

                </section><!-- /.content -->

            </div>

        </div><!-- ./wrapper -->


    </body>
</html>

<script src="../../js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../js/AdminLTE/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>
<?php include '../View/footer_scrip.php'; ?>
   
