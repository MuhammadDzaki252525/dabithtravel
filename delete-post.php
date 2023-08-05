<?php
include 'koneksi.php';

$id = $_POST['id'];

$query = sprintf("delete from inipost where id = $id");
$sql = "SELECT * FROM inipost WHERE id = $id";
$hpsgbr = mysqli_query($connect, $sql);
$jalankan = mysqli_fetch_array($hpsgbr);
$foto = $jalankan['gambar'];
if (file_exists("aset/$foto")) {
	unlink("aset/$foto");
}

$results = mysqli_query($connect, $query);

if ($results) {
	header('location:post-1.php');
}
