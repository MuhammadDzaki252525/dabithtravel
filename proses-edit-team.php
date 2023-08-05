<?php
include "koneksi.php";
include "session1.php";
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $today = date("Y-m-d H:i:s");
  $email = $_POST['email'];
  $keterangan = $_POST['keterangan'];
  $jabatan = $_POST['jabatan'];
  $gambarlama = $_POST['gambarlama'];

  if (!file_exists($_FILES['gambar']['tmp_name']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])) {
    $query = "UPDATE team SET nama = '$nama', date = '$today', email = '$email', keterangan = '$keterangan', jabatan = '$jabatan' WHERE id = $id";
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
      $gambar =
        move_uploaded_file($path, 'aset/' . $namafilebaru);
      $query = "UPDATE team SET nama = '$nama', date = '$today', email = '$email', gambar = '$namafilebaru', keterangan = '$keterangan', jabatan = '$jabatan' WHERE id = $id";

      if (file_exists("aset/$gambarlama")) {
        unlink("aset/$gambarlama");
      }
    }
  }
  $results = mysqli_query($connect, $query);
  if ($results) {
    echo '<script>
              alert("berhasil di simpan");
          </script>';
    echo "<meta http-equiv=refresh content=0;URL='edit-team.php?id=$id'>";
  } else {
    '<script>
            alert("errror");
          </script>';
    echo "<meta http-equiv=refresh content=2;URL='edit-team.php?id=$id'>";
  }
}
