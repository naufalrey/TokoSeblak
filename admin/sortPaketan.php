<!DOCTYPE html>
<?php
session_start();
if($_SESSION['status']!='login'){
    header("location:../index.php?pesan=belum_login");

}
// Create database connection using config file
include_once("../config.php");

// Fetch data

$paketan = mysqli_query($mysqli, "SELect * from paketanfix where is_delete=0 order by harga_paket asc");


?>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-
scale=1.0">

<a href="halaman.php">Go to Home</a>
<h3>Tabel Paketan</h3>

<table width='80%' border=1>

<tr>
<th>Nama Paket</th> <th>Topping 1</th> <th>Topping 2</th> <th>Topping 3</th><th>Minuman</th>

<th>Harga Paket</th>  
</tr>
<?php

include_once("../config.php");

// Fetch data

$paketan = mysqli_query($mysqli, "SELect * from paketanfix where is_delete=0 order by harga_paketan asc");
while($item = mysqli_fetch_array($paketan)) {

echo "<tr>";

echo "<td>".$item['nama_paketan']."</td>";
echo "<td>".$item['fld1']."</td>";
echo "<td>".$item['fld2']."</td>";
echo "<td>".$item['fld3']."</td>";
echo "<td>".$item['nama_minuman']."</td>";
echo "<td>".$item['harga_paketan']."</td>";

}
?>
</table>



</body>


</html>
