<?php 
    include "koneksi.php";
    include "session1.php";

    if(isset($_POST['submit'])){

        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $quer = "UPDATE site SET judul = '$judul'";
        $res = mysqli_query($connect, $quer);
        
        if($res){
            header("Location:site.php");
        }
    }
?>