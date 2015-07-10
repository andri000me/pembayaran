<?php
if(isset($_POST['kirim'])) {
	//print_r($_POST);
	include "config/koneksi.php";
	$username=$_POST['username'];
	$password=htmlspecialchars($_POST['password']);
	
	$sql="update staf set password='$password' where email='$_POST[username]'";
	$query = mysql_query($sql);
        if($query){
            ?>
        
       <link href="style/super-hero/bootstrap.css" rel="stylesheet">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Ubah Password Berhasil..</h4>
                        </div>
                        <div class="modal-body">
                            
                            <p>Silahkan Anda Login Menggunkan Akun dibawah ini. . .</p>
                            <p>Username     : <b><strong><?php echo $username; ?></strong></b></p>
                            <p>Password Baru: <b><strong><?php echo $password; ?></strong></b></p>
                            
                            <p>Anda bisa merubah Password Anda setelah Login melalui menu Data Staf. Terima Kasih.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="index.php"><button type="button" class="btn btn-primary">Lanjutkan Untuk Login</button></a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                  <?php
            }else {
                ?>
                <script>
                    alert('Maaf, User Gagal Di Buat. Terjadi Kesalahan. Hubungi Admin (Bag.Kemahasiswaan)<?php echo mysqli_error($link); ?>');
                    window.location = 'index.php';
                </script>
                <?php
            }
        }