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
    $section3 = $_POST['section3'];
    $subsection3 = $_POST['subsection3'];
    $section4 = $_POST['section4'];
    $subsection4 = $_POST['subsection4'];
    $section5 = $_POST['section5'];
    $subsection5 = $_POST['subsection5'];
    $section6 = $_POST['section6'];
    $subsection6 = $_POST['subsection6'];
    $section7 = $_POST['section7'];
    $subsection7 = $_POST['subsection7'];
    $gambarlama1 = $_POST['gambarlama1'];
    $gambarlama2 = $_POST['gambarlama2'];

    if (!file_exists($_FILES['gambar1']['tmp_name']) && !file_exists($_FILES['gambar2']['tmp_name']) && !file_exists($_FILES['gambar3']['tmp_name']) && !file_exists($_FILES['gambar4']['tmp_name']) && !file_exists($_FILES['gambar5']['tmp_name']) && !file_exists($_FILES['gambar6']['tmp_name']) && !file_exists($_FILES['gambar7']['tmp_name']) || !is_uploaded_file($_FILES['gambar1']['tmp_name']) && !is_uploaded_file($_FILES['gambar2']['tmp_name']) && !is_uploaded_file($_FILES['gambar3']['tmp_name']) && !is_uploaded_file($_FILES['gambar4']['tmp_name']) && !is_uploaded_file($_FILES['gambar5']['tmp_name']) && !is_uploaded_file($_FILES['gambar6']['tmp_name']) && !is_uploaded_file($_FILES['gambar7']['tmp_name'])) {
        $query = "UPDATE home SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1', section2 = '$section2', subsection2 = '$subsection2', section3 = '$section3', subsection3 = '$subsection3', section4 = '$section4', subsection4 = '$subsection4', section5 = '$section5', subsection5 = '$subsection5' , section6 = '$section6' , subsection6 = '$subsection6', section7 = '$section7', subsection7 = '$subsection7' WHERE id = $id";
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
        $namafilebaru2 .= '.';
        $namafilebaru2 .= $exi2;
        //gambar 3
        $gambar3 = $_FILES['gambar3']['name'];
        $tmpgambar3 = $_FILES['gambar3']['tmp_name'];
        $ukuran3 = $_FILES['gambar3']['size'];
        $exi3 = explode('.', $gambar3);
        $exi3 = strtolower(end($exi3));
        $namafilebaru3 = uniqid();
        $namafilebaru3 .= '.';
        $namafilebaru3 .= $exi3;
        // gambar 4
        $gambar4 = $_FILES['gambar4']['name'];
        $tmpgambar4 = $_FILES['gambar4']['tmp_name'];
        $ukuran4 = $_FILES['gambar4']['size'];
        $exi4 = explode('.', $gambar4);
        $exi4 = strtolower(end($exi4));
        $namafilebaru4 = uniqid();
        $namafilebaru4 .= '.';
        $namafilebaru4 .= $exi4;
        // gambar 5
        $gambar5 = $_FILES['gambar5']['name'];
        $tmpgambar5 = $_FILES['gambar5']['tmp_name'];
        $ukuran5 = $_FILES['gambar5']['size'];
        $exi5 = explode('.', $gambar5);
        $exi5 = strtolower(end($exi5));
        $namafilebaru5 = uniqid();
        $namafilebaru5 .= '.';
        $namafilebaru5 .= $exi5;
        // gambar 6
        $gambar6 = $_FILES['gambar6']['name'];
        $tmpgambar6 = $_FILES['gambar6']['tmp_name'];
        $ukuran6 = $_FILES['gambar6']['size'];
        $exi6 = explode('.', $gambar6);
        $exi6 = strtolower(end($exi6));
        $namafilebaru6 = uniqid();
        $namafilebaru6 .= '.';
        $namafilebaru6 .= $exi6;
        // gambar 7
        $gambar7 = $_FILES['gambar7']['name'];
        $tmpgambar7 = $_FILES['gambar7']['tmp_name'];
        $ukuran7 = $_FILES['gambar7']['size'];
        $exi7 = explode('.', $gambar7);
        $exi7 = strtolower(end($exi7));
        $namafilebaru7 = uniqid();
        $namafilebaru7 .= '.';
        $namafilebaru7 .= $exi7;

        if ($_FILES['gambar1']['error'] && $_FILES['gambar5']['error'] === 8) {
            $gambar = $gambarlama1;
            $gambar = $gambarlama2;
        } else {
            if ($gambar = move_uploaded_file($tmpgambar1, "aset/" . $namafilebaru1)) {
                $query = "UPDATE home SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1', gambar1 = '$namafilebaru1', section2 = '$section2', subsection2 = '$subsection2', section3 = '$section3', subsection3 = '$subsection3', section4 = '$section4', subsection4 = '$subsection4', section5 = '$section5', subsection5 = '$subsection5', section6 = '$section6' , subsection6 = '$subsection6', section7 = '$section7', subsection7 = '$subsection7' WHERE id = $id";
                //Untuk menghapus File yang lama
                if (file_exists("aset/$gambarlama1")) {
                    unlink("aset/$gambarlama1");
                }
            }
            if ($gambar = move_uploaded_file($tmpgambar5, "aset/" . $namafilebaru5)) {
                $query = "UPDATE home SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1', section2 = '$section2', subsection2 = '$subsection2', section3 = '$section3', subsection3 = '$subsection3', section4 = '$section4', subsection4 = '$subsection4', section5 = '$section5', subsection5 = '$subsection5', gambar5 = '$namafilebaru5', section6 = '$section6' , subsection6 = '$subsection6', section7 = '$section7', subsection7 = '$subsection7' WHERE id = $id";
                if (file_exists("aset/$gambarlama2")) {
                    unlink("aset/$gambarlama2");
                }
            }
        }
    }
    $r = mysqli_query($connect, $query);

    if ($r) {
        echo "<script>
                        alert('data berhasil disimpan');
                    </script>";
        header('location:edit-home.php');
    } else {
        echo "<script>
                        alert('data error');
                    </script>";
        header('location:edit-home.php');
    }
}
