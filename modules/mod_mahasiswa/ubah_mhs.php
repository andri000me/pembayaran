<?php
if(isset($_POST['kirim'])) {
	//print_r($_POST);
	include "config/koneksi.php";
	$nim=$_POST['nim'];
	$nama_mhs=$_POST['nama_mhs'];
        $tempat=$_POST['tempat'];
        $tanggal=$_POST['tanggal'];
        $alamat=$_POST['alamat'];
        $telpon=$_POST['telpon'];
        $jenis=$_POST['jenis'];
        $angkatan=$_POST['angkatan'];
        $group=$_POST['group'];
        $prodi=$_POST['prodi'];
	
        
	$sql="update mahasiswa set nim='$nim',nama_mahasiswa='$nama_mhs',tempat_lahir ='$tempat',tanggal_lahir='$tanggal',alamat='$alamat',no_hp='$telpon',jenis_kelamin='$jenis',angkatan='$angkatan',idgroup='$group',kd_prodi='$prodi' where nim='$_POST[nim]'";
	$query = mysql_query($sql);
        if($query){
		 $alert = "<div class=\"alert alert-success alert-dismissable\" id='pesan'>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                    <i class=\"fa fa-check\"></i>
                    <strong>Info!</strong> Data Berhasil Di Ubah.
                  </div>";
        $_SESSION['alert'] = $alert;
	} else {
		$alert = "<div class='alert alert-dismissable alert-warning'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <i class=\"fa fa-ban fa-fw\"></i>
                <h4>Warning..!!</h4>
                Maaf, Data Tidak bisa di Ubah..!!
               
             </div>";
            $_SESSION['alert'] = $alert;
	}
} else {echo "Tidak ada Data Yang Diubah"; }
?>
    <script type="text/javascript">document.location = "index.php?modul=datamahasiswa";</script>
    <?php