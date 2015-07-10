<?php
include "../../config/koneksi.php";
require_once 'excel/excel_reader2.php';
$data = new Spreadsheet_Excel_Reader();
//$data->setOutputEncoding('CP1251');

// Ambil Value Dari Inputan Form
$data = new Spreadsheet_Excel_Reader($_FILES['dataku']['tmp_name']);
$baris = $data->rowcount($sheet_index=0);
 
for ($x=2; $x <= count($data->sheets[0]["cells"]); $x++) {
    // Mendefinisikan Shell dalam File Excel Sejumlah Field yang ada di tabel
    $nim = $data->sheets[0]["cells"][$x][1];
 $nama_mahasiswa = $data->sheets[0]["cells"][$x][2];
    $tempat_lahir = $data->sheets[0]["cells"][$x][3];
 $tanggal_lahir = $data->sheets[0]["cells"][$x][4];
 $alamat = $data->sheets[0]["cells"][$x][5];
 $no_hp = $data->sheets[0]["cells"][$x][6];
 $jenis_kelamin = $data->sheets[0]["cells"][$x][7];
 $angkatan = $data->sheets[0]["cells"][$x][8];
    $idgroup = $data->sheets[0]["cells"][$x][9];
 $kd_prodi = $data->sheets[0]["cells"][$x][10];
 // Simpan Ke Tabel
    $simpan = mysql_query("INSERT INTO mahasiswa VALUES ('$nim','$nama_mahasiswa','$tempat_lahir','$tanggal_lahir','$alamat','$no_hp','$jenis_kelamin','$angkatan','$idgroup','$kd_prodi')");
    //print_r($simpan);
 if (!$simpan){
 	$alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <i class=\"fa fa-ban fa-fw\"></i>
                <h4>Warning..!!</h4>
               Data ".$x." Gagal di Import, cek Format Data..!!
               
             </div>";
            $_SESSION['alert'] = $alert;
 } else {
           $alert = "<div class=\"alert alert-info alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-info\"></i>
                    <strong>Info!</strong> Data Berhasil di Import...!!
                  </div>";
        $_SESSION['alert'] = $alert;
        }
        ?>
    <script type="text/javascript">document.location = "index.php?modul=datamahasiswa";</script>
    <?php
    ?>

