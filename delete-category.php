<?php
    include "koneksi.php";

    $id = $_POST['id'] ;

    $query11 = sprintf("delete from category where id=$id");
    $results11 = mysqli_query($connect, $query11) or die(mysqli_error($connect));

    if($results11){
        header('location:categories.php');
    }
?>