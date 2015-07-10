<?php

include "../../config/koneksi.php";
$nim_mhs = $_GET['inputNim'];
$sql_ceknim = mysql_query("select nim, nama_mahasiswa from mahasiswa
                    where nim='" . $nim_mhs . "'");
$dt_nama = mysql_fetch_assoc($sql_ceknim);
$ada_mhs = mysql_num_rows($sql_ceknim);
echo $dt_nama['nama_mahasiswa'];
//echo $ada_mhs;

