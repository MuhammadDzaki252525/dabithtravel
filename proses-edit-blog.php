<?php
include "koneksi.php";
include "session1.php";
ob_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $author = $_SESSION['username'];
    $date = date("Y-m-d H:i:s");
    $section1 = $_POST['section1'];
    $subsection1 = $_POST['subsection1'];
    $gambarlama = $_POST['gambarlama'];

    if (!file_exists($_FILES['gambar1']['tmp_name']) || !is_uploaded_file($_FILES['gambar1']['tmp_name'])) {
        $query = "UPDATE blog SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1' WHERE id = $id";
    } else {
        $extensiboleh = array('jpg', 'png', 'gif', 'jpeg');
        //gambar 1
        $gambar1 = $_FILES['gambar1']['name'];
        $tmpgambar1 = $_FILES['gambar1']['tmp_name'];
        $ukuran1 = $_FILES['gambar1']['size'];
        $exi1 = explode('.', $gambar1);
        $exi1 = strtolower(end($exi1));
        $namafilebaru1 = uniqid();
        $namafilebaru1 .= '.';
        $namafilebaru1 .= $exi1;

        if ($_FILES['gambar1']['error'] === 4) {
            $gambar = $gambarlama;
        } else {
            if ($gambar = move_uploaded_file($tmpgambar1, "aset/" . $namafilebaru1)) {
                $query = "UPDATE blog SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1', gambar1 = '$namafilebaru1' WHERE id = $id";
                //Untuk menghapus file yang lama
                if (file_exists("aset/$gambarlama")) {
                    unlink("aset/$gambarlama");
                }
            }
        }
    }
    $r = mysqli_multi_query($connect, $query);

    if ($r) {
        echo "<script>
                        alert('data berhasil disimpan');
                    </script>";
        header('location:edit-blog.php');
    } else {
        echo "<script>
                        alert('data error');
                    </script>";
        header('location:edit-blog.php');
    }
}
