<?php
include "koneksi.php";
include "session.php";

ob_start();
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
    $image = $_FILES['gambar']['name'];
    $path = $_FILES['gambar']['tmp_name'];
    $x = explode('.', $image);
    $x = strtolower(end($x));
    $ukuran = $_FILES['gambar']['size'];
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $x;

    $k = "SELECT * FROM login1 WHERE username = '$username' or email = '$email'";
    $o = mysqli_query($connect, $k);

    if (mysqli_num_rows($o) > 0) {
        echo "<script>
				alert('user sudah ada');	
			</script>";
        echo "<meta http-equiv=refresh content=0;URL='create-user.php'>";
    } elseif ($password == $password2) {
        move_uploaded_file($path, 'aset/' . $namafilebaru);
        $query = "insert into login1 (username, email, telephone, password, gambar) values ('$username', '$email', $telephone , '$password', '$namafilebaru');";

        $results = mysqli_query($connect, $query);
        if ($results) {
            '<script>
                alert("berhasil di simpan");
            </script>';
            echo "<meta http-equiv=refresh content=0;URL='user.php'>";
        } else {
            echo '<script>
                alert("error");
                </script>';
            echo "<meta http-equiv=refresh content=0;URL='create-user.php'>";
        }
    } elseif ($password !== $password2) {
        echo "<script>alert('password salah');</script>";
        echo "<meta http-equiv=refresh content=2;URL='create-user.php'>";
    }
}
