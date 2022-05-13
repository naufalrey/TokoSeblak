<?php
session_start();
if($_SESSION['status']!='login'){
    header("location:../index.php?pesan=belum_login");

}
// include database connection file
include_once("../config.php");
// Get id from URL to delete that data
$id = $_GET['id'];
// Delete data row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM paketan WHERE
id_paketan='$id'");
// After delete redirect to Home, so that latest user list will be

header("Location:recyclebin.php");
?>