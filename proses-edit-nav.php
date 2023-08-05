<?php 
include "koneksi.php";
include "session1.php";
ob_start();
if (isset($_POST['submit'])){
        
        $username = $_SESSION['username'];
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $tentang = $_POST['tentang'];
        $day = date("Y-m-d H:i:s");
        $keterangan = $_POST['keterangan'];
        $link = $_POST['link']; 
        if (!file_exists($_FILES['gambar']['tmp_name']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])){
            $query = "UPDATE navbar SET judul = '$judul', author = '$username', tentang = '$tentang' , keterangan = '$keterangan', date = '$day', link = '$link' where id = $id"; 
        }else{
            $extensiboleh = array('jpg', 'png', 'gif','jpeg');
        $image = $_FILES['gambar']['name'];
        $tempatimage = $_FILES['gambar']['tmp_name'];
        $x = explode('.',$image);
        $extension = strtolower(end($x));
        $ukuran = $_FILES['gambar']['size'];
            if(in_array($extension, $extensiboleh)){
                if(!$ukuran < 2000000){
                    move_uploaded_file($tempatimage, "aset/". $image);
                    $query = "UPDATE navbar SET judul = '$judul', tentang = '$tentang' , author = '$username', gambar = '$image', keterangan = '$keterangan', date = '$day', link = '$link' where id = $id";
                    
                }else{        
                
                    echo "<meta http-equiv=refresh content=0;URL='edit-pages.php?id=$id'>";
                    echo "<script>
                            alert('data gambar terlalu besar');
                        </script>";

                }
            }else{
            
                echo "<meta http-equiv=refresh content=0;URL='edit-pages.php'>";
                echo "<script>
                    alert('data harus berupa gambar');
                </script>";
            }
        }
        $result = mysqli_query($connect, $query);

                    if($result){
                        echo "<script>
                            alert('data berhasil diedit');
                        </script>";
                        header('location:pages.php');
                    }else{
                        echo "<script>
                            alert('data error');
                        </script>";
                        header('location:edit-pages.php');
                    }
    }
?>