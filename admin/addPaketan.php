<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<title>Add Paketan</title>
</head>
<body>
<a href="halaman.php">Go to Home</a>
<br/><br/>
<h2>Tambah Paketan</h2>
<form action="addPaketan.php" method="post" name="form2">
<table width="25%" border="0">
<tr>
<td>Nama Paketan</td>
<td><input type="text" name="nama" ></td>
</tr>
<tr>
<td>Harga Paketan</td>
<td><input type="text" name="harga" ></td>
</tr>
<tr>
<td>ID Topping 1</td>
<td><input type="text" name="topping1" ></td>
</tr>
<tr>
<td>ID Topping 2</td>
<td><input type="text" name="topping2" ></td>
</tr>
<tr>
<td>ID Topping 3</td>
<td><input type="text" name="topping3" ></td>
</tr>
<tr>
<td>ID Minuman</td>
<td><input type="text" name="minuman" ></td>
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
include("../config.php");
$dbtopping = mysqli_query($mysqli, "SELECT * FROM topping WHERE
is_delete=0 ORDER BY id_topping ASC");
$dbminuman = mysqli_query($mysqli, "Select * from minuman where is_delete=0 order by id_minuman asc");
?>
<?php

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$harga=$_POST['harga'];
$topping1=$_POST['topping1'];
$topping2=$_POST['topping2'];
$topping3=$_POST['topping3'];
$minuman=$_POST['minuman'];
// include database connection file
include_once("../config.php");
// Insert user data into table
$result = mysqli_query($mysqli, "INSERT INTO
paketan(nama_paketan,harga_paketan, id_topping1,id_topping2,id_topping3,id_minuman) VALUES('$nama','$harga','$topping1','$topping2','$topping3','$minuman')");
// Show message when user added
echo "Berhasil menambahkan Paketan <a
href='halaman.php'> pergi ke dashboard</a>";
}

?>

<table width='80%' border=1>

<tr>

<th>ID Topping</th><th>Nama Topping</th> <th>Harga Topping</th> 
</tr>
<?php
while($item = mysqli_fetch_array($dbtopping)) {
echo "<tr>";
echo "<td>".$item['id_topping']."</td>";
echo "<td>".$item['nama_topping']."</td>";
echo "<td>".$item['harga_topping']."</td>";

}
?>
<table width='80%' border=1>

<tr>

<th>ID Minuman</th><th>Nama Minuman</th> <th>Harga Minuman</th> 
</tr>
<?php
while($item = mysqli_fetch_array($dbminuman)) {
echo "<tr>";
echo "<td>".$item['id_minuman']."</td>";
echo "<td>".$item['nama_minuman']."</td>";
echo "<td>".$item['harga_minuman']."</td>";

}
?>
</table>
</body>
</html>