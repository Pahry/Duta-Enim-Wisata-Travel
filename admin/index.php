<?php  
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}

	include 'functions.php';

	$tampilpenumpang 	= tampilpenumpang("SELECT * FROM penumpang");
	$tampilsupir		= tampilsupir("SELECT * FROM supir");
	$tampilloket		= tampilloket("SELECT * FROM loket");
	$jumlahpenumpang	= count($tampilpenumpang);
	$jumlahsupir 		= count($tampilsupir);
	$jumlahloket 		= count($tampilloket);


	
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
					<a class="nav-link text-white" href="harga.php"><i class="fas fa-money-check mr-2"></i>Daftar Harga</a><hr class="bg-secondary">
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="transaksipenumpang.php"><i class="fas fa-calendar-alt mr-2"></i>Daftar Transaksi Penumpang</a><hr class="bg-secondary">
				</li>
			</ul>
		</div>

		<div class="col-md-10 p-5 pt-2">
			<h3 class="text-primary">
				<a href=""><i class="fas fa-tachometer-alt mr-2" data-toggle="tooltip" title="Beranda"></i> BERANDA</a>
			</h3><hr>

			<div class="row text-white">

				<div class="card bg-danger ml-5" style="width: 18rem;">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fas fa-calendar-alt mr-2"></i>
						</div>
						<h5 class="card-title">Jumlah Transaksi</h5>
						<div class="display-4">400</div>
						<a href="transaksi.php"><b><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></b></a>
					</div>
				</div>

				<div class="card bg-info ml-5" style="width: 18rem;">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fas fa-users mr-2"></i>
						</div>
						<h5 class="card-title">Jumlah Penumpang</h5>
						<div class="display-4"><?php echo $jumlahpenumpang; ?></div>
						<a href="penumpang.php"><b><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></b></a>
					</div>
				</div>


				<div class="card bg-success ml-5" style="width: 18rem;">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fas fa-car mr-2"></i>
						</div>
						<h5 class="card-title">Jumlah Supir</h5>
						<div class="display-4">58</div>
						<a href="supir.php"><b><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></b></a>
					</div>
				</div>

			</div>

			<div class="row text-white mt-4">

				<div class="card bg-success ml-5" style="width: 18rem;">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fas fa-building mr-2 mt-4"></i>
						</div>
					<h5 class="card-title p-2">Jumlah Loket</h5>
					<div class="display-4 p-2"><?php echo $jumlahloket; ?></div>
					<a href="loket.php"><b><p class="card-text text-white p-2">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></b></a>
					</div>
				</div>

				<div class="card ml-5 text-white text-center" style="width: 18rem;">
					<div class="card-header bg-info display-4 pt-4 pb-4">
						<i class="fab fa-facebook"></i>
					</div>
					<div class="card-body">
					<h5 class="card-title text-info">FACEBOOK</h5>
					<a href="#" class="btn btn-info">LIHAT PROFIL</a>
					</div>
				</div>

				<div class="card ml-5 text-white text-center" style="width: 18rem;">
					<div class="card-header bg-primary display-4 pt-4 pb-4">
						<i class="fab fa-twitter"></i>
					</div>
					<div class="card-body">
					<h5 class="card-title text-primary">HALAMAN FACEBOOK</h5>
					<a href="#" class="btn btn-primary">LIHAT HALAMAN</a>
					</div>
				</div>

			</div>

		</div>
	</div>
	


	<!-- Optional Javascript -->
	<!-- jQuery first. then popper.js, then bootstrap.js -->
	<script type="text/javascript" src="asset/js/jquery.js"></script>
	<script type="text/javascript" src="asset/js/popper.js"></script>
	<script type="text/javascript" src="asset/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="asset/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="asset/js/admin.js"></script>

	
</body>


</html>