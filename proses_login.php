<?php
session_start();
include 'koneksi.php';
$username=$_POST['username'];
$password=$_POST['password'];
$data= mysqli_query($koneksi,"select * from login where username='$username' and password='$password'");
$cek= mysqli_num_rows($data); 
if($cek>0){
	$data = mysqli_fetch_assoc($data);
	if($data['level']=="admin"){
		$_SESSION['username']=$username;
		$_SESSION['level']="admin";
		header("location:security_login/home");
	}elseif ($data['level']=="student"){
		$_SESSION['username']=$username;
		$_SESSION['level']="student";
		header("location:index2.php");
	}else{
	header("location:../index.php?pesan=gagal");
	}
}
?>