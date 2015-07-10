<?php
        session_start();
	ob_start();
	//print_r($_POST);
	include "config/koneksi.php";
	$kode=$_POST['kode'];
	$nama_staf=htmlspecialchars($_POST['nama_staf']);
	$alamat=$_POST['alamat'];
        $email=  strip_tags($_POST['email']);
        $sandi=  $_POST['sandi'];
        $cekdata = "select kd_staf, email from staf where kd_staf = '$kode' and email='$email'";
$ada = mysql_query($cekdata)or die(mysql_error());
if(mysql_num_rows($ada)>0){
?>
        <script>
            alert('Maaf, ID Identitas yang Anda Masukkan Sudah Ada..!!');
            window.location = 'index.php';
        </script>
        <?php
          
}else{
	$sql="insert into staf values('$kode','$nama_staf','$alamat','$email','$sandi')";
	$query = mysql_query($sql);
	if($query){
            ?>
        
       <link href="style/super-hero/bootstrap.css" rel="stylesheet">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Daftar Akun Staf Keuangan Berhasil..</h4>
                        </div>
                        <div class="modal-body">
                            <p><strong>Selamat Datang <?php echo $nama_staf; ?></strong></p>
                            <p>Silahkan Anda Login Menggunkan Akun dibawah ini. . .</p>
                            <p>Username : <b><strong><?php echo $email; ?></strong></b></p>
                            <p>Password : <b><strong><?php echo $sandi; ?></strong></b></p>
                            
                            <p>Anda bisa merubah Password Anda setelah Login melalui menu Data Staf. Terima Kasih.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="index.php"><button type="button" class="btn btn-primary">Lanjutkan Untuk Login</button></a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                  <?php
            } else {
                ?>
                <script>
                    alert('Maaf, User Gagal Di Buat. Terjadi Kesalahan. Hubungi Admin (Bag.Kemahasiswaan)<?php echo mysqli_error($link); ?>');
                    window.location = 'index.php';
                </script>
                <?php
            }
}
        