<?php

include  '../../config/koneksi.php';


$strhtml = "<h3>Data Pembayaran Mahasiswa</h3>";
$strhtml = "<table>
                <tr>
                    <th>No</th>
                    <th>Tanggal Bayar</th>
                    <th>Nim</th>
                    <th>Nama Mahasiswa</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>Jenis Bayar</th>
                    <th>Jumah</th>
                    <th>Status</th>
                    <th>ID Staf</th>
                </tr>";
$query = mysql_query("SELECT * FROM pembayaran where status='Lunas'");
while ($data = mysql_fetch_array($query)) {
$strhtml = "<tr>
                        <td>$data[kd_pembayaran]</td>
                        <td>$data[tgl_bayar]</td>
                        <td>$data[nim]</td>
                        <td>$data[nama_mahasiswa]</td>
                        <td>$data[kd_prodi]</td>
                        <td>$data[angkatan]</td>
                        <td>$data[jenis_pembayaran]</td>
                        <td>$data[jumlah]</td>
                        <td>$data[status]</td>
                        <td>$data[kd_staf]</td>
                </tr>";
}
$strhtml = "</table>";
$now = date("F J, Y, g:i a");
$strhtml = "<p> Dicetak Pada : $now </p>";

include  '../../library/mpdf.php';
$style = file_get_contents('css/style.css');
$filename = 'reportpdf--' .  date('d-m-Y'). '-'.  date('h.i.s');
$mpdf = new mPDF('utf-8','A4',0,'',10,10,5,1,1,1,'');
$mpdf ->WriteHTML($style,1);
$mpdf ->WriteHTML($strhtml);
$mpdf ->Output('laporan/' .$filename. '.pdf','D');
                    
?>