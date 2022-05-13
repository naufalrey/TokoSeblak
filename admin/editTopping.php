<?php
session_start();
if($_SESSION['status']!='login'){
    header("location:../index.php?pesan=belum_login");

}
// include database connection file
include_once("../config.php");
// Check if form is submitted for data update, then redirect to

if(isset($_POST['update']))
{
$id = $_POST['id'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
// update data
$result = mysqli_query($mysqli, "UPDATE topping SET
nama_topping='$nama',harga_topping='$harga' WHERE id_topping=$id");
// Redirect to homepage to display updated data in list
header("Location: halaman.php");
}
?>
<?php
// Display selected minuman based on id
// Getting id from url
$id = $_GET['id'];
// Fetch data based on id
$result = mysqli_query($mysqli, "SELECT * FROM topping WHERE
id_topping=$id");
while($topping = mysqli_fetch_array($result))
{
$nama = $topping['nama_topping'];
$harga = $topping['harga_topping'];
}
?>
<html>
<head>
<title>Edit Topping</title>
</head>
<body>
<a href="halaman.php">Home</a>
<br/><br/>
<h2>Edit Topping</h2>
<form name="update_toping" method="post"
action="editTopping.php">
<table border="0">
<tr>
<td>Nama Topping</td>
<td><input type="text" name="nama" value=<?php echo
$nama;?>></td>
</tr>
<tr>
<td>Harga Topping</td>
<td><input type="text" name="harga" value=<?php echo
$harga;?>></td>
</tr>
<tr>
<td><input type="hidden" name="id" value=<?php echo
$_GET['id'];?>></td>
<td><input type="submit" name="update"
value="Update"></td>
</tr>
</table>
</form>
</body>
</html>