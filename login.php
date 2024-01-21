<?php
session_start();
include("koneksi.php");
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-warning">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <p class="text-danger"> <?php
                                                    if (isset($_GET['error'])) {
                                                        echo $_GET['error'];
                                                    } ?></p>
                            <div class="col-lg-3 d-none d-lg-block"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <input type="hidden" name="id">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Enter Username..." name="email" autofocus autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="submit" type="submit">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>

                                    </div>
                                    <div class="text-center">
                                        <?php
                                        $id = $_GET['id'];
                                        $query = "SELECT * FROM navbar";
                                        $results = mysqli_query($connect, $query);
                                        $data = mysqli_fetch_array($results);


                                        ?>
                                        <a class="small" href="<?= $data['link'] ?>">Go To Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $username2 = addslashes($username);
    $email2 = addslashes($email);
    $password2 = addslashes($password);
    // var_dump($password);
    $query = "select * from login1 where email = '$email' and password = '$password'";
    $sql = mysqli_query($connect, $query);

    $cek = mysqli_num_rows($sql);

    // var_dump($cek);

    if ($cek > 0) {
        $assoc = mysqli_fetch_assoc($sql);
        $_SESSION['id'] = $assoc['id'];
        echo "<meta http-equiv=refresh content=0;URL='index.php'>";
    } else {
        echo '<script>
                    alert("username dan password salah");
                </script>';
        echo "<meta http-equiv=refresh content=0;URL='login.php'>";
    }
}
?>