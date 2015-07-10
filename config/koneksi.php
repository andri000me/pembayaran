<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_layanan";
 mysql_connect($server,$username,$password) or die ("koneksi gagal");
 mysql_select_db($database) or die ("database tidak ditemukan");
?>
