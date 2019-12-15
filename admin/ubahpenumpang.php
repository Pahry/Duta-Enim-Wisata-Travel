<?php 
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}
	
	include 'functions.php';

	$id_penumpang = $_GET["id_penumpang"];
	$penumpang = tampilpenumpang("SELECT * FROM penumpang WHERE id_penumpang=$id_penumpang")[0];
	
	if (isset($_POST['kirim'])) {
		ubahpenumpang($_POST);
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
				<i class="fas fa-users mr-2" data-toggle="tooltip" title="Ubah Penumpang"></i> Ubah Penumpang
			</h3><hr>

			<form action="" method="post">

				<input type="hidden" name="id_penumpang" value="<?= $penumpang['id_penumpang'];?>">

				<div class="form-group">
					<label for="nama_penumpang">Nama</label>
					<input class="form-control" type="text" name="nama_penumpang" id="nama_penumpang" value="<?= $penumpang['nama_penumpang'] ?>" required></input>
				</div>

				<div class="form-group">
					<label for="tanggalkeberangkatan_penumpang">Tanggal Keberangkatan</label>
					<input class="form-control" type="date" name="tanggalkeberangkatan_penumpang" id="tanggalkeberangkatan_penumpang" value="<?= $penumpang['tanggalkeberangkatan_penumpang'] ?>" required></input>
				</div>

				<div class="form-group">
					<label for="nohp_penumpang">Nomor HP</label>
					<input class="form-control" type="text" name="nohp_penumpang" id="nohp_penumpang" value="<?= $penumpang['nohp_penumpang'] ?>" required>
				</div>

				<div class="form-group">
					<label for="jumlah_penumpang">Jumlah Penumpang</label>
					<select name="jumlah_penumpang" class="form-control" id="jumlah_penumpang">
						<option value="1" <?php if('1' == $penumpang['jumlah_penumpang']){echo "selected";} ?>>1</option>
						<option value="2" <?php if('2' == $penumpang['jumlah_penumpang']){echo "selected";} ?>>2</option>
						<option value="3" <?php if('3' == $penumpang['jumlah_penumpang']){echo "selected";} ?>>3</option>
						<option value="4" <?php if('4' == $penumpang['jumlah_penumpang']){echo "selected";} ?>>4</option>
						<option value="5" <?php if('5' == $penumpang['jumlah_penumpang']){echo "selected";} ?>>5</option>
						<option value="6" <?php if('6' == $penumpang['jumlah_penumpang']){echo "selected";} ?>>6</option>
						<option value="7" <?php if('7' == $penumpang['jumlah_penumpang']){echo "selected";} ?>>7</option>
					</select>
				</div>

				<div class="form-group">
					<label for="alamat_penumpang">Alamat</label>
					<input class="form-control" name="alamat_penumpang" id="alamat_penumpang" value="<?= $penumpang['alamat_penumpang'] ?>" required></input>
				</div>
				<button class="btn btn-primary" type="submit" name="kirim"><i class="fa fa-edit"></i>Ubah Penumpang</button>
				<a class="btn btn-danger" href="penumpang.php"><i class="fa fa-window-close"></i> Kembali</a>
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