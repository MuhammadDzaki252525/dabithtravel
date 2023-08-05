<?php
include "koneksi.php";
include "session1.php";
ob_start();

if (isset($_POST['submit'])) {
    $author = $_SESSION['username'];
    $date = date("Y-m-d H:i:s");
    $section1 = $_POST['section1'];
    $subsection1 = $_POST['subsection1'];
    $section2 = $_POST['section2'];
    $subsection2 = $_POST['subsection2'];
    $maps = $_POST['maps'];

    if (!file_exists($_FILES['gambar1']['tmp_name']) && !file_exists($_FILES['gambar2']['tmp_name']) || !is_uploaded_file($_FILES['gambar1']['tmp_name']) && !is_uploaded_file($_FILES['gambar2']['tmp_name'])) {
        $query = "INSERT INTO contact (author, date, section1, subsection1, gambar1 ,section2, subsection2, gambar2, maps) VALUES ('$author', '$date', '$section1', '$subsection1', '',  '$section2', '$subsection2', '', '$email')";
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

        if (move_uploaded_file($tmpgambar1, "aset/" . $namafilebaru1)) {
            $query = "INSERT INTO contact (author, date, section1, subsection1, gambar1, section2, subsection2, gambar2, maps) VALUES ('$author', '$date', '$section1', '$subsection1', '$namafilebaru1', '$section2', '$subsection2', '', '$maps')";
        }
        if (move_uploaded_file($tmpgambar2, "aset/" . $namafilebaru2)) {
            $query = "INSERT INTO contact (author, date, section1, subsection1, gambar1, section2, subsection2, gambar2, maps) VALUES ('$author', '$date', '$section1', '$subsection1', '', '$section2', '$subsection2', '$namafilebaru2', '$maps')";
        }
    }
    $r = mysqli_query($connect, $query);

    if ($r) {
        echo "<script>
                            alert('data berhasil disimpan');
                        </script>";
        header('location:pages.php');
    } else {
        echo "<script>
                            alert('data error');
                        </script>";
        header('location:create-pages.php');
    }
}
