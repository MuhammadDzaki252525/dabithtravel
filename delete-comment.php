<?php
    include "koneksi.php";

    $id = $_POST['id'] ;

    $query = sprintf("delete from komentar where id=$id");
    $results = mysqli_query($connect, $query) or die(mysqli_error($connect));

    if($results){
        header('location:comment.php');
    }
?>