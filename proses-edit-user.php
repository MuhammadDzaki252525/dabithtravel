<?php
include "koneksi.php";
include "session1.php";
ob_start();
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $gambarlama = $_POST['gambarlama'];

    if (!file_exists($_FILES['gambar']['tmp_name']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])) {
        $query = "UPDATE login1 SET username = '$username', email = '$email',telephone = $telephone, password = '$password' where id = $id";
    } else {
        $extensiboleh = ['jpg', 'png', 'gif', 'jpeg'];
        $image = $_FILES['gambar']['name'];
        $tempatimage = $_FILES['gambar']['tmp_name'];
        $x = explode('.', $image);
        $x = strtolower(end($x));
        $ukuran = $_FILES['gambar']['size'];
        $ukuran = $_FILES['gambar']['size'];
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $x;
        $gambarlama = $_POST['gambarlama'];
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        } else {
            move_uploaded_file($tempatimage, "aset/" . $namafilebaru);
            $query = "UPDATE login1 SET username = '$username', email = '$email',telephone = $telephone, password = '$password' ,gambar = '$namafilebaru' WHERE id = $id";
            if (file_exists("aset/$gambarlama")) {
                unlink("aset/$gambarlama");
            }
        }
    }
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<script>
                alert('data berhasil diedit');
            </script>";
        echo "<meta http-equiv=refresh content=0;URL='edit-user.php?id=$id'>";
    } else {
        echo "<script>
                alert('data error');
            </script>";
        header('location:edit-user.php');
    }
}
