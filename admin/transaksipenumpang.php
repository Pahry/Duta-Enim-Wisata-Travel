<?php
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}
	
	require 'functions.php';

	$jumlahpenumpangtampil	=	5;
	$jumlahdatapenumpang	= count(tampilpenumpang("SELECT keberangkatan.tanggal_keberangkatan,keberangkatan.jam_keberangkatan, penumpang.nama_penumpang, penumpang.jumlah_penumpang, keberangkatan.kotatujuan_keberangkatan,penumpang.nohp_penumpang,keberangkatan.dari,penumpang.alamat_penumpang FROM penumpang JOIN keberangkatan
		 ON penumpang.id_penumpang = keberangkatan.id_penumpang"));
	$jumlahhalamanpenumpang	= ceil($jumlahdatapenumpang/$jumlahpenumpangtampil); 
	
	if (isset($_GET["halaman"])) {
		$halamanaktif = $_GET["halaman"];
	}else{
		$halamanaktif = 1;
	}
	
	$indexhalamanpenumpang	= ($jumlahpenumpangtampil * $halamanaktif ) - $jumlahpenumpangtampil;

	$penumpang = tampiltransaksipenumpang("SELECT penumpang.id_penumpang,keberangkatan.tanggal_keberangkatan,keberangkatan.jam_keberangkatan, penumpang.nama_penumpang, penumpang.jumlah_penumpang, keberangkatan.kotatujuan_keberangkatan,penumpang.nohp_penumpang,keberangkatan.dari,penumpang.alamat_penumpang FROM penumpang JOIN keberangkatan
		 ON penumpang.id_penumpang = keberangkatan.id_penumpang ORDER BY id_penumpang DESC LIMIT $indexhalamanpenumpang, $jumlahpenumpangtampil");

	if ( isset($_POST['cari'] ) ) 
	{
		$penumpang = caritransaksipenumpang($_POST['keyword']);	
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
					<a class="nav-link text-white" href="transaksi.php"><i class="fas fa-calendar-alt mr-2"></i>Daftar Transaksi Penumpang</a><hr class="bg-secondary">
				</li>
			</ul>
		</div>
		<!-- Tutup Sidebar -->

		<!-- Isi Halaman Web disamping sidebar -->
		<div class="col-md-10 p-5 pt-2">
			<h3 class="text-primary">
				<a href="penumpang.php"><i class="fas fa-calendar-alt mr-2" data-toggle="tooltip" title="Daftar Transaksi Penumpang"></i> Daftar Transaksi Penumpang</a>
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

					<a href="tambahtransaksipenumpang.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Transaksi Penumpang</a>
				</div>
			</nav>

			<table class="table table-bordered">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Nama</th>
						<th>Tujuan</th>
						<th>No HP</th>
						<th>Dari</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				
				<?php $i=1; foreach($penumpang as $pnpg) : ?>
				<tbody>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $pnpg["tanggal_keberangkatan"]; ?></td>
						<td><?php echo $pnpg["jam_keberangkatan"]; ?></td>
						<td><?php echo $pnpg["nama_penumpang"]; ?></td>
						<td><?php echo $pnpg["kotatujuan_keberangkatan"]; ?></td>
						<td><?php echo $pnpg["nohp_penumpang"]; ?></td>
						<td><?php echo $pnpg["dari"]; ?></td>
						<td><?php echo $pnpg["alamat_penumpang"]; ?></td>
						<td> 
							<a href="ubahtransaksipenumpang.php?id_penumpang=<?= $pnpg['id_penumpang'];?>"><i class="fa fa-edit fa-2x mr-2"></i></a>
							<a href="hapustransaksipenumpang.php?id_penumpang=<?= $pnpg["id_penumpang"];?>" onclick = "return confirm('Apakah anda yakin ?');"><i class="fa fa-trash-alt fa-2x text-danger"></i></a>
						</td>
					</tr>
				</tbody>
				<?php $i++; endforeach; ?>
			</table>

			<nav>
				<ul class="pagination justify-content-center">

					<?php if ($halamanaktif > 1): ?>
						<li class="page-item">
							<a class="page-link">&laquo;</a>
						</li>
					<?php endif ?>
					
					<?php for($i=1; $i<=$jumlahhalamanpenumpang; $i++) : ?>
						
						<?php if($i == $halamanaktif) : ?>
							
							<li class="page-item active">
								<a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
							</li>

							<?php else : ?>

							<li class="page-item">
								<a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
							</li>

						<?php endif; ?>

					<?php endfor; ?>

					<?php if ( $halamanaktif < $jumlahhalamanpenumpang ) : ?>
						<li class="page-link">
							<a class="page-item" href="?halaman=<?= $jumlahhalamanpenumpang;?>">Halaman Terakhir &raquo;</a>
						</li>
				<?php endif; ?>

				</ul>
			</nav>

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