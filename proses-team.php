<?php
include "koneksi.php";
include "session1.php";
if (isset($_POST['submit'])) {
  $nama = ucfirst($_POST['nama']);
  $today = date("Y-m-d H:i:s");
  $email = $_POST['email'];
  $keterangan = $_POST['keterangan'];
  $jabatan = $_POST['jabatan'];
  $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
  $image = $_FILES['gambar']['name'];
  $path = $_FILES['gambar']['tmp_name'];
  $x = explode('.', $image);
  $x = strtolower(end($x));
  $ukuran = $_FILES['gambar']['size'];
  $namafilebaru = uniqid();
  $namafilebaru .= '.';
  $namafilebaru .= $x;
  if (!$ukuran < 2000000) {
    move_uploaded_file($path, 'aset/' . $namafilebaru);
    $query = "INSERT INTO team (nama, date, email, gambar, keterangan, jabatan) VALUES ('$nama', '$today','$email', '$namafilebaru','$keterangan', '$jabatan')";
    $results = mysqli_query($connect, $query);
    if ($results) {
      echo '<script>
              alert("berhasil di simpan");
          </script>';
      echo "<meta http-equiv=refresh content=0;URL='team.php'>";
    } else {
      '<script>
            alert("errror");
          </script>';
      echo "<meta http-equiv=refresh content=2;URL='create-team.php'>";
    }
  } else {
    echo "<script>
            alert('ukuran file gambar terlalu besar');
          </script>";
    echo "<meta http-equiv=refresh content=0;URL='create-team.php'>";
  }
}
