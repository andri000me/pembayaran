<?php
include "excel_reader2.php";
$username = "root";
$password = "";
$database = "db_layanan";

mysql_connect("localhost", $username, $password);
mysql_select_db($database);

// file yang tadinya di upload, di simpan di temporary file PHP, file tersebut yang kita ambil
// dan baca dengan PHP Excel Class
$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['tmp_name']);
$hasildata = $data->rowcount($sheet_index=0);



for ($i=2; $i<=$hasildata; $i++)
{
  
  $nim = $data->val($i,1); 
  $nama_mahasiswa = $data->val($i,2); 
  $tempat_lahir = $data->val($i,3);
  $tanggal_lahir = $data->val($i,4);
  $alamat = $data->val($i,5);
  $no_hp = $data->val($i,6);
  $jenis_kelamin = $data->val($i,7);
  $angkatan = $data->val($i,8);
  $idgroup = $data->val($i,9);
  $kd_prodi = $data->val($i,10);
 

$query = "INSERT INTO mahasiswa(nim,nama_mahasiswa,tempat_lahir,tanggal_lahir,alamat,no_hp,jenis_kelamin,angkatan,idgroup,kd_prodi) VALUES ('$nim','$nama_mahasiswa','$tempat_lahir','$tanggal_lahir','$alamat','$no_hp', '$jenis_kelamin','$angkatan','$idgroup','$kd_prodi')";
$hasil = mysql_query($query);

}


if ($hasil){
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
