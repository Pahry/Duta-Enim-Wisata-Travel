<?php 
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}

	include 'functions.php';
	$idloket = $_GET['id_loket'];

	$loket = tampilloket("SELECT * FROM loket WHERE id_loket=$idloket")[0];


	if ( isset ($_POST["kirim"]) )
	{
		ubahloket($_POST);
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
				<i class="fas fa-building mr-2" data-toggle="tooltip" title="Tambah Loket"></i> Tambah Loket
			</h3><hr>

			<form action="" method="post" enctype="multipart/form-data">

				<input type="hidden" name="id_loket" value="<?= $loket['id_loket'];?>">
				<input type="hidden" name="fotolama_loket" value="<?= $loket['foto_loket'];?>">

				<div class="form-group row">
					<label for="nama_loket" class="col-sm-2 col-form-label">Nama Loket</label>
					<div class="col-sm-8">	
						<input class="form-control" type="text" name="nama_loket" id="nama_loket" value="<?= $loket['nama_loket'];?>" required>	
					</div>
				</div>
				
				<div class="form-group row">
					<label for="pengurus_loket" class="col-sm-2 col-form-label">Pengurus Loket</label>
					<div class="col-sm-8">	
						<input class="form-control" type="text" name="pengurus_loket" id="pengurus_loket" value="<?= $loket['pengurus_loket'];?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label for="nohp_loket" class="col-sm-2 col-form-label">Nomor HP Loket</label>
					<div class="col-sm-8">	
						<input class="form-control" type="text" name="nohp_loket" id="nohp_loket" value="<?= $loket['nohp_loket'];?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label for="alamat_loket" class="col-sm-2 col-form-label">Alamat Loket</label>
					<div class="col-sm-8">	
						<input class="form-control" type="text" name="alamat_loket" id="alamat_loket" value="<?= $loket['alamat_loket'];?>" required></input>
					</div>
				</div>

				<div class="form-group row">
					<label for="foto_loket" class="col-sm-2 col-form-label">Foto Loket</label>
					<div class="col-sm-8">			
					<input class="form-control" type="file" name="foto_loket">
					<img width="100" height="100" src="img/fotoloket/<?= $loket['foto_loket'];?>" >
					</div>
				</div>
				
				<div class="col-sm-10 offset-sm-2">	
					<button class="btn btn-primary" type="submit" name="kirim"><i class="fa fa-edit"></i> Ubah</button>
					<a class="btn btn-danger" href="loket.php"><i class="fa fa-window-close"></i> Kembali</a>
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