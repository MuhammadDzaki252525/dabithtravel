<?php
include "koneksi.php";
$notify = "";
$notifyclass = "";
if (isset($_POST['submit'])) {
	//membuat variable untuk menerima data dari form

	$nama = $_POST['nama'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$pesan = $_POST['pesan'];
	//cek apakah ada data yang belum didisi
	if (!empty($nama) && !empty($telephone) && !empty($email) && !empty($subject) && !empty($pesan)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$notify = 'Email anda salah. Silahkan Ketikan alamat email yang benar.';
			$notifyclass = 'errordiv';
		} else {
			//pengaturan penerima email dan subjek email
			$toEmail = 'dzakwas01@gmail.com';
			$emailSubject = 'Pesan Website dari' . $nama;
			$htmlContect = '<h2>via from kontak website</h2>
								<h4>Nama</h4><p>' . $nama . '</p> 
								<h4>Telephone</h4><p>' . $telephone . '</p>
								<h4>Email</h4><p>' . $email . '</p>
								<h4>Subject</h4><p>' . $subject . '</p>	
								<h4>Pesan</h4><p>' . $pesan . '</p>';

			//mengatur content-type header untuk mengirim email dalam bentuk html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-Type:text/html; charset=UTF-8" . "\r\n";
			//header tambahan 
			$headers .= 'From: ' . $nama . '<' . $email . '>' . "\r\r";
			//kirim email
			if (mail($toEmail, $emailSubject, $htmlContent, $headers)) {
				$notify = "Pesan anda sudah terkirim sukses !";
				$notifyclass = "succdiv";
			} else {
				$notify = "Maaf Pesan anda gagal Terkirim Silahkan ulangi lagi";
				$notifyclass = "errordiv";
			}
		}
	} else {
		$notify = "Harap mengisi semua Field data";
		$notifyclass = "errordiv";
	}
}
