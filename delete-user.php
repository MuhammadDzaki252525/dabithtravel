<?php
    include "koneksi.php";

    $id = $_POST['id'];

    $query = sprintf("DELETE FROM login1 WHERE id = $id");
    $sql = "SELECT * FROM login1 WHERE id = $id";
    $jalankan = mysqli_query($connect, $sql);
    $out = mysqli_fetch_assoc($jalankan);
    $foto = $out['gambar'];
    if(file_exists("aset/$foto")){
        unlink("aset/$foto");
    }
    $results = mysqli_query($connect, $query);

    if($results){
        header('location:user.php');
    }
?>