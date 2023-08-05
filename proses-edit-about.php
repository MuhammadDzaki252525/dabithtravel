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
    $gambarlama1 = $_POST['gambarlama1'];
    $gambarlama2 = $_POST['gambarlama2'];


    if (!file_exists($_FILES['gambar1']['tmp_name']) && !file_exists($_FILES['gambar5']['tmp_name']) && !file_exists($_FILES['gambar6']['tmp_name']) || !is_uploaded_file($_FILES['gambar1']['tmp_name']) && !is_uploaded_file($_FILES['gambar5']['tmp_name']) && !is_uploaded_file($_FILES['gambar6']['tmp_name'])) {
        $query = "UPDATE about SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1', section2 = '$section2', subsection2 = '$subsection2', section3 = '$section3', subsection3 = '$subsection3', section4 = '$section4', subsection4 = '$subsection4', section5 = '$section5', subsection5 = '$subsection5' , section6 = '$section6' , subsection6 = '$subsection6' WHERE id = $id";
    } else {
        $extensiboleh = array('jpg', 'png', 'gif', 'jpeg');
        $gambar1 = $_FILES['gambar1']['name'];
        $tmpgambar1 = $_FILES['gambar1']['tmp_name'];
        $exi1 = explode('.', $gambar1);
        $exi1 = strtolower(end($exi1));
        $namafilebaru1 = uniqid();
        $namafilebaru1 .= '.';
        $namafilebaru1 .= $exi1;
        $ukuran1 = $_FILES['gambar1']['size'];
        $gambar2 = $_FILES['gambar2']['name'];
        $exi2 = explode('.', $gambar2);
        $exi2 = strtolower(end($exi2));
        $namafilebaru2 = uniqid();
        $namafilebaru2 .= '.';
        $namafilebaru2 .= $exi2;
        $tmpgambar2 = $_FILES['gambar2']['tmp_name'];
        $ukuran2 = $_FILES['gambar2']['size'];
        $gambar3 = $_FILES['gambar3']['name'];
        $tmpgambar3 = $_FILES['gambar3']['tmp_name'];
        $ukuran3 = $_FILES['gambar3']['size'];
        $gambar4 = $_FILES['gambar4']['name'];
        $tmpgambar4 = $_FILES['gambar4']['tmp_name'];
        $ukuran4 = $_FILES['gambar4']['size'];
        $gambar5 = $_FILES['gambar5']['name'];
        $tmpgambar5 = $_FILES['gambar5']['tmp_name'];
        $ukuran5 = $_FILES['gambar5']['size'];
        $gambar6 = $_FILES['gambar6']['name'];
        $tmpgambar6 = $_FILES['gambar6']['tmp_name'];
        $ukuran6 = $_FILES['gambar6']['size'];


        $exi3 = explode('.', $gambar3);
        $exi3 = strtolower(end($exi3));
        $namafilebaru3 = uniqid();
        $namafilebaru3 .= '.';
        $namafilebaru3 .= $exi3;
        $exi4 = explode('.', $gambar4);
        $exi4 = strtolower(end($exi4));
        $namafilebaru4 = uniqid();
        $namafilebaru4 .= '.';
        $namafilebaru4 .= $exi4;
        $exi5 = explode('.', $gambar5);
        $exi5 = strtolower(end($exi5));
        $namafilebaru5 = uniqid();
        $namafilebaru5 .= '.';
        $namafilebaru5 .= $exi5;
        $exi6 = explode('.', $gambar6);
        $exi6 = strtolower(end($exi6));
        $namafilebaru6 = uniqid();
        $namafilebaru6 .= '.';
        $namafilebaru6 .= $exi6;
        if ($_FILES['gambar1']['error'] && $_FILES['gambar5']['error'] && $_FILES['gambar6']['error'] === 4) {
            $gambar = $gambarlama1;
            $gambar = $gambarlama2;
        } else {
            if ($gambar = move_uploaded_file($tmpgambar1, "aset/" . $namafilebaru1)) {
                $query = "UPDATE about SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1', gambar1 = '$namafilebaru1', section2 = '$section2', subsection2 = '$subsection2', section3 = '$section3', subsection3 = '$subsection3', section4 = '$section4', subsection4 = '$subsection4', section5 = '$section5', subsection5 = '$subsection5', section6 = '$section6' , subsection6 = '$subsection6' WHERE id = $id";
                //Untuk menghapus File yang lama
                if (file_exists("aset/$gambarlama1")) {
                    unlink("aset/$gambarlama1");
                }
            }
            if ($gambar = move_uploaded_file($tmpgambar5, "aset/" . $namafilebaru5)) {
                $query = "UPDATE about SET author = '$author', date = '$date', section1 = '$section1', subsection1 = '$subsection1', section2 = '$section2', subsection2 = '$subsection2', section3 = '$section3', subsection3 = '$subsection3', section4 = '$section4', subsection4 = '$subsection4', section5 = '$section5', subsection5 = '$subsection5', gambar5 = '$namafilebaru5', section6 = '$section6' , subsection6 = '$subsection6' WHERE id = $id";
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
        header('location:edit-about.php');
    } else {
        echo "<script>
                        alert('data error');
                    </script>";
        header('location:edit-about.php');
    }
}
