<!DOCTYPE html>
<?php
session_start();
if($_SESSION['status']!='login'){
    header("location:../index.php?pesan=belum_login");

}
// Create database connection using config file
include_once("../config.php");

// Fetch data
$topping = mysqli_query($mysqli, "SELECT * FROM topping WHERE
is_delete=0 ORDER BY harga_topping ASC");
$paketan = mysqli_query($mysqli, "SELect * from paketanfix where is_delete=0");
$minuman = mysqli_query($mysqli, "Select * from minuman where is_delete=0 order by harga_minuman asc");

?>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-
scale=1.0">

<title>Homepage Seblak</title>

</head>
<body><div style="text-align: center">
<h1>Tugas Akhir</h1>
<h2>Database Seblak</h2></div>
<h3>Tabel Topping</h3>

<table width='80%' border=1>
<a href="add.php">Tambah Topping</a>
<tr>

<th>Nama Topping</th> <th>Harga Topping</th> <th>Aksi</th>
</tr>
<?php
while($item = mysqli_fetch_array($topping)) {
echo "<tr>";
echo "<td>".$item['nama_topping']."</td>";
echo "<td>".$item['harga_topping']."</td>";
echo "<td><a href='editTopping.php?id=$item[id_topping]'>Edit</a>
| <a
href='deleteTopping.php?id=$item[id_topping]'>Delete</a></td></tr>";
}
?>
</table>
<h3> Tabel Minuman </h3>
<table width='80%' border=1>
<a href="addMinuman.php">Tambah Minuman</a>
<tr>

<th>Nama Minuman</th> <th>Harga Minuman</th> <th>Aksi</th>
</tr>
<?php
while($item = mysqli_fetch_array($minuman)) {
echo "<tr>";
echo "<td>".$item['nama_minuman']."</td>";
echo "<td>".$item['harga_minuman']."</td>";
echo "<td><a href='editMinuman.php?id=$item[id_minuman]'>Edit</a>
| <a
href='deleteMinuman.php?id=$item[id_minuman]'>Delete</a></td></tr>";
}
?>
</table>
<h3>Tabel Paketan</h3>
<a href="addPaketan.php">Tambah Paketan</a>
<a href="sortPaketan.php">Sort Paketan</a>
<table width='80%' border=1>

<tr>
<th>Nama Paket</th> <th>Topping 1</th> <th>Topping 2</th> <th>Topping 3</th><th>Minuman</th>

<th>Harga Paket</th>  <th>Aksi</th>
</tr>
<?php
while($item = mysqli_fetch_array($paketan)) {

echo "<tr>";

echo "<td>".$item['nama_paketan']."</td>";
echo "<td>".$item['fld1']."</td>";
echo "<td>".$item['fld2']."</td>";
echo "<td>".$item['fld3']."</td>";
echo "<td>".$item['nama_minuman']."</td>";
echo "<td>".$item['harga_paketan']."</td>";
echo "<td><a href='editPaketan.php?id=$item[id_paketan]'>Edit</a>
| <a
href='deletePaketan.php?id=$item[id_paketan]'>Delete</a></td></tr>";
}
?>
</table>
<form action="halaman.php" method="post" name="form2">
<table width="50%" border="0">
<tr>
<td>Pencarian Paketan Berdasar Nama</td>
<td><input type="text" name="pencarian"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="search"
value=Search></td>
</tr>
</table>
</form>
<table width='80%' border=1>


<?php

$search =mysqli_query($mysqli, "select * from paketanfix where is_delete=0 and UPPER(nama_paketan) like UPPER('%null%')");

if(isset($_POST["search"]))
{
   
    $txtsearch=$_POST["pencarian"];
    
    
     $search =mysqli_query($mysqli, "select * from paketanfix where is_delete=0 and UPPER(nama_paketan) like UPPER('%$txtsearch%')");
    
        
}
if(mysqli_num_rows($search)>0)
{

while($item =mysqli_fetch_array($search)) {
    echo"<tr>";
    echo"<th>Nama Paket</th>";
    echo"<th>Topping 1</th>";
    echo" <th>Topping 2</th>";
    echo" <th>Topping 3</th>";
    echo"<th>Minuman</th>";    
    echo"<th>Harga Paket</th>"; 
    echo"</tr>";
    echo "<tr>";
    
    echo "<td>".$item["nama_paketan"]."</td>";
    echo "<td>".$item["fld1"]."</td>";
    echo "<td>".$item["fld2"]."</td>";
    echo "<td>".$item["fld3"]."</td>";
    echo "<td>".$item["nama_minuman"]."</td>";
    echo "<td>".$item["harga_paketan"]."</td>";
    
    }
}
if (mysqli_num_rows($search)==0)
{
    echo "
        <div> 
        Nama Paketan Kosong
        </div>
        ";
}
?>

</table>



<h3>Recycle Bin </h3>
<a href='recyclebin.php'>
<img src= "recyclebin.jpg" width='50' height='50' >
</a>
</body>


<h4 > Log Out </h4>
<a href="logout.php">
<img src="logout.jpg" width="50" height="50">
</html>
