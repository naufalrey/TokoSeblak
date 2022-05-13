<?php
session_start();
if($_SESSION['status']!='login'){
    header("location:../index.php?pesan=belum_login");

}
    //Create Database Connection
    include_once("../config.php");

    //Fetch Data
    $topping = mysqli_query($mysqli, "SELECT * FROM topping WHERE is_delete=1 ORDER BY id_topping asc");
    $paketan = mysqli_query($mysqli, "SELECT * FROM paketan where is_delete=1 order by id_paketan asc");
    $minuman = mysqli_query($mysqli, "SELECT * FROM minuman where is_delete=1 order by id_minuman asc");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recycle Bin Seblak</title>
    </head>
    <body>
        <div style="text-align: center">
            <h1>Data Seblak Terhapus</h1>
        </div>
        
       
        <table width='80%' border=1>
            <tr>
                <th>Nama Topping</th>   <th>Harga Topping</th>  <th>Aksi</th>   
            </tr>

            <?php
                while($item = mysqli_fetch_array($topping)) {
                    echo "<tr>"; 
                    echo "<td>".$item['nama_topping']."</td>"; 
                    echo "<td>".$item['harga_topping']."</td>"; 
                    echo "<td><a href='restoreTopping.php?id=$item[id_topping]'>Restore</a>
                    | 
                    <a href='deletePrmnnTopping.php?id=$item[id_topping]'>Hapus Permanen</a></td></tr>"; 
                }
            ?>
        </table><br>
        <table width='80%' border=1>
            <tr>
                <th>Nama Minuman</th>   <th>Harga Minuman</th>  <th>Aksi</th>   
            </tr>

            <?php
                while($item = mysqli_fetch_array($minuman)) {
                    echo "<tr>"; 
                    echo "<td>".$item['nama_minuman']."</td>"; 
                    echo "<td>".$item['harga_minuman']."</td>"; 
                    echo "<td><a href='restoreMinuman.php?id=$item[id_minuman]'>Restore</a>
                    | 
                    <a href='deletePrmnnMinuman.php?id=$item[id_minuman]'>Hapus Permanen</a></td></tr>"; 
                }
            ?>
        </table><br>
        <table width='80%' border=1>
            <tr>
                <th>Nama Paketan</th>   <th>Harga Topping</th>  <th>Aksi</th>   
            </tr>

            <?php
            
                while($item = mysqli_fetch_array($paketan)) {
                    echo "<td>".$item['nama_paketan']."</td>";
                    echo "<td>".$item['harga_paketan']."</td>";
                    echo "<td><a href='restorePaketan.php?id=$item[id_paketan]'>Restore</a>
                    | 
                    <a href='deletePrmnnPaketan.php?id=$item[id_paketan]'>Hapus Permanen</a></td></tr>"; 
                }
            ?>
        </table><br>

        
        
        <div style="text-align: left">
            <b><a href="halaman.php">Home Page</a></b>
        </div>
    </body>
</html>
