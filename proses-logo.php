r<?php
  include "koneksi.php";
  include "session1.php";
  if (isset($_POST['submit'])) {
    $ekstensi = array('png', 'jpg', 'jpeg', 'gif', 'svg');
    $image = $_FILES['logo']['name'];
    $path = $_FILES['logo']['tmp_name'];
    $gambarlama = $_POST['gambarlama'];
    $exi = explode('.', $image);
    $exi = strtolower(end($exi));
    $ukuran = $_FILES['logo']['size'];
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $exi;
    if ($_FILES['logo']['error'] === 4) {
      $gambar = $gambarlama;
    } else {
      $gambar =
        move_uploaded_file($path, 'aset/' . $namafilebaru);
      $queryt = "UPDATE logo SET logo = '$namafilebaru'";
      if (file_exists("aset/$gambarlama")) {
        unlink("aset/$gambarlama");
      }
    }
  }
  $result = mysqli_query($connect, $queryt);
  if ($result) {
    echo '<script>
                alert("berhasil di simpan");
            </script>';
    echo "<meta http-equiv=refresh content=0;URL='logo.php>";
  } else {
    '<script>
              alert("errror");
            </script>';
    echo "<meta http-equiv=refresh content=2;URL='logo.php>";
  }

  ?>