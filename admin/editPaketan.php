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
$topping1=$_POST['topping1'];
$topping2=$_POST['topping2'];
$topping3=$_POST['topping3'];
$minuman=$_POST['minuman'];
// update data
$result = mysqli_query($mysqli, "UPDATE paketan SET
nama_paketan='$nama',harga_paketan='$harga',id_topping1='$topping1',id_topping2='$topping2',id_topping3='$topping3',id_minuman='$minuman' WHERE id_paketan='$id'");

// Redirect to homepage to display updated data in list
header("Location: halaman.php");
}
?>
<?php
// Display selected minuman based on id
// Getting id from url
$id = $_GET['id'];
// Fetch data based on id
$result = mysqli_query($mysqli, "SELECT * FROM paketan WHERE
id_paketan='$id'");
while($paketan = mysqli_fetch_array($result))
{
$nama = $paketan['nama_paketan'];
$harga = $paketan['harga_paketan'];
$topping1 = $paketan['id_topping1'];
$topping2 = $paketan['id_topping2'];
$topping3 = $paketan['id_topping3'];
$minuman = $paketan['id_minuman'];
}
$dbtopping = mysqli_query($mysqli, "SELECT * FROM topping WHERE
is_delete=0 ORDER BY id_topping ASC");
$dbminuman = mysqli_query($mysqli, "Select * from minuman where is_delete=0 order by id_minuman asc");
?>
<html>
<head>
<title>Edit Paketan</title>
</head>
<body>
<a href="halaman.php">Home</a>



<h2>Edit Paketan</h2>
<form name="update_paketan" method="post"
action="editPaketan.php">
<table border="0">
<tr>
<td>Nama Paketan</td>
<td><input type="text" name="nama" value=<?php echo
$nama;?>></td>
</tr>
<tr>
<td>Harga Paketan</td>
<td><input type="text" name="harga" value=<?php echo
$harga;?>></td>
</tr>
<tr>
<td>ID Topping 1</td>
<td><input type="text" name="topping1" value=<?php echo
$topping1;?>></td>
</tr>
<tr>
<td>ID Topping 2</td>
<td><input type="text" name="topping2" value=<?php echo
$topping2;?>></td>
</tr>
<tr>
<td>ID Topping 3</td>
<td><input type="text" name="topping3" value=<?php echo
$topping3;?>></td>
</tr>
<tr>
<td>ID Minuman</td>
<td><input type="text" name="minuman" value=<?php echo
$minuman;?>></td>
</tr>
<tr>
<td><input type="hidden" name="id" value=<?php echo
$_GET['id'];?>></td>
<td><input type="submit" name="update"
value="Update"></td>
</tr>
</table>
</form>
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