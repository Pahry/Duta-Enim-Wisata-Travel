<?php  
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}
	
	require 'functions.php';
	$loket = tampilloket("SELECT * FROM loket");

	if( isset($_POST['cari'] ) )
	{
		$loket = cariloket($_POST['keyword']);
		
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
				<a href="loket.php"><i class="fas fa-building mr-2" data-toggle="tooltip" title="Daftar Loket"></i> Daftar Loket</a>
			</h3><hr>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
					<ul class="navbar-nav mr-auto">
						<li>
							<form class="form-inline my-2" action="" method="post">
								<input class="form-control mr-sm-2" type="search" name="keyword" size="50" autofocus autocomplete="off" placeholder="Cari Loket Duta Enim Wisata Travel">
								<button class="btn btn-primary btn-lg" type="submit" name="cari"><i class="fa fa-search"></i></button>
							</form>
						</li>
					</ul>

					<a href="tambahloket.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Loket</a>
				</div>
			</nav>

			<table class="table table-bordered">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Nama Loket</th>
						<th>Pengurus Loket</th>
						<th>Nomor HP Loket</th>
						<th>Alamat Loket</th>
						<th>Foto Loket</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<?php $i=1; foreach($loket as $lkt) : ?>
				<tbody>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $lkt["nama_loket"]; ?></td>
						<td><?php echo $lkt["pengurus_loket"]; ?></td>
						<td><?php echo $lkt["nohp_loket"]; ?></td>
						<td><?php echo $lkt["alamat_loket"]; ?></td>
						<td><img height="100px" width="100px" src="img/fotoloket/<?php echo $lkt["foto_loket"];?>" ></td>
						<td>
							<a href="ubahloket.php?id_loket=<?= $lkt["id_loket"]; ?>"><i class="fa fa-edit fa-2x" data-toggle="tooltip" title="Ubah"></i></a>
							<a href="hapusloket.php?id_loket=<?= $lkt["id_loket"]; ?>" onclick="return confirm('Apakah anda yakin ?')"><i class="fa fa-trash-alt fa-2x text-danger" data-toggle="tooltip" title="Hapus"></i></a>
						</td>
					</tr>
				</tbody>
				<?php $i++; endforeach; ?>

			</table>

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