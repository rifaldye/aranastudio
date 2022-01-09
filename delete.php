<?php
require "koneksi.php";
session_start();
if (!isset($_SESSION['username']) || !isset($_GET['id'])) {
  header("location:index.php");
}
$id = $_GET['id'];

$query = "DELETE FROM post WHERE id=$id";

if(mysqli_query($conn,$query)){
  header("location:mywork.php");
}else{
  echo "gagal";
}

?>