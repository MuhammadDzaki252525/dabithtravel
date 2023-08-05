<?php
include "koneksi.php";
include "session1.php";
$idnew = $_SESSION['id'];
$tt = "SELECT * FROM login1 WHERE id = $idnew";
$yy = mysqli_query($connect, $tt);
$ii = mysqli_fetch_assoc($yy);
if (isset($_POST['submit'])) {
  $username = $ii['username'];
  $judul = $_POST['judul'];
  $today = date("Y-m-d H:i:s");
  $keterangan = $_POST['keterangan'];
  $category = $_POST['category'];
  $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
  $image = $_FILES['gambar']['name'];
  $path = $_FILES['gambar']['tmp_name'];
  $x = explode('.', $image);
  $x = strtolower(end($x));
  $ukuran = $_FILES['gambar']['size'];
  $namafilebaru = uniqid();
  $namafilebaru .= '.';
  $namafilebaru .= $exi;
  if (!$ukuran < 2000000) {
    move_uploaded_file($path, 'aset/' . $namafilebaru);
    $query = "INSERT INTO inipost (judul,author, gambar, date ,keterangan ,category) VALUES ('$judul', '$username','$namafilebaru', '$today', '$keterangan', '$category');";
    $results = mysqli_query($connect, $query);
    if ($results) {
      echo '<script>
              alert("berhasil di simpan");
          </script>';
      echo "<meta http-equiv=refresh content=0;URL='post-1.php'>";
    } else {
      '<script>
            alert("errror");
          </script>';
      echo "<meta http-equiv=refresh content=2;URL='create-post.php'>";
    }
  } else {
    echo "<script>
            alert('ukuran file gambar terlalu besar');
          </script>";
    echo "<meta http-equiv=refresh content=0;URL='create-post.php'>";
  }
}
