<?php
include 'koneksi.php';
include "session1.php";
$logoquery = "SELECT * FROM logo";
$logoresult = mysqli_query($connect, $logoquery);
$logodata = mysqli_fetch_assoc($logoresult);

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <meta name="description" content="">
    <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <meta name="author" content="">
    <style>
        <?php include "style.css"; ?>
    </style>
    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    $ko = "SELECT * FROM navbar";
    $res = mysqli_query($connect, $ko);
    $dat = mysqli_fetch_assoc($res);
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion pt-3" id="accordionSidebar" style="background-color:#2D2727;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mb-3" href="<?= $dat['link'] ?>">
                <div class="sidebar-brand-icon">
                    <img src="aset/<?= $logodata['logo'] ?>" alt="">
                </div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DASHBOARD</span></a>
            </li>

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>POST</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Post:</h6>
                        <a class="collapse-item" href="post-1.php">All Post</a>
                        <a class="collapse-item " href="create-post.php">Add Post</a>
                        <a class="collapse-item" href="categories.php">Categoriess</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file"></i>
                    <span>PAGES</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Pages:</h6>
                        <a class="collapse-item" href="pages.php">All Pages</a>
                        <a class="collapse-item" href="create-pages.php">Add Pages</a>
                        <a class="collapse-item" href="utilities-animation.html">Categories</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiese" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>TEAM</span>
                </a>
                <div id="collapseUtilitiese" class="collapse" aria-labelledby="headingUtilitiese" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Team:</h6>
                        <a class="collapse-item" href="team.php">All Team</a>
                        <a class="collapse-item" href="create-team.php">Add Team</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseU" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-image"></i>
                    <span>MEDIA</span>
                </a>
                <div id="collapseU" class="collapse" aria-labelledby="headingU" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="media.php">Library</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapse" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user"></i>
                    <span>USER</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom user:</h6>
                        <a class="collapse-item" href="user.php">All User</a>
                        <a class="collapse-item active" href="create-user.php">Add User</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="comment.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>COMMENT</span></a>
            </li>

            <!--Partner-->
            <li class="nav-item">
                <a class="nav-link" href="partner.php">
                    <i class="fas fa-handshake"></i>
                    <span>PARTNER</span></a>
            </li>
            <!-- Settings-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetree" aria-expanded="true" aria-controls="collapsetree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>SETTINGS</span>
                </a>
                <div id="collapsetree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="site.php">Site Title</a>
                        <a class="collapse-item" href="logo.php">Logo</a>
                        <a class="collapse-item" href="footer.php">Footer</a>
                        <a class="collapse-item" href="profile.php">Profile</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php" onclick="return confirm('Apakah anda yakin Ingin Keluar')">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                    <span>LOGOUT</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-gradient-warning topbar static-top shadow z-index-5 ">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->

                        <?php
                        $id = $_SESSION['id'];
                        $select = "SELECT * FROM login1 WHERE id=$id";

                        $sql = mysqli_query($connect, $select);
                        $output = mysqli_fetch_assoc($sql);
                        ?>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-light font-1 big"><?= $output['username'] ?></span>
                                <img class="img-profile rounded-circle" src="aset/<?= $output['gambar'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin Ingin Keluar')">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid pt-4">

                    <!-- Page Heading -->
                    <h1 class="text-black h2 mb-3">Add User</h1>
                    <!--FORM -->
                    <form class="d-flex justify-content-between bg-white p-4" action="" method="POST" enctype="multipart/form-data">
                        <div class="w-100">

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
                                    <input required type="file" class="form-control" id="fileInput" name="gambar" accept="image/*">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                            </div>
                            <button id="publish-button" name="submit" type="submit" class="btn btn-primary w-25 mt-3">Publish</button>
                        </div>
                    </form>
                    <?php
                    include "koneksi.php";
                    include "session.php";

                    ob_start();
                    if (isset($_POST['submit'])) {
                        $id = $_POST['id'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $telephone = $_POST['telephone'];
                        $password = $_POST['password'];
                        $password2 = $_POST['password2'];
                        $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
                        $image = $_FILES['gambar']['name'];
                        $path = $_FILES['gambar']['tmp_name'];
                        $x = explode('.', $image);
                        $x = strtolower(end($x));
                        $ukuran = $_FILES['gambar']['size'];
                        $namafilebaru = uniqid();
                        $namafilebaru .= '.';
                        $namafilebaru .= $x;

                        $k = "SELECT * FROM login1 WHERE username = '$username' or email = '$email'";
                        $o = mysqli_query($connect, $k);

                        if (mysqli_num_rows($o) > 0) {
                            echo "<script>
				alert('user sudah ada');	
			</script>";
                            echo "<meta http-equiv=refresh content=0;URL='create-user.php'>";
                        } elseif ($password == $password2) {
                            move_uploaded_file($path, 'aset/' . $namafilebaru);
                            $query = "insert into login1 (username, email, telephone, password, gambar) values ('$username', '$email', $telephone , '$password', '$namafilebaru');";

                            $results = mysqli_query($connect, $query);
                            if ($results) {
                                '<script>
                alert("berhasil di simpan");
            </script>';
                                echo "<meta http-equiv=refresh content=0;URL='user.php'>";
                            } else {
                                echo '<script>
                alert("error");
                </script>';
                                echo "<meta http-equiv=refresh content=0;URL='create-user.php'>";
                            }
                        } elseif ($password !== $password2) {
                            echo "<script>alert('password salah');</script>";
                            echo "<meta http-equiv=refresh content=2;URL='create-user.php'>";
                        }
                    }
                    ?>
                </div>
            </div>
            <script>
                const fileInput = document.getElementById('fileInput'); // Ganti "fileInput" dengan ID input file Anda
                fileInput.
                addEventListener('change', () => {
                    const fileSize = fileInput.files[0].size;
                    const maxFileSize = 2 * 1024 * 1024; // Ukuran maksimum file dalam byte
                    if (fileSize > maxFileSize) {

                        alert


                        alert('Ukuran file tidak boleh lebih dari 2MB. Silahkan Masukkan file lagi'); // Tampilkan pesan kesalahan
                        fileInput.value = ''; // Hapus file yang diunggah
                        location.reload(); // Muat ulang halaman
                    }
                });
            </script>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace('editor1');


                const myModal = document.getElementById('myModal')
                const myInput = document.getElementById('myInput')

                myModal.addEventListener('shown.bs.modal', () => {
                    myInput.focus()
                })
            </script>
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/datatables-demo.js"></script>
            <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>