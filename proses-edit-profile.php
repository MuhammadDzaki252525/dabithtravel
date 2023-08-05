<?php
include 'koneksi.php';
include 'session1.php';
ob_start();
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $telephone = mysqli_real_escape_string($connect, $_POST['telephone']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $gambarlama = $_POST['gambarlama'];
    if (!file_exists($_FILES['gambar']['tmp_name']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])) {
        $query = "update login1 set username = '$username', email = '$email', 
            telephone = $telephone, password = '$password' where id = $id";
    } else {
        $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
        $image = $_FILES['gambar']['name'];
        $path = $_FILES['gambar']['tmp_name'];
        $exi = explode('.', $image);
        $exi = strtolower(end($exi));
        $ukuran = $_FILES['gambar']['size'];
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $exi;
        $gambarlama = $_POST['gambarlama'];
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        } else {
            $gambar =
                move_uploaded_file($path, 'aset/' . $namafilebaru);
            $query = "update login1 set username = '$username', email = '$email', 
            telephone = $telephone, password = '$password', gambar = '$namafilebaru' where id = $id";
            if (file_exists("aset/$gambarlama")) {
                unlink("aset/$gambarlama");
            }
        }
    }
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>
                alert('Berhasil mengganti profile');
                </script>";
        echo "<meta http-equiv=refresh content=0;URL='profile.php'>";
    }
}
