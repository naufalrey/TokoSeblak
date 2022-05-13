<?php 
// mengaktifkan session php
session_start();
include 'config.php';
// menghubungkan dengan koneksi


// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($mysqli,"select * from loginfo where username='$username' and password=MD5('$password')");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:admin/halaman.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>