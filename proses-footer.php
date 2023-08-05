<?php
include 'koneksi.php';
$id = $_POST['id'];
$judul = $_POST['judul'];
$column1 = $_POST['column1'];
$column2 = $_POST['column2'];
$column3 = $_POST['column3'];
$column4 = $_POST['column4'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$instagram = $_POST['instagram'];
$linked = $_POST['linked'];
$youtube = $_POST['youtube'];
$gambarlama = $_POST['gambarlama'];
if (!file_exists($_FILES['gambar']['tmp_name']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])) {
	$query = "update footer set judul = '$judul', column1 = '$column1', column2 = '$column2', column3 = '$column3', column4 = '$column4', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', linked = '$linked', youtube = '$youtube' where id = $id";
} else {
	$ekstensi = array('png', 'jpg', 'jpeg', 'gif', 'svg');
	$image = $_FILES['gambar']['name'];
	$path = $_FILES['gambar']['tmp_name'];
	$exi = explode('.', $image);
	$exi = strtolower(end($exi));
	$ukuran = $_FILES['gambar']['size'];
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $exi;
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarlama;
	} else {
		move_uploaded_file($path, 'aset/' . $namafilebaru);
		$query = "update footer set gambar = '$namafilebaru' , judul = '$judul', column1 = '$column1', column2 = '$column2', column3 = '$column3', column4 = '$column4', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', linked = '$linked', youtube = '$youtube' where id = $id";
		if (file_exists("aset/$gambarlama")) {
			unlink("aset/$gambarlama");
		}
	}
}
$results = mysqli_query($connect, $query);
if ($results) {
	header('location:footer.php');
} else {
	echo "salah";
}
