<?php
include "koneksi.php";
include "session1.php";

$query = "SELECT * FROM home";
$results = mysqli_query($connect, $query);

$data1 = mysqli_fetch_assoc($results);

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


<!-- Page Wrapper -->

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
            <hr class="sidebar-divider my-0 mb-2">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="">DASHBOARD</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>POST</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Post:</h6>
                        <a class="collapse-item" href="post-1.php">All Post</a>
                        <a class="collapse-item" href="create-post.php">Add Post</a>
                        <a class="collapse-item" href="categories.php">Categoriess</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapse" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file"></i>
                    <span>PAGES</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom PAGES:</h6>
                        <a class="collapse-item active" href="pages.php">All Pages</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiese" aria-expanded="true" aria-controls="collapseUtilitiese">
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
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="media.php">Library</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - User -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user"></i>
                    <span>USER</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom User:</h6>
                        <a class="collapse-item" href="user.php">All User</a>
                        <a class="collapse-item" href="create-user.php">Add User</a>
                    </div>
                </div>
            </li>
            <!-- komen -->
            <li class="nav-item">
                <a class="nav-link" href="comment.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>COMMENT</span></a>
            </li>
            <!-- partner-->
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
                        <h6 class="collapse-header"></h6>
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

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-gradient-warning topbar static-top shadow z-index-5 shadow-lg">

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
                <?php
                $query = "SELECT * FROM inipost";
                $results = mysqli_query($connect, $query);

                for ($i = 0; $i < $data = mysqli_fetch_assoc($results); $i++) {
                }
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid pt-4">
                    <!-- DataTales Example -->
                    <!--FORM -->

                    <form class="container d-flex justify-content-between mt-2" action="proses-edit-home.php" method="POST" enctype="multipart/form-data">
                        <div class="w-100">
                            <div class="d-flex align-items-center justify-content-between">
                                <h1 class="mb-3 text-black">Edit Home</h1>
                            </div>
                            <div class="pb-3 d-flex align-items-center">
                                <a href=" Home.php" class="btn btn-light shadow border border-warning text-warning">Preview</a>
                                <a href="pages.php" class="btn btn-light ms-2 shadow text-primary border border-primary">Back</a>
                            </div>
                            <input type="hidden" name="id" value="<?= $data1['id'] ?>">
                            <input type="hidden" name="gambarlama1" value="<?= $data1['gambar1'] ?>">
                            <input type="hidden" name="gambarlama2" value="<?= $data1['gambar5'] ?>">
                            <div class="bg-body-secondary w-100 p-4 rounded-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label text-black">section1</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="section1" name="section1" value="<?= $data1['section1'] ?>" required>
                                </div>
                                <div class=" mb-3">
                                    <textarea id="editor1" rows="10" cols="80" name="subsection1" value="<?= $data1['subsection1'] ?>" required>
                                    <?= $data1['subsection1'] ?>
                                </textarea>
                                </div>
                                <div class=" mb-3">
                                    <img src="aset/<?= $data1['gambar1'] ?>" alt="" style="width:200px; margin-bottom:10px; border-radius:10px;">
                                    <input type="file" class="form-control" id="fileInput" name="gambar1" accept="image/*">
                                </div>
                                <div class=" mb-3">
                                    <button name="submit" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <div class="bg-body-secondary w-100 p-4 rounded-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label text-black">section2</label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="section2" name="section2" value="<?= $data1['section2'] ?>">
                                </div>
                                <div class=" mb-3">
                                    <textarea id="editor2" rows="10" cols="80" name="subsection2" required>
                                    <?= $data1['subsection2'] ?>
                                </textarea>
                                </div>
                                <div class=" mb-3">
                                    <button name="submit" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <div class="bg-body-secondary w-100 p-4 rounded-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label text-black">section3</label>
                                <div class=" mb-3">
                                    <input type="text" class="form-control" id="section3" name="section3" value="<?= $data1['section3'] ?>">
                                </div>
                                <div class=" mb-3">
                                    <textarea id="editor3" rows="10" cols="80" name="subsection3" required>
                                    <?= $data1['subsection3'] ?>
                                    </textarea>
                                </div>
                                <div class=" mb-3">
                                    <button name="submit" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <div class="bg-body-secondary w-100 p-4 rounded-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label text-black">section4</label>
                                <div class=" mb-3">
                                    <input type="text" class="form-control" id="section4" name="section4" value="<?= $data1['section4'] ?>">
                                </div>
                                <div class=" mb-3">
                                    <textarea id="editor4" rows="10" cols="80" name="subsection4" required>
                                        <?= $data1['subsection4'] ?>
                                    </textarea>
                                </div>
                                <div class=" mb-3">
                                    <button name="submit" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <div class="bg-body-secondary w-100 p-4 rounded-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label text-black">section5</label>
                                <div class=" mb-3">
                                    <input type="text" class="form-control" id="section5" name="section5" value="<?= $data1['section5'] ?>">
                                </div>
                                <div class=" mb-3">
                                    <textarea id="editor5" rows="10" cols="80" name="subsection5" value="<?= $data1['subsection5'] ?>" required>
                                        <?= $data1['subsection5'] ?>
                                    </textarea>
                                </div>
                                <div class=" mb-3">
                                    <img src="aset/<?= $data1['gambar5'] ?>" alt="" style="width:200px; margin-bottom:10px; border-radius:10px;">
                                    <input type="file" class="form-control" id="fileInput" name="gambar5" accept="image/*">
                                </div>
                                <div class=" mb-3">
                                    <button name="submit" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <div class="bg-body-secondary w-100 p-4 rounded-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label text-black">section6</label>
                                <div class=" mb-3">
                                    <input type="text" class="form-control" id="section6" name="section6" value="<?= $data1['section6'] ?>">
                                </div>
                                <div class=" mb-3">
                                    <textarea id="editor6" rows="10" cols="80" name="subsection6" required>
                                    <?= $data1['subsection6'] ?>
                                 </textarea>
                                </div>
                                <div class=" mb-3">
                                    <button name="submit" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <div class="bg-body-secondary w-100 p-4 rounded-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label text-black">section7</label>
                                <div class=" mb-3">
                                    <input type="text" class="form-control" id="section7" name="section7" value="<?= $data1['section7'] ?>">
                                </div>
                                <div class=" mb-3">
                                    <textarea id="editor7" rows="10" cols="80" name="subsection7" required>
                                        <?= $data1['subsection7'] ?>
                                 </textarea>
                                </div>
                                <div class=" mb-3">
                                    <button name="submit" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            <div class=" mb-3">
                                <button name="submit" type="submit" class="btn btn-primary">Update All</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <script>
                const fileInput = document.getElementById('fileInput');
                // Ganti "fileInput" dengan ID input file Anda
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
                const fileInput2 = document.getElementById('fileInput2');
                // Ganti "fileInput" dengan ID input file Anda
                fileInput2.
                addEventListener('change', () => {
                    const fileSize2 = fileInput2.files[0].size;
                    const maxFileSize2 = 2 * 1024 * 1024; // Ukuran maksimum file dalam byte
                    if (fileSize2 > maxFileSize2) {

                        alert


                        alert('Ukuran file tidak boleh lebih dari 2MB. Silahkan Masukkan file lagi'); // Tampilkan pesan kesalahan
                        fileInput2.value = ''; // Hapus file yang diunggah
                        location.reload(); // Muat ulang halaman
                    }
                });
                const fileInput3 = document.getElementById('fileInput3');
                // Ganti "fileInput" dengan ID input file Anda
                fileInput3.
                addEventListener('change', () => {
                    const fileSize3 = fileInput3.files[0].size;
                    const maxFileSize3 = 2 * 1024 * 1024; // Ukuran maksimum file dalam byte
                    if (fileSize3 > maxFileSize3) {

                        alert


                        alert('Ukuran file tidak boleh lebih dari 2MB. Silahkan Masukkan file lagi'); // Tampilkan pesan kesalahan
                        fileInput3.value = ''; // Hapus file yang diunggah
                        location.reload(); // Muat ulang halaman
                    }
                });
                const fileInput4 = document.getElementById('fileInput4');
                // Ganti "fileInput" dengan ID input file Anda
                fileInput4.
                addEventListener('change', () => {
                    const fileSize4 = fileInput4.files[0].size;
                    const maxFileSize4 = 2 * 1024 * 1024; // Ukuran maksimum file dalam byte
                    if (fileSize4 > maxFileSize4) {

                        alert


                        alert('Ukuran file tidak boleh lebih dari 2MB. Silahkan Masukkan file lagi'); // Tampilkan pesan kesalahan
                        fileInput4.value = ''; // Hapus file yang diunggah
                        location.reload(); // Muat ulang halaman
                    }
                });
                const fileInput5 = document.getElementById('fileInput5');
                // Ganti "fileInput" dengan ID input file Anda
                fileInput5.
                addEventListener('change', () => {
                    const fileSize5 = fileInput5.files[0].size;
                    const maxFileSize5 = 2 * 1024 * 1024; // Ukuran maksimum file dalam byte
                    if (fileSize5 > maxFileSize5) {

                        alert


                        alert('Ukuran file tidak boleh lebih dari 2MB. Silahkan Masukkan file lagi'); // Tampilkan pesan kesalahan
                        fileInput5.value = ''; // Hapus file yang diunggah
                        location.reload(); // Muat ulang halaman
                    }
                });
                const fileInput6 = document.getElementById('fileInput6');
                // Ganti "fileInput" dengan ID input file Anda
                fileInput6.
                addEventListener('change', () => {
                    const fileSize6 = fileInput6.files[0].size;
                    const maxFileSize6 = 2 * 1024 * 1024; // Ukuran maksimum file dalam byte
                    if (fileSize6 > maxFileSize6) {

                        alert


                        alert('Ukuran file tidak boleh lebih dari 2MB. Silahkan Masukkan file lagi'); // Tampilkan pesan kesalahan
                        fileInput6.value = ''; // Hapus file yang diunggah
                        location.reload(); // Muat ulang halaman
                    }
                });
                const fileInput7 = document.getElementById('fileInput7');
                // Ganti "fileInput" dengan ID input file Anda
                fileInput7.
                addEventListener('change', () => {
                    const fileSize7 = fileInput7.files[0].size;
                    const maxFileSize7 = 2 * 1024 * 1024; // Ukuran maksimum file dalam byte
                    if (fileSize7 > maxFileSize7) {

                        alert


                        alert('Ukuran file tidak boleh lebih dari 2MB. Silahkan Masukkan file lagi'); // Tampilkan pesan kesalahan
                        fileInput7.value = ''; // Hapus file yang diunggah
                        location.reload(); // Muat ulang halaman
                    }
                });
            </script>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                CKEDITOR.replace('editor2');
                CKEDITOR.replace('editor3');
                CKEDITOR.replace('editor4');
                CKEDITOR.replace('editor5');
                CKEDITOR.replace('editor6');
                CKEDITOR.replace('editor7');


                const myModal = document.getElementById('myModal');
                const myInput = document.getElementById('myInput');

                myModal.addEventListener('shown.bs.modal', () => {
                    myInput.focus()
                });
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