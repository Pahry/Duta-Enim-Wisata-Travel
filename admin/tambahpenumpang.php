<?php 
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}
	
	include 'functions.php';

	if (isset($_POST['kirim'])) {
		tambahpenumpang($_POST);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="asset/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="asset/css/admin.css">
	<link rel="stylesheet" type="text/css" href="asset/fontawesome/css/all.min.css">

	
</head>
<body>

	<!-- Navbar Header -->
	<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
		<a class="navbar-brand" href="#">SELAMAT DATANG ADMIN | <b>DUTA ENIM WISATA TRAVEL</b></a>
	

			<div class="icon my-2 my-lg-0 ml-auto">
				<h5>
					<a href="logoutadmin.php" class="text-dark"><i class="fas fa-sign-out-alt mr-1" data-toggle="tooltip" title="Keluar"></i>Keluar</a>
				</h5>
			</div>
	</nav>


	<!-- No Gutters berfungsi agar tidak ada margin/batas antara side bar dan isi -->
	<div class="row no-gutters mt-5">

		<!-- Sidebar -->
		<div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
			<ul class="nav flex-column ml-3 mb-5">
				<li class="nav-item">
					<a class="nav-link active text-white" href="index.php"><i class="fas fa-tachometer-alt mr-2"></i>Beranda</a><hr class="bg-secondary">
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="penumpang.php"><i class="fas fa-users mr-2"></i>Daftar Penumpang</a><hr class="bg-secondary">
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="supir.php"><i class="fas fa-car mr-2"></i>Daftar Supir</a><hr class="bg-secondary">
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="loket.php"><i class="fas fa-building mr-2"></i>Daftar Loket</a><hr class="bg-secondary">
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="transaksipenumpang.php"><i class="fas fa-calendar-alt mr-2"></i>Daftar Transaksi Penumpang</a><hr class="bg-secondary">
				</li>
			</ul>
		</div>
		<!-- Tutup Sidebar -->

		<!-- Isi Halaman Web disamping sidebar -->
		<div class="col-md-10 p-5 pt-2">
			<h3 class="text-primary">
				<i class="fas fa-users mr-2" data-toggle="tooltip" title="Tambah Penumpang"></i> Tambah Penumpang
			</h3><hr>

			<form action="" method="post">
				<div class="form-group row">
					<label for="nama_penumpang" class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-8">
					<input class="form-control" type="text" name="nama_penumpang" id="nama_penumpang" required></input>
					</div>
				</div>

				<div class="form-group row">
					<label for="tanggalkeberangkatan_penumpang" class="col-sm-2 col-form-label">Tanggal Keberangkatan</label>
					<div class="col-sm-8">
					<input class="form-control" type="date" name="tanggalkeberangkatan_penumpang" id="tanggalkeberangkatan_penumpang" required></input>
					</div>
				</div>

				<div class="form-group row">
					<label for="nohp_penumpang" class="col-sm-2 col-form-label">Nomor HP</label>
					<div class="col-sm-8">
					<input class="form-control" type="text" name="nohp_penumpang" id="nohp_penumpang" required>
					</div>
				</div>

				<div class="form-group row">
					<label for="jumlah_penumpang" class="col-sm-2 col-form-label">Jumlah Penumpang</label>
					<div class="col-sm-8">
					<select name="jumlah_penumpang">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
					</select>
				</div>

				<div class="form-group row">
					<label for="alamat_penumpang" class="col-sm-2 col-form-label">Alamat</label>
					<div class="col-sm-8">
					<textarea class="form-control" name="alamat_penumpang" id="alamat_penumpang" required></textarea>
					</div>
				</div>


				<div class="col-sm-10 offset-sm-2">
				<button class="btn btn-primary text-white" type="submit" name="kirim"><i class="fa fa-plus"></i> Tambah Penumpang</button>
				<a class="btn btn-danger" href="penumpang.php"><i class="fa fa-window-close"></i> Kembali</a>
				</div>
				
			</form>

		</div>
		<!-- Tutup isi Halaman Web disamping sidebar -->

	</div>
	<!-- Tutup row no gutters -->
	


	<!-- Optional Javascript -->
	<!-- jQuery first. then popper.js, then bootstrap.js -->
	<script type="text/javascript" src="asset/js/jquery.js"></script>
	<script type="text/javascript" src="asset/js/popper.js"></script>
	<script type="text/javascript" src="asset/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="asset/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="asset/js/admin.js"></script>

	
</body>


</html>