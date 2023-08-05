<?php
include "koneksi.php";
include "session1.php";
if (isset($_POST['submit'])) {
  $link = $_POST['link'];
  if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
    $query = "INSERT INTO partner (image, link) VALUES ('','$link');";
  } else {
    $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
    $image = $_FILES['image']['name'];
    $path = $_FILES['image']['tmp_name'];
    $exi = explode('.', $image);
    $exi = strtolower(end($exi));
    $ukuran = $_FILES['image']['size'];
    move_uploaded_file($path, 'aset/' . $image);
    $query = "INSERT INTO partner (image, link) VALUES ('$image', '$link');";
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
    echo "<meta http-equiv=refresh content=2;URL='partner.php'>";
  }
}
