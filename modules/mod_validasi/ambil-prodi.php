<?php

include "../../config/koneksi.php";
$nim_mhs = $_GET['inputNim'];
$sql_cekprodi = mysql_query("select nim, kd_prodi from mahasiswa
                    where nim='" . $nim_mhs . "'");
$dt_prodi = mysql_fetch_assoc($sql_cekprodi);
$ada_prodi = mysql_num_rows($sql_cekprodi);
echo $dt_prodi['kd_prodi'];
//echo $ada_mhs;

