<?php
	ob_start();
	session_start();
	include "config/koneksi.php";
	$user=$_POST['user'];
	$sandi=$_POST['sandi'];
	$sql="select * from staf where email='$user' and password='$sandi'";
	$query=mysql_query($sql);
	$jml_data=mysql_num_rows($query);
	if($jml_data>0){
		$_SESSION['login-admin']="";
		$data=mysql_fetch_assoc($query);
		$_SESSION['nama']=$data['nama_staf'];
		$_SESSION['kode']=$data['kd_staf'];
		header("location:index.php");		
	}else{
		$info = "<div class='alert alert-dismissable alert-danger text-center'>
                <button type='button' class='close' data-dismiss='alert'>x</button>
                <h4>Oops!</h4>
                Maaf, Akun Anda yang Masukkan Salah..!!, Cek Username atau Password Anda.
               
             </div>";
            $_SESSION['info-login'] = $info;
             header("location:login.php");
	}
?>