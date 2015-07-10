<?php

session_start();

require_once '../../config/koneksi.php';



$id_peminjaman = $_POST['id_peminjaman'];

if (trim($id_peminjaman) == "") {
    echo "<span class='label label-danger'>Tidak boleh kosong!</span>";
} else {

         $sql = "select * from pembayaran";
            $query = mysql_query($sql);
            while ($hasil = mysql_fetch_array($query)) {
                $tgl_bayar = $hasil['tgl_bayar'];
            
                
            


    //ambil data peminjaman
    // $peminjaman = mysql_fetch_array($select->selectAllException("peminjaman", "WHERE id_peminjaman='$id_peminjaman'"));
    // $tgl_pinjam = $peminjaman['tgl'];
    //abmil tahun bulan dan hari peminjaman
    $sampaiTahun = strpos($tgl_bayar, "-");
    $startBulan = $sampaiTahun + 1;
    $tahun_p = substr($tgl_bayar, 0, $sampaiTahun);
    $bulan_p = substr($tgl_bayar, $startBulan, strpos(substr($tgl_bayar, $startBulan), "-"));
    $tgl_p = substr($tgl_bayar, strpos(substr($tgl_bayar, $startBulan), "-") + 6);
    $tgl_p = $tgl_p + 7;
    $tgl_kembali = date("Y-m-d");
    $jam_kembali = date("H:i");
    //tahun bulan dan hari sekarang
    $tahun_s = date("Y");
    $bulan_s = date("m");
    $tgl_s = date("d");

    //[peraturan] 
    //peminjaman buku diizinkan hanya selama 7 hari
    // jika telat didenda Rp 500,-/hari

    $telat = 0;
    
    if ($tgl_s > $tgl_p || $bulan_s > $bulan_p || $tahun_s > $tahun_p) {

        if ($bulan_p == $bulan_s && $tahun_p == $tahun_s) {
            $telat = $tgl_s - $tgl_p;
        } elseif ($bulan_s > $bulan_p && $tahun_p == $tahun_s) {
            $bulan_t = 30 * (($bulan_s - $bulan_p) - 1);
            $telat = 30 - $tgl_p + $bulan_t + $tgl_s;
        } elseif ($tahun_s > $tahun_p) {
            $bulan_t = ((12 - $bulan_p) + ($bulan_s - 1)) * 30;
            $telat = 30 - $tgl_p + $bulan_t + $tgl_s;
        }
    }

    $denda = 500 * $telat;

    $pesanTelat = ($denda > 0 )? "Rp".$denda:"";

    // $id_buku = $peminjaman['id_buku'];
    // $dataBuku = mysql_fetch_array($select->selectAllException("buku", "WHERE id_buku='$id_buku'"));

    if (mysql_query("INSERT Into pengembalian value ('$id_peminjaman', '$tgl_kembali', '$jam_kembali', '$denda')")) {
        if (mysql_query("UPDATE peminjaman SET status='1' where id_peminjaman='$id_peminjaman'")) {
            $stok = $dataBuku['stok'] + 1;
            if (mysql_query("UPDATE buku SET stok='$stok' where id_buku='$id_buku'"))
                echo $pesanTelat;
        }
    }
}
}
    