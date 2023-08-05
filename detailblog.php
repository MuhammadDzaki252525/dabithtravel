<?php
include "koneksi.php";
?>
<html>

<head>
	<title>ujian progaming</title>
	<link rel="stylesheet" href="detailblog.css">
	<script src="blog.js"></script>
</head>

<body>
	<nav id="navbar">
		<div class="logo_1">
			<img src="asets/Logo.png" alt=""></li>
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
				<button><a href="">Sign up</a></button>
			<?php else : ?>
				<button><a href="index.php">Dashboard</a></button>
			<?php endif; ?>
		</div>

	</nav>
	<section class="sect_3">
		<div class="insect3">
			<div class="col_3">
				<?php
				$id = $_GET['id'];
				$query = "SELECT * FROM inipost WHERE id = $id";
				$results = mysqli_query($connect, $query);

				$data = mysqli_fetch_array($results);
				?>
				<div class="big_card">

					<h1>#<?= strtoupper($data['category']) ?></h1>
					<img src="aset/<?= $data['gambar'] ?>" alt="">
					<a class="desember"><?= $data['date'] ?></a>

				</div>
				<div class="out_card">
					<div class="card_wrap">
						<h1><?= $data['judul'] ?></h1>
						<div class="in_wrap">
							<p><?= $data['keterangan'] ?></p>
						</div>
					</div>

					<div class="col_rekomendasi">
						<h1>Rekomendasi Untuk anda</h1>

						<div class="in_col_rekomendasi">
							<?php
							$querys = "SELECT * FROM inipost LIMIT 0,3";
							$resultss = mysqli_query($connect, $querys);

							while ($datas = mysqli_fetch_array($resultss)) {


							?>
								<div class="img_rekomendasi">
									<img src="aset/<?= $datas['gambar'] ?>" alt="">
									<div>
										<a><?= $datas['date'] ?></a>
										<h4><?= $datas['judul'] ?></h4>
										<p>Kumpulan Berita PANTAI SELATAN: Waspada!! Gelombang Tinggi Hingga Empat Meter di
											Perairan Selatan Banten.</p>
									</div>
								</div>
							<?php
							}
							?>
						</div>

					</div>
					<?php
					include "koneksi.php";

					if (isset($_POST['submit'])) {
						$comment = $_POST['komentar'];
						$role = $_POST['role'];

						$query = "INSERT INTO komentar VALUES(NULL, '$comment', '$role')";
						$result = mysqli_query($connect, $query);

						if ($result) {
							echo "<script>alert('Komentar diterima');</script>";
							echo "<meta http-equiv=refresh content=0;URL='detailblog.php?id=$id'>";
						} else {
							echo "<script>alert('Komentar Gagal');</script>";
							echo "<meta http-equiv=refresh content=0;URL='detailblog.php'>";
						}
					}
					?>
					<div class="coment">
						<h1>Komentar</h1>
						<div class="in_coment" data-required="kirim">
							<form action="" method="POST">
								<input type="hidden" id="id" name="id">
								<input type="text" placeholder="Tulis Komentar" value="" class="inputdata" name="komentar">
								<button type="submit" name="submit"><img src="font/icons/Vector (2).png" alt=""></button>
							</form>
						</div>
					</div>

					<div class="profile">
						<?php
						$pilih = "SELECT * FROM team ORDER BY id DESC";
						$querynya = mysqli_query($connect, $pilih);
						while ($ambil = mysqli_fetch_assoc($querynya)) {

						?>
							<div class="in_profile">
								<img src="aset/<?= $ambil['gambar'] ?>" alt="">
								<div class="text_profile">
									<h3><?= $ambil['nama'] ?></h3>
									<a><?= $ambil['date'] ?></a>
									<p><?= substr($ambil['keterangan'], 0, 100) ?></p>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>


			<div class="card_right">
				<div class="input">
					<div class="in_input">

						<h3>Kategori Teratas</h3>

						<label>Budaya</label>
					</div>
				</div>
				<div class="top_post">
					<div class="out_post">
						<h1>Top Post</h1>
						<?php
						$q = "SELECT * FROM inipost order by id asc limit 0,3";
						$r = mysqli_query($connect, $q);
						$number = 1;
						while ($pilih = mysqli_fetch_array($r)) {


						?>
							<div class="in_post">
								<h2><?= $number++ ?></h2>
								<div class="informasi">
									<p><?= $pilih['judul'] ?></p>
									<a><?= $pilih['date'] ?></a>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>

				<div class="sosmed">
					<div class="out_sosmed">
						<h2>Sosial Media Kami</h2>

						<div class="in_sosmed">
							<p class="instagram">Instagram</p>
							<div class="image_sosmed">
								<div class="img1">
									<img src="asets/sosmed4.png" alt="">
									<img src="asets/sosmed.png" alt="">
									<img src="asets/sosmed2.png" alt="">
								</div>
								<div class="img2">
									<img src="asets/sosmed3.png" alt="">
									<img src="asets/sosmed5.png" alt="">
								</div>
							</div>
						</div>

						<div class="in_sosmed2">
							<p class="youtube">Youtube</p>
							<div class="image_sosmed2">
								<div class="img3">
									<img src="asets/youtube1.png" alt="">
									<img src="asets/youtube2.png" alt="">
									<img src="asets/youtube3.png" alt="">
								</div>
								<div class="img4">
									<img src="asets/youtube4.png" alt="">
									<img src="asets/youtube5.png" alt="">
								</div>
							</div>
						</div>
					</div>
					<div class="svg">
						<a href="" class="link">Lihat semua</a>
						<img src="/home/pentol/ujian-progamming /landing-page/font/keyboard_double_arrow_down_FILL0_wght400_GRAD0_opsz48.svg" alt="">
					</div>
				</div>
				<h1 class="lainnya"># LAINNYA</h1>
				<div class="in_wrap2">
					<?php
					$lainnya = "SELECT * FROM inipost WHERE category = 'sepak bola'";
					$queryl = mysqli_query($connect, $lainnya);
					while ($resultl = mysqli_fetch_array($queryl)) {
					?>
						<div class="card_little2">
							<a href=""><img src="aset/<?= $resultl['gambar'] ?>" alt=""></a>
							<div>
								<a><?= $resultl['date'] ?></a>
								<h4><?= $resultl['judul'] ?></h4>
								<p><?= substr($resultl['keterangan'], 0, 200) ?></p>
							</div>
						</div>
					<?php
					}
					?>
				</div>
	</section>
	<section class="footer">
		<div class="col_9">
			<div class="in_col9">
				<div class="number_1">
					<img src="asets/Mask group.png" alt="">
					<p>Lorem ipsum dolor sit amet, consectetur<br>adipiscing elit. Nulla id auctor tortor, id gravida<br>mi.Nullam dui libero, convallis ut eleifend<br>
						sed, pharetra et risus.</p>
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
				<a href="">Tentang Dabith Travel</a>
				<a href="">Syarat dan kebijakan</a>
				<a href="">Hubungi Dabith</a>
				<a href="">Sitemap</a>
			</div>

			<ul class="footer_logo">
				<li><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0,0,256,256" style="fill:#000000;">
						<g fill="#fff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
							<g transform="scale(10.66667,10.66667)">
								<path d="M17.525,9h-3.525v-2c0,-1.032 0.084,-1.682 1.563,-1.682h1.868v-3.18c-0.909,-0.094 -1.823,-0.14 -2.738,-0.138c-2.713,0 -4.693,1.657 -4.693,4.699v2.301h-3v4l3,-0.001v9.001h4v-9.003l3.066,-0.001z"></path>
							</g>
						</g>
					</svg></li>
				<li><svg style="width:15px;height:15px" viewBox="0 0 24 24">
						<path fill="#fff" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" />
					</svg></li>
				<li><svg style="width:15px;height:15px" viewBox="0 0 24 24">
						<path fill="#fff" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
					</svg></li>
				<li><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0,0,256,256" style="fill:#000000;">
						<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
							<g transform="scale(10.66667,10.66667)">
								<path d="M19,3h-14c-1.105,0 -2,0.895 -2,2v14c0,1.105 0.895,2 2,2h14c1.105,0 2,-0.895 2,-2v-14c0,-1.105 -0.895,-2 -2,-2zM9,17h-2.523v-7h2.523zM7.694,8.717c-0.771,0 -1.286,-0.514 -1.286,-1.2c0,-0.686 0.514,-1.2 1.371,-1.2c0.771,0 1.286,0.514 1.286,1.2c0,0.686 -0.514,1.2 -1.371,1.2zM18,17h-2.442v-3.826c0,-1.058 -0.651,-1.302 -0.895,-1.302c-0.244,0 -1.058,0.163 -1.058,1.302c0,0.163 0,3.826 0,3.826h-2.523v-7h2.523v0.977c0.325,-0.57 0.976,-0.977 2.197,-0.977c1.221,0 2.198,0.977 2.198,3.174z"></path>
							</g>
						</g>
					</svg></li>
				<li><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0,0,256,256" style="fill:#000000;">
						<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
							<g transform="scale(10.66667,10.66667)">
								<path d="M5,3c-1.10156,0 -2,0.89844 -2,2v14c0,1.10156 0.89844,2 2,2h14c1.10156,0 2,-0.89844 2,-2v-14c0,-1.10156 -0.89844,-2 -2,-2zM6.40625,7.6875h2.59375c2.30078,0 2.6875,1.41406 2.6875,2.3125c0,1.30078 -0.89453,1.71094 -1.09375,1.8125c0.19922,0.10156 1.21875,0.375 1.21875,1.875c0.10156,1.80078 -1.02344,2.5 -2.625,2.5h-2.78125zM13.40625,7.6875h3.6875v1h-3.6875zM8.09375,9.09375v2.09375h0.90625c0.60156,0 1,-0.19922 1,-1c0,-0.69922 -0.30078,-1.09375 -1,-1.09375zM15.59375,9.8125c1.39844,0 2.40625,0.79297 2.40625,3.09375v0.6875h-3.40625c0,0.30078 0.01953,1.40625 1.21875,1.40625c0.80078,0 1.17578,-0.39453 1.375,-0.59375l0.71875,1c-0.10156,0.10156 -0.79297,0.90625 -2.09375,0.90625c-1.5,0 -2.71875,-0.80469 -2.71875,-2.90625v-0.5c0,-2.30078 1.19922,-3.09375 2.5,-3.09375zM15.40625,11.09375c-0.30078,0 -0.90625,0.11328 -0.90625,1.3125h1.6875c0,0 0.21875,-1.3125 -0.78125,-1.3125zM8.09375,12.5v2.3125h1.09375c0.60156,0 0.90625,-0.42578 0.90625,-1.125c0.10156,-0.80078 -0.17969,-1.1875 -0.78125,-1.1875z"></path>
							</g>
						</g>
					</svg></li>
				<li><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0,0,256,256" style="fill:#000000;">
						<g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
							<g transform="scale(10.66667,10.66667)">
								<path d="M21.582,6.186c-0.23,-0.86 -0.908,-1.538 -1.768,-1.768c-1.56,-0.418 -7.814,-0.418 -7.814,-0.418c0,0 -6.254,0 -7.814,0.418c-0.86,0.23 -1.538,0.908 -1.768,1.768c-0.418,1.56 -0.418,5.814 -0.418,5.814c0,0 0,4.254 0.418,5.814c0.23,0.86 0.908,1.538 1.768,1.768c1.56,0.418 7.814,0.418 7.814,0.418c0,0 6.254,0 7.814,-0.418c0.861,-0.23 1.538,-0.908 1.768,-1.768c0.418,-1.56 0.418,-5.814 0.418,-5.814c0,0 0,-4.254 -0.418,-5.814zM10,15.464v-6.928l6,3.464z"></path>
							</g>
						</g>
					</svg></li>
				<ul>
		</div>
	</section>
</body>

</html>