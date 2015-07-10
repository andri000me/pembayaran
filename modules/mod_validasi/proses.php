<?php

        $jmlDenda = mysql_real_escape_string(htmlentities($_POST['jmlPembayaran']));

        $tglBayar = $_POST['tgl1'];
        $tglBatas = $_POST['tgl'];

        $tahunb = substr($tglBayar, 0, 4);
        $bulanb = substr($tglBayar, 5, 2);
        $tglb = substr($tglBayar, 8, 2);



        // echo $tglBayarp.' '.$bulanp.' '.$tahunp;

        $denda = 0;

        $tahun = substr($tglBatas, 0, 4);
        $bulan = substr($tglBatas, 5, 2);
        $tanggal = substr($tglBatas, 8, 2);

        if(
            ($tglb > $tanggal && $bulanb >= $bulan && $tahunb >= $tahun) ||
            ($bulanb > $bulan && $tahunb >= $tahun) ||
            ($tahunb > $tahun)
            ){
            $denda = 10/100*$jmlDenda;
        }
        // elseif($bulanb >= $bulan && $tahunb >= $tahun){
        //     $denda = 10/100*$jmlDenda;
        // }elseif($tahunb >= $tahun){
        //     $denda = 10/100*$jmlDenda;
        // }

        echo $denda;
