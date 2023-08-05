<?php
include "koneksi.php";

$sitequery = "SELECT * FROM site";
$siteresult = mysqli_query($connect, $sitequery);

$sitedata = mysqli_fetch_array($siteresult);
?>
<?php
$querylogo = "SELECT * FROM logo";
$resultslogo = mysqli_query($connect, $querylogo);
$datalogo = mysqli_fetch_array($resultslogo);
?>
<html>

<head>
	<title><?= $sitedata['judul'] ?></title>
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials">
	<link rel="shortcut icon" href="aset/<?= $datalogo['logo'] ?>">
	<meta name="keywords" content="HTML, CSS, JavaScript">
	<meta name="author" content="John Doe">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="about.css" rel="stylesheet">
	<script src="about.js"></script>
</head>

<body>
	<nav id="navbar">
		<div class="logo_1">
			<img src="aset/<?= $datalogo['logo'] ?>" alt=""></li>
		</div>
		<ul>
			<?php
			$query = "SELECT * FROM navbar";
			$results = mysqli_query($connect, $query);
			while ($data = mysqli_fetch_array($results)) {


			?>
				<li>
					<a href="<?= $data['link'] ?>" id=""><?= $data['judul'] ?></a>
				</li>
			<?php
			}
			?>
		</ul>
		<div class="Sign">
			<?php
			session_start();
			if (!isset($_SESSION['id'])) : ?>
				<a href="login.php">Sign In</a>
				<button><a href="register.php">Sign up</a></button>
			<?php else : ?>
				<button><a href="index.php">Dashboard</a></button>
			<?php endif; ?>
		</div>

	</nav>
	<button class="wa"><img src="asets/wa.png" alt=""></button>
	<?php
	$query = "SELECT * FROM about";
	$results = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($results);
	?>
	<section class="sect_1">
		<div class="overlay" style="background-image:url('aset/<?= $data['gambar1'] ?>');">
			<div class="col_1">
				<div class="text_1">
					<h1><?= $data['section1'] ?></h1>
					<p><?= $data['subsection1'] ?></p>
				</div>
			</div>
		</div>
	</section>
	<section class=sect_2>
		<div class="col_2">
			<div class="size_img">
				<div class="image_1">
					<img src="asets/gunung.png" alt="">

					<img src="asets/pantai1.png" alt="">
				</div>

				<div class="image_2">
					<img src="asets/gunung2.png" alt="">

					<img src="asets/pantai2.png" alt="">
				</div>
			</div>

			<div class="size_write">
				<div class="in_write1">
					<h2><?= $data['section2'] ?></h2>
					<p><?= $data['subsection2'] ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="sect_3">
		<div class="col_3">
			<div class="in_col3">
				<h1><?= $data['section3'] ?></h1>
				<p><?= $data['subsection3'] ?></p>
			</div>
			<div class="card_3">
				<div class="in_card3">
					<img src="asets/icon1.png" alt="">
					<h2>1jt Iklan Travel</h2>
					<p>Dengan lebih dari 1jt iklan tersedia di situs web,<br>
						DABITH TRAVEL dapat mencocokkan Anda dengan pilihan <br> paket tour yang diinginkan.</p>
				</div>
				<div class="in_card3">
					<img src="asets/icon2.png" alt="">
					<h2>Beragam Pilihan Hotel</h2>
					<p>Menyediakan berbagai pilihan Hotel untuk <br> Costomer
						dalam menemukan Hotel yang tepat.
					</p>
				</div>
				<div class="in_card3">
					<img src="asets/icon3.png" alt="">
					<h2>Pencarian Jauh Lebih Mudah</h2>
					<p>Perbaharuan system telah mengingkatkan performa <br>
						pencarian Tiket Dll, sehingga jauh lebih mudah
						dan cepat.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="sect_4">
		<div class="readmore">
			<a href="">Lihat Semua</a>
		</div>

		<div class="col_4">
			<h1><?= $data['section4'] ?></h1>
			<div class="text_left">
				<p><?= $data['subsection4'] ?></p>
				<br>
			</div>
			<div class="btn">
				<button><a href="">lihat Semua</a></button>
			</div>
		</div>
		<div class="beforein_col4">
			<h1 class="h1col4">Tim Kami</h1>
			<?php
			$querr = "SELECT * FROM team";
			$returnr = mysqli_query($connect, $querr);
			while ($date = mysqli_fetch_array($returnr)) {
			?>
				<div class="in_col4">

					<div class="image_people">

						<img src="aset/<?= $date['gambar'] ?>" alt="">

					</div>

					<div class="text_right">

						<div>
							<h1>Nama : <?= $date['nama'] ?></h1>
							<h2><?= $date['jabatan'] ?></h2>
							<p><?= substr($date['keterangan'], 0, 100) ?></p>
						</div>

					</div>
				</div>
			<?php
			}
			?>
		</div>

	</section>

	<section class="sect_5" style="background-image:url('aset/<?= $data['gambar5'] ?>');">

		<div class="col_5">
			<div class="text_5">
				<h1><?= $data['section5'] ?></h1>
				<div></div>
				<p>
					<?= substr($data['subsection5'], 0, 100) ?>
				</p>
			</div>

			<div class="col_img">
				<div class="img">
					<img src="asets/Mask group (1).png" alt="">
					<div>
						<h2>658+</h2>
						<p>CUSTOMER</p>
					</div>
				</div>
				<div class="img">
					<img src="asets/Mask group (2).png" alt="">
					<div>
						<h2>542+</h2>
						<p>FITUR</p>
					</div>
				</div>
				<div class="img">
					<img src="asets/Mask group (3).png" alt="">
					<div>
						<h2>987+</h2>
						<p>SUKA</p>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<section class="sect_6">
		<div class="link"><a href="">Lihat Semua</a></div>
		<div class="col_6">
			<h2>Patner Kami</h2>
			<div class="in_col6">
				<?php
				$partnerquery = "SELECT * FROM partner";
				$partnerresult = mysqli_query($connect, $partnerquery);

				while ($partnerdata = mysqli_fetch_array($partnerresult)) {
				?>
					<a href="<?= $partnerdata['link'] ?>"><img src="aset/<?= $partnerdata['image'] ?>" alt="" class="pesona"></a>
				<?php
				}
				?>
			</div>
		</div>
		</div>
	</section>
	<?php
	$select = "SELECT * FROM footer";
	$querynya = mysqli_query($connect, $select);
	$resultnya = mysqli_fetch_array($querynya);
	?>
	<section class="footer">
		<div class="col_9">
			<div class="in_col9">
				<div class="number_1">
					<img src="aset/<?= $resultnya['gambar'] ?>" alt="">
					<p><?= $resultnya['judul'] ?></p>
				</div>
				<div class="number_2">
					<h2>Cari Hotel Murah</h2>
					<a href="">Tangerang</a>
					<a href="">Bogor</a>
					<a href="">Jakarta Selatan</a>
					<a href="">Jakarta Utara</a>
					<a href="">Lihat Lainnya</a>
				</div>
				<div class="number_2">
					<h2>Cari Travel</h2>
					<a href="">Tangerang</a>
					<a href="">Bogor</a>
					<a href="">Jakarta Selatan</a>
					<a href="">Jakarta Utara</a>
					<a href="">Lihat Lainnya</a>
				</div>
				<div class="number_2">
					<h2>Paket Premium</h2>
					<a href="">Tangerang</a>
					<a href="">Bogor</a>
					<a href="">Jakarta Selatan</a>
					<a href="">Jakarta Utara</a>
					<a href="">Lihat Lainnya</a>
				</div>
				<div class="number_2">
					<h2>Pilih Tour</h2>
					<a href="">Tangerang</a>
					<a href="">Bogor</a>
					<a href="">Jakarta Selatan</a>
					<a href="">Jakarta Utara</a>
					<a href="">Lihat Lainnya</a>
				</div>
			</div>
		</div>
		<hr>
		<div class="last">
			<div class="copyright">
				<p>Copyright © 2022 Dabith.com</p>
			</div>
			<div class="tentang">
				<a href=""><?= $resultnya['column1'] ?></a>
				<a href=""><?= $resultnya['column2'] ?></a>
				<a href=""><?= $resultnya['column3'] ?></a>
				<a href=""><?= $resultnya['column4'] ?></a>
			</div>

			<ul class="footer_logo">
				<li><a href="<?= $resultnya['facebook'] ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0,0,256,256" style="fill:#000000;">
							<g fill="#fff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
								<g transform="scale(10.66667,10.66667)">
									<path d="M17.525,9h-3.525v-2c0,-1.032 0.084,-1.682 1.563,-1.682h1.868v-3.18c-0.909,-0.094 -1.823,-0.14 -2.738,-0.138c-2.713,0 -4.693,1.657 -4.693,4.699v2.301h-3v4l3,-0.001v9.001h4v-9.003l3.066,-0.001z"></path>
								</g>
							</g>
						</svg></a></li>
				<li><a href="<?= $resultnya['twitter'] ?>"><svg style="width:15px;height:15px" viewBox="0 0 24 24">
							<path fill="#fff" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" />
						</svg></a></li>
				<li><a href="<?= $resultnya['instagram'] ?>"><svg style="width:15px;height:15px" viewBox="0 0 24 24">
							<path fill="#fff" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
						</svg></a></li>
				<li><a href="<?= $resultnya['linked'] ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0,0,256,256" style="fill:#000000;">
							<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
								<g transform="scale(10.66667,10.66667)">
									<path d="M19,3h-14c-1.105,0 -2,0.895 -2,2v14c0,1.105 0.895,2 2,2h14c1.105,0 2,-0.895 2,-2v-14c0,-1.105 -0.895,-2 -2,-2zM9,17h-2.523v-7h2.523zM7.694,8.717c-0.771,0 -1.286,-0.514 -1.286,-1.2c0,-0.686 0.514,-1.2 1.371,-1.2c0.771,0 1.286,0.514 1.286,1.2c0,0.686 -0.514,1.2 -1.371,1.2zM18,17h-2.442v-3.826c0,-1.058 -0.651,-1.302 -0.895,-1.302c-0.244,0 -1.058,0.163 -1.058,1.302c0,0.163 0,3.826 0,3.826h-2.523v-7h2.523v0.977c0.325,-0.57 0.976,-0.977 2.197,-0.977c1.221,0 2.198,0.977 2.198,3.174z"></path>
								</g>
							</g>
						</svg></a></li>
				<li><a href="<?= $resultnya['youtube'] ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0,0,256,256" style="fill:#000000;">
							<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
								<g transform="scale(10.66667,10.66667)">
									<path d="M21.582,6.186c-0.23,-0.86 -0.908,-1.538 -1.768,-1.768c-1.56,-0.418 -7.814,-0.418 -7.814,-0.418c0,0 -6.254,0 -7.814,0.418c-0.86,0.23 -1.538,0.908 -1.768,1.768c-0.418,1.56 -0.418,5.814 -0.418,5.814c0,0 0,4.254 0.418,5.814c0.23,0.86 0.908,1.538 1.768,1.768c1.56,0.418 7.814,0.418 7.814,0.418c0,0 6.254,0 7.814,-0.418c0.861,-0.23 1.538,-0.908 1.768,-1.768c0.418,-1.56 0.418,-5.814 0.418,-5.814c0,0 0,-4.254 -0.418,-5.814zM10,15.464v-6.928l6,3.464z"></path>
								</g>
							</g>
						</svg></a></li>
				<ul>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper(".mySwiper", {
			spaceBetween: 40,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
		});
	</script>
	<script src="script.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
</body>

</html>