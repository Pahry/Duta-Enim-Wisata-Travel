<?php  
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}
	
	require 'functions.php';
	
	$limitdatasupir 	= 5;
	$jumlahsupir 		= count(tampilsupir("SELECT * FROM supir"));
	$jumlahhalamansupir	= ceil($jumlahsupir / $limitdatasupir);

	
	if( isset($_GET["halaman"]))
	{
		$halamanaktif = $_GET["halaman"];
	}else{
		$halamanaktif = 1;
	}

	$indexawalsupir	= ($limitdatasupir * $halamanaktif) - $limitdatasupir;

	$supir = tampilsupir("SELECT * FROM supir ORDER BY id_supir DESC LIMIT $indexawalsupir, $limitdatasupir");

	if (isset($_POST['cari']))
	{
			$supir = carisupir($_POST['keyword']);
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
				<a href="supir.php"><i class="fas fa-car mr-2" data-toggle="tooltip" title="Daftar Supir"></i> Daftar Supir</a>
			</h3><hr>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">		  
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">    
			    <ul class="navbar-nav mr-auto">    	
			    	<li>
			    		<form action="" method="post" class="form-inline my-2 mr-lg-0">
							<input class="form-control mr-sm-2" type="search" name="keyword" size="50" autofocus autocomplete="off" placeholder="Cari Supir Duta Enim Wisata Travel">
							<button class="btn btn-primary btn-lg" type="submit" name="cari"><i class="fa fa-search"></i></button>	
						</form>
			    	</li>
			    </ul>

				<a href="tambahsupir.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Supir</a>

			  </div>
			</nav>

			<table class="table table-bordered">	
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Nama Supir</th>
						<th>Tempat Tanggal Lahir</th>
						<th>Tipe Mobil</th>
						<th>Plat Mobil</th>
						<th>Jenis Sim</th>
						<th>Nomor HP</th>
						<th>Alamat</th>
						<th>Foto</th>
						<th>Aksi</th>
					</tr>
				</thead>
			
				<?php $no=1; foreach($supir as $spr) : ?>
				<tbody>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $spr["nama_supir"]; ?></td>
						<td><?php echo $spr["ttl_supir"] ?></td>
						<td><?php echo $spr["tipe_mobil"]; ?></td>
						<td><?php echo $spr["plat_mobil"]; ?></td>
						<td><?php echo $spr["sim"]; ?></td>
						<td><?php echo $spr["nohp_supir"]; ?></td>
						<td><?php echo $spr["alamat_supir"]; ?></td>
						<td><img src="img/<?php echo $spr["foto_supir"]; ?>"></td>
						<td>
							<a href="ubahsupir.php?id_supir=<?= $spr["id_supir"]; ?>"><i class="fa fa-edit text-primary mr-2 fa-2x" data-toggle="tooltip" title="Ubah"></i></a>
							<a href="hapussupir.php?id_supir=<?php echo $spr['id_supir']?>" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-trash-alt text-danger fa-2x mt-2" data-toggle="tooltip" title="Hapus"></i></a>
						</td>
					</tr>
				</tbody>
				<?php $no++; endforeach; ?>
			</table>

			<!-- Pagination -->
			<nav>

				<ul class="pagination justify-content-center">

				<?php for($i = 1; $i<=$jumlahhalamansupir; $i++) : ?>
					<?php if($i == $halamanaktif) : ?>
						<li class="page-item active">
							<a class="page-link" href="?halaman=<?=$i;?>"><?php echo $i; ?></a>
						</li>
					<?php else : ?>
						<li class="page-item">
							<a class="page-link" href="?halaman=<?=$i;?>"> <?php echo $i; ?> </a>
						</li>
					<?php endif; ?>
				<?php endfor; ?>

				<?php if ( $halamanaktif < $jumlahhalamansupir ) : ?>
					<li class="page-link">
						<a class="page-item" href="?halaman=<?= $jumlahhalamansupir;?>">Halaman Terakhir &raquo;</a>
					</li>
				<?php endif; ?>
				
				</ul>
			</nav>
			<!-- Tutup Pagination -->

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