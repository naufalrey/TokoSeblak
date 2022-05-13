<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<title>Add Topping</title>
</head>
<body>
    
<a href="halaman.php">Go to Home</a>
<br/><br/>
<h2>Tambah Topping</h2>
<form action="add.php" method="post" name="form2">
<table width="25%" border="0">
<tr>
<td>Nama Topping</td>
<td><input type="text" name="nama"></td>
</tr>
<tr>
<td>Harga</td>
<td><input type="text" name="harga"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="Submit"
value="Add"></td>
</tr>
</table>
</form>
<?php
session_start();
if($_SESSION['status']!='login'){
    header("location:../index.php?pesan=belum_login");

}
// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
$nama = $_POST['nama'];
$harga = $_POST['harga'];
// include database connection file
include_once("../config.php");
// Insert user data into table
$result = mysqli_query($mysqli, "INSERT INTO
topping(nama_topping,harga_topping) VALUES('$nama','$harga')");
// Show message when user added
echo "Berhasil menambahkan Topping dengan nama $nama <a
href='halaman.php'> pergi ke dashboard</a>";
}
?>
</body>
</html>