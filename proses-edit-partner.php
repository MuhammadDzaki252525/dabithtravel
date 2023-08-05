<?php
include "koneksi.php";
include "session1.php";

$idnew = $_SESSION['id'];
$tt = "SELECT * FROM login1 WHERE id = $idnew";
$yy = mysqli_query($connect, $tt);
$ii = mysqli_fetch_assoc($yy);
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $link = $_POST['link'];
  $gambarlama = $_POST['gambarlama'];
  if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
    $query = "UPDATE partner SET link = '$link' WHERE id = $id";
  } else {
    $ekstensi = array('png', 'jpg', 'jpeg', 'gif', 'svg');
    $image = $_FILES['image']['name'];
    $path = $_FILES['image']['tmp_name'];
    $ukuran = $_FILES['image']['size'];
    $exi = explode('.', $image);
    $exi = strtolower(end($exi));
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $exi;
    if ($_FILES['image']['error'] === 4) {
      $gambar = $gambarlama;
    } else {
      $gambar =
        move_uploaded_file($path, 'aset/' . $namafilebaru);
      $query = "UPDATE partner SET image = '$namafilebaru', link = '$link' WHERE id = $id";
      //Untuk menghapus File yang lama
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
    echo "<meta http-equiv=refresh content=0;URL='partner.php'>";
  } else {
    '<script>
            alert("errror");
          </script>';
    echo "<meta http-equiv=refresh content=2;URL='edit-partner.php?id=$id'>";
  }
}
