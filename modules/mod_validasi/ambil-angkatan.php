<?php

include "../../config/koneksi.php";
$nim_mhs = $_GET['inputNim'];
$sql_cekangkatan = mysql_query("select nim, angkatan from mahasiswa
                    where nim='" . $nim_mhs . "'");
$dt_angkatan = mysql_fetch_assoc($sql_cekangkatan);
$ada_angkatan = mysql_num_rows($sql_cekangkatan);
echo $dt_angkatan['angkatan'];
//echo $ada_mhs;

