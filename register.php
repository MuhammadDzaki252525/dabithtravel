<?php
include "koneksi.php";
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-warning">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Please Registration!</h1>
                                    </div>
                                    <form class="user" method="POST" action="register.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter username ...." name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user" id="telephone" aria-describedby="emailHelp" placeholder="Enter Telephone..." name="telephone" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password2" placeholder="Password" name="password2" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile02" name="gambar" required>
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="submit">
                                            Daftar
                                        </button>
                                        <hr>
                                    </form action="">
                                    <div class="text-center">
                                        <a class="small" href="login.php">Have Account Login?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <?php
    if (isset($_POST['submit'])) {
        ob_start();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
        $image = $_FILES['gambar']['name'];
        $path = $_FILES['gambar']['tmp_name'];
        $exi = explode('.', $image);
        $exi = strtolower(end($exi));
        $ukuran = $_FILES['gambar']['size'];
        $namafilenew = uniqid();
        $namafilenew .= '.';
        $namafilenew .= $exi;

        $k = "SELECT * FROM login1 WHERE username = '$username' or email = '$email'";
        $o = mysqli_query($connect, $k);
        if (mysqli_num_rows($o) > 0) {
            echo "<script>
				alert('user sudah ada');	
			</script>";
            echo "<meta http-equiv=refresh content=2;URL='register.php'>";
        } elseif ($password == $password2) {
            $query = "INSERT INTO login1 (username, email, telephone, password, gambar) values ('$username', '$email', $telephone, '$password', '$namafilenew')";
            $results = mysqli_query($connect, $query);
            //jika ukuran  kurang dari 2 mb boleh upload file
            move_uploaded_file($path, 'aset/' . $namafilelbaru);
            if ($results) {
                '<script>
                    alert("berhasil di simpan");
                </script>';
                echo "<meta http-equiv=refresh content=0;URL='login.php'>";
            } else {
                echo '<script>
                    alert("error");
                    </script>';
                echo "<meta http-equiv=refresh content=0;URL='register.php'>";
                return false;
            }
        } elseif ($password !== $password2) {
            echo "<script>alert('password salah');</script>";
            echo "<meta http-equiv=refresh content=2;URL='register.php'>";
        }
    }


    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>