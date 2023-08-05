<?php
    include "koneksi.php";
    include "session1.php";
    ob_start();

    if (isset($_POST['submit'])){
        $username = $_SESSION['username'];
        $judul = $_POST['judul'];
        $tentang = $_POST['tentang'];
        $day = date("Y-m-d H:i:s");
        $keterangan = $_POST['keterangan'];
        $link = $_POST['link'];
        $extensiboleh = array('jpg', 'png', 'gif','jpeg');
        $image = $_FILES['gambar']['name'];
        $tempatimage = $_FILES['gambar']['tmp_name'];
        $x = explode('.',$image);
        $extension = strtolower(end($x));
        $ukuran = $_FILES['gambar']['size'];
        if (!file_exists($_FILES['gambar']['tmp_name']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])){
            $query = "INSERT INTO navbar (judul, tentang, author, gambar, keterangan, date,link) VALUES ('$judul', '$tentang', '$username', '', '$keterangan', '$day', '$link')";
        
        }else{
            if(in_array($extension, $extensiboleh)){
                if(!$ukuran < 2000000){
                    move_uploaded_file($tempatimage, "aset/". $image);
                    $query = "INSERT INTO navbar (judul, author, gambar, keterangan, date, link) VALUES ('$judul', '$username', '$image', '$keterangan', '$day', '$link')";
                    
                }else{
                    echo "<script>
                            alert('data gambar terlalu besar');
                        </script>";
                        echo "<meta http-equiv=refresh content=0;URL='create-pages.php'>";
                }
            }else{
                echo "<script>
                    alert('data harus berupa gambar');
                </script>";
                echo "<meta http-equiv=refresh content=0;URL='create-pages.php'>";
            }
        }
        $result = mysqli_query($connect, $query);

                    if($result){
                        echo "<script>
                            alert('data berhasil disimpan');
                        </script>";
                        header('location:pages.php');
                    }else{
                        echo "<script>
                            alert('data error');
                        </script>";
                        header('location:create-pages.php');
                    }
    }  
?>