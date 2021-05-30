<?php
session_start();

//import file config untuk koneksi ke database
require('db_config.php');

$username=$_POST['username'];
$password=$_POST['password'];

if($username == "" || $password == ""){
    header("location:login.php?pesan=gagal");
    //Menghentikan proses kebawah
    exit;
}
//Mengubah password menjadi MD5
$password_new = md5($password);

// Cari data ke dalam db dengan username dan password yang sama
$data = mysqli_query($mysqli,"select * from user where username='$username' and password='$password_new'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$res = mysqli_fetch_assoc($data);
	$_SESSION['name'] = $res['fullname'];
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:../index.php");
}else{
    header("location:login.php?pesan=tidak_cocok");
}
?>