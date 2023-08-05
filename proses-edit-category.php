<?php
include "koneksi.php";
include "session1.php";
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $descripsi = $_POST['descripsi'];
    $query = "UPDATE category SET nama = '$nama', descripsi = '$descripsi' WHERE id = $id";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo '<script>
                    alert("Data Berhasil Dirubah!");
                </script>';
        echo "<meta http-equiv=refresh content=0;URL='edit-category.php?id=$id'>";
    } else {
        echo '<script>
                    alert("Data gagal!");
                </script>';
    }
}
