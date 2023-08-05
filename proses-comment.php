<?php
    include "koneksi.php";

    if(isset($_POST['submit'])){
        $id = $_POST['id']; 
        $comment = $_POST['komentar'];
        $role = $_POST['role'];

        $query = "INSERT INTO komentar VALUES(NULL, '$comment', '$role')";
        $result = mysqli_query($connect, $query);
        
        if($result){
            echo "<script>alert('Komentar diterima kembali ke blog');</script>";
            echo "<meta http-equiv=refresh content=0;URL='blog.php'>";
        }else{
            echo "<script>alert('Komentar Gagal');</script>";
            echo "<meta http-equiv=refresh content=0;URL='detailblog.php'>";
        }
    }
?>