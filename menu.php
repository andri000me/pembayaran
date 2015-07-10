<?php

if (isset($_GET['modul'])) {
    $menu = $_GET['modul'];
} else {
    $menu = "";
}
if ($menu == '') {
    include "modules/mod_beranda/home.php";
} elseif ($menu == 'pesanIndividu') {
    include "modules/mod_kirimPesan/pesan_individu.php";
} else if ($menu == "PesanGroup") {
    include "modules/mod_kirimPesan/pesan_grup.php";
} else if ($menu == "Informasi") {
    include "modules/mod_info/info.php";
} else if ($menu == "outbox") {
    include "modules/mod_outbox/outbox.php";
} else if ($menu == "sent") {
    include "modules/mod_sentitem/senditem.php";
}elseif ($menu=="gagal") {
   include "modules/mod_sentitem/gagal.php";  
} else if ($menu == "kirimpesan") {
    include "modules/mod_kirimPesan/kirim_pesan.php";
} else if ($menu == "Inbox") {
    include "modules/mod_inbox/inbox.php";
} else if ($menu == "test") {
    include"test1.php";
} else if ($menu == "validasi") {
    include"modules/mod_validasi/validasi.php";
} else if ($menu == "pembayaran") {
    include "modules/mod_pembayaran/pembayaran.php";
} else if ($menu == "prodi") {
    include "modules/mod_prodi/prodi.php";
} else if ($menu == "datamahasiswa") {
    include "modules/mod_mahasiswa/mahasiswa.php";
} else if ($menu == "datastaf") {
    include "modules/mod_staf/staf.php";
} else if ($menu == "ubah_staf") {
    include "modules/mod_staf/ubah_staf.php";
} else if ($menu == "ubah_prodi") {
    include "modules/mod_prodi/ubah_prodi.php";
} else if ($menu == "jadwal") {
    include "modules/mod_info/info.php";
} else if ($menu == "simpan_staf") {
    include "modules/mod_staf/simpan_staf.php";
}elseif ($menu == "editstaf") {
    include 'modules/mod_staf/proses_editstaf.php';
} else if ($menu == "simpan_prodi") {
    include "modules/mod_prodi/simpan_prodi.php";
}elseif ($menu == "editprodi") {
    include 'modules/mod_prodi/proses_editprodi.php';
}elseif ($menu == "kirim_info") {
    include 'modules/mod_kirimPesan/send1.php';
}elseif ($menu == "kirim_personal") {
    include 'modules/mod_kirimPesan/pesan_individu.php';  
}elseif ($menu == "hapus_staf"){
    include 'modules/mod_staf/hapus_staf.php';
}elseif($menu == "hapus_prodi"){
    include './modules/mod_prodi/hapus_prodi.php';
}elseif ($menu=="simpan_info") {
    include './modules/mod_info/simpan_info.php';
}elseif ($menu == "ubah_info"){
    include './modules/mod_info/ubah_info.php';
}elseif ($menu == "update_info"){
    include './modules/mod_info/update_info.php';
}elseif ($menu=="hapus_info") {
    include './modules/mod_info/hapus_info.php';
    
}elseif ($menu =="service"){
    include './modules/mod_service/service_runing.php';
}elseif ($menu =="hapus_inbox"){
    include './modules/mod_inbox/hapus_inbox.php';
}elseif ($menu =="hapus_outbox"){
    include './modules/mod_outbox/hapus_outbox.php';
}elseif ($menu =="hapus_send"){
    include './modules/mod_sentitem/hapus_send.php';
}elseif ($menu == "data_ortu"){
    include './modules/mod_ortu/data_ortu.php';
}elseif ($menu =="simpan_ortu") {
    include './modules/mod_ortu/simpan_ortu.php';
    
}elseif ($menu =="ubah_ortu"){
    include './modules/mod_ortu/ubah_ortu.php';
}elseif ($menu=="proses_ubahortu"){
    include './modules/mod_ortu/edit_prodi.php';
}elseif ($menu=="hapus_ortu"){
    include './modules/mod_ortu/hapus_ortu.php';
}elseif ($menu == "notifikasi") {
    include './modules/mod_validasi/notifikasi.php';
    
}elseif ($menu == "group"){
    include './modules/mod_grub/grup.php';
}elseif ($menu == "simpan_group"){
    include './modules/mod_grub/simpan_grup.php';
}elseif ($menu=="test_grup") {
    include './coba_grup.php';
}elseif($menu=="laporan_s1"){
    include './modules/laporan/laporan_s1.php';
}elseif($menu=='laporan_d3ti'){
    include './modules/laporan/laporan_d3ti.php';
}elseif($menu=='laporan_d3mi'){
    include './modules/laporan/laporan-d3mi.php';
}elseif($menu=="ubah_mahasiswa"){
    include './modules/mod_mahasiswa/ubah_mahasiswa.php';
}elseif($menu=="hapus_grup"){
    include './modules/mod_grub/hapus_grup.php';
}elseif($menu=="ubah_mhs"){
    include './modules/mod_mahasiswa/ubah_mhs.php';
}elseif ($menu=="profil"){
    include 'modules/mod_staf/profil.php';
}elseif ($menu=="ubah_profil") {
    include 'modules/mod_staf/ubah_profil.php';
}elseif ($menu=="ubah_grup") {
    include 'modules/mod_grub/ubah_grub.php';
}elseif ($menu=="proses_grub") {
    include 'modules/mod_grub/edit_grup.php';
}elseif($menu=='peringatan'){
    include 'modules/mod_pembayaran/pesan_warning.php';
}elseif ($menu=='dispensasi') {
    include 'modules/mod_pembayaran/validasi_dispen.php';
    # code...
}elseif($menu=="valid_dispen"){
    include 'modules/mod_pembayaran/valid.php';
}elseif($menu=="import"){
    include 'modules/mod_mahasiswa/import1.php';
}elseif($menu=="datadispensasi"){
    include 'modules/mod_pembayaran/dispensasi.php';
}elseif($menu=="history"){
    include 'modules/mod_pembayaran/history.php';
}elseif($menu=="hapus_mhs"){
    include 'modules/mod_mahasiswa/hapus_mhs.php';
}elseif($menu=="ulang"){
    include 'modules/mod_sentitem/ulang.php';
}
?>