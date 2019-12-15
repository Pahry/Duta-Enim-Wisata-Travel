<?php  
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}

	include 'functions.php';
	$id_supir = $_GET["id_supir"];

	$supir = tampilsupir("SELECT * FROM supir WHERE id_supir=$id_supir")[0];
		 
	$datasim = explode(',', $supir["sim"]); 



	if (isset($_POST["kirim"])) {
		ubahsupir($_POST);
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
				<i class="fas fa-car mr-2" data-toggle="tooltip" title="Ubah Supir"></i> Ubah Supir
			</h3><hr>

			<form action="" method="post" enctype="multipart/form-data">
		
		<input type="hidden" name="id_supir" value="<?= $supir['id_supir'];?>">
		<input type="hidden" name="fotolama_supir" value="<?= $supir['foto_supir'];?>">
		
		<div class="form-group row">
			<label class="col-md-2 col-form-label" for="nama_supir">Nama</label>
			<div class="col-md-4 col-sm-10">
				<input class="form-control" type="text" name="nama_supir" id="nama_supir" value="<?=$supir['nama_supir']?>" required>
			</div>

			<label class="col-md-2 col-form-label" for="ttl_supir">Tempat Tanggal Lahir</label>
			<div class="col-md-4 col-sm-10">
				<input class="form-control" type="text" name="ttl_supir" id="ttl_supir" value="<?=$supir['ttl_supir']?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-2 col-form-label" for="tipe_mobil">Tipe Mobil</label>
			<div class="col-md-4 col-sm-10">
				<input class="form-control" type="text" name="tipe_mobil" id="tipe_mobil" value="<?=$supir['tipe_mobil']?>" required>
			</div>

			<label class="col-md-2 col-form-label" for="plat_mobil">Plat Mobil</label>
			<div class="col-md-4 col-sm-10">
				<input class="form-control" type="text" name="plat_mobil" id="plat_mobil" value="<?=$supir['plat_mobil']?>" required>
			</div>
		</div>
		
		<div class="form-group row">
			<label class="col-md-2 col-form-label" for="sim">Jenis SIM</label>
			<div class="col-md-4 col-sm-10">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="sim[]" id="sim" value="SIM A"
					<?php if(in_array('SIM A', $datasim)) : echo "checked"; endif; ?> >SIM A</input>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="sim[]" id="sim" value="SIM B I"
					<?php if(in_array('SIM B I', $datasim)) : echo "checked"; endif; ?> >SIM B I</input>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="sim[]" id="sim" value="SIM B II"
					<?php if(in_array('SIM B II', $datasim)) : echo "checked"; endif; ?> >SIM B II</input>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="sim[]" id="sim" value="SIM C"
					<?php if(in_array('SIM C', $datasim)) : echo "checked"; endif; ?> >SIM C</input>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="sim[]" id="sim" value="SIM D"
					<?php if(in_array('SIM D', $datasim)) : echo "checked"; endif; ?> >SIM D</input>
				</div>
			</div>

			<label class="col-md-2 col-form-label" for="nohp_supir">Nomor HP Supir</label>
			<div class="col-md-4 col-sm-10">
				<input class="form-control" type="tel" name="nohp_supir" id="nohp_supir" value="<?= $supir['nohp_supir'] ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-2 col-form-label" for="alamat_supir">Alamat</label>
			<div class="col-md-4 col-sm-10">
				<input class="form-control" name="alamat_supir" id="alamat_supir" value="<?= $supir['alamat_supir'] ?>" required></input>
			</div>

			<label class="col-md-2 col-form-label" for="foto_supir">Foto</label>
			<div class="col-md-4 col-sm-10">
				<img src="img/<?= $supir['foto_supir']?>">
				<input class="form-control" type="file" name="foto_supir">
			</div>
		</div>

		<div class="col-md-10 col-sm-12 offset-md-2">	
			<button class="btn btn-primary" type="submit" name="kirim"><i class="fa fa-edit"></i> Ubah Supir</button>
			<a class="btn btn-danger" href="supir.php"><i class="fa fa-window-close"></i> Batal</a>
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