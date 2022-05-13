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
$result = mysqli_query($mysqli, "UPDATE minuman SET
nama_minuman='$nama',harga_minuman='$harga' WHERE id_minuman='$id'");
// Redirect to homepage to display updated data in list
header("Location: halaman.php");
}
?>
<?php
// Display selected minuman based on id
// Getting id from url
$id = $_GET['id'];
// Fetch data based on id
$result = mysqli_query($mysqli, "SELECT * FROM minuman WHERE
id_minuman='$id'");
while($minuman = mysqli_fetch_array($result))
{
$nama = $minuman['nama_minuman'];
$harga = $minuman['harga_minuman'];
}
?>
<html>
<head>
<title>Edit Minuman</title>
</head>
<body>
<a href="halaman.php">Home</a>
<br/><br/>
<h2>Edit Minuman</h2>
<form name="update_minuman" method="post"
action="editMinuman.php">
<table border="0">
<tr>
<td>Nama Minuman</td>
<td><input type="text" name="nama" value=<?php echo
$nama;?>></td>
</tr>
<tr>
<td>Harga Minuman</td>
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