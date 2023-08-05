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
    $section2 = $_POST['section2'];
    $subsection2 = $_POST['subsection2'];
    $maps = $_POST['maps'];
    $gambarlama1 = $_POST['gambarlama1'];
    $gambarlama2 = $_POST['gambarlama2'];


    if (!file_exists($_FILES['gambar1']['tmp_name']) && !file_exists($_FILES['gambar2']['tmp_name']) || !is_uploaded_file($_FILES['gambar1']['tmp_name']) && !is_uploaded_file($_FILES['gambar2']['tmp_name'])) {
        $query = "UPDATE contact SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1', section2 = '$section2', subsection2 = '$subsection2', maps = '$maps' WHERE id = $id";
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
        //gambar 2 
        $gambar2 = $_FILES['gambar2']['name'];
        $tmpgambar2 = $_FILES['gambar2']['tmp_name'];
        $ukuran2 = $_FILES['gambar2']['size'];
        $exi2 = explode('.', $gambar2);
        $exi2 = strtolower(end($exi2));
        $namafilebaru2 = uniqid();
        $namafilebaru2 = '.';
        $namafilebaru2 = $exi2;

        if ($_FILES['gambar1']['error'] && $_FILES['gambar2']['error'] === 4) {
            $gambar = $gambarlama;
        } else {
            if ($gambar = move_uploaded_file($tmpgambar1, "aset/" . $namafilebaru1)) {
                $query = "UPDATE contact SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1', gambar1 = '$namafilebaru1', section2 = '$section2', subsection2 = '$subsection2', maps = '$maps' WHERE id = $id";
                //Untuk menghapus File yang lama
                if (file_exists("aset/$gambarlama1")) {
                    unlink("aset/$gambarlama1");
                }
            }
            if ($gambar = move_uploaded_file($tmpgambar2, 'aset/' . $namafilebaru2)) {
                $query = "UPDATE contact SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1', section2 = '$section2', subsection2 = '$subsection2', gambar2 = '$namafilebaru2', maps = '$maps' WHERE id = $id";
                if (file_exists("aset/$gamabarlama2")) {
                    unlink("aset/$gambarlama2");
                } else {
                    echo "<script>
                        alert('Gambar Tidak bisa dihapus');
                    </script>";
                }
            }
        }
    }
    $r = mysqli_query($connect, $query);

    if ($r) {
        echo "<script>
                        alert('data berhasil disimpan');
                    </script>";
        header('location:edit-contact.php');
    } else {
        echo "<script>
                        alert('data error');
                    </script>";
        header('location:edit-contact.php');
    }
}
