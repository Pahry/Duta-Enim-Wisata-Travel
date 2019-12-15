<?php 
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}

	include 'functions.php';

	global $conn;

	$loket 				= tampilloket("SELECT * FROM loket");
	$kotaasal 			= tampilkotaasal("SELECT * FROM kotaasal");
	$kotatujuan 		= tampilkotatujuan("SELECT * FROM kotatujuan");
	$jamkeberangkatan	= tampiljamkeberangkatan("SELECT * FROM jamkeberangkatan");
	$harga 				= tampilharga("SELECT * FROM harga");
 	

	if (isset($_POST['kirim'])) {

		var_dump($_POST);
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
				<i class="fas fa-calendar-alt mr-2" data-toggle="tooltip" title="Tambah Transaksi Penumpang"></i> Tambah Transaksi Penumpang
			</h3><hr>

			<form action="" method="post">
				
				<div class="form-group row">	
					<label for="nama_penumpang" class="col-md-2 col-form-label">Nama</label>
					<div class="col-md-4 col-sm-10">
					<input class="form-control" type="text" name="nama_penumpang" id="nama_penumpang" required></input>
					</div>

					<label for="tanggal_keberangkatan" class="col-md-2 col-form-label">Tanggal Keberangkatan</label>
					<div class="col-md-4 col-sm-10">
					<input class="form-control" type="date" name="tanggal_keberangkatan" id="tanggal_keberangkatan" required></input>
					</div>

				</div>

				<div class="form-group row">
					<label for="loket" class="col-md-2 col-form-label">Agen Keberangkatan</label>
					<div class="col-md-4 col-sm-10">
						<select class="form-control" name="loket" id="loket" required>
							<option value="">Pilih Agen Keberangkatan</option>
							<?php foreach ($loket as $lkt): ?>	
							<option value="<?= $lkt['nama_loket'];?>"><?php echo $lkt["nama_loket"]; ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<label for="kotaasal" class="col-md-2 col-form-label">Kota Asal</label>
					<div class="col-md-4 col-sm-10">
						<input class="form-control" name="kotaasal" type="text" list="kotaasal" required>
								<datalist id="kotaasal" width="100%">
								<?php foreach($kotaasal as $ktasal) : ?>
							  		<option value="<?php echo $ktasal["kotaasal"]; ?>"></option>
							  	<?php endforeach; ?>
							</datalist>	
					</div>

				</div>

				<div class="form-group row">
					<label for="jamkeberangkatan" class="col-md-2 col-form-label">Jam</label>
					<div class="col-md-4 col-sm-10">
						<select class="form-control" name="jamkeberangkatan" id="jamkeberangkatan" required>
							<option value="">Pilih Jam Keberangkatan</option>
							<?php foreach($jamkeberangkatan as $jam) : ?>
								<option><?= $jam["jamkeberangkatan"];?></option>
							<?php endforeach; ?>
						</select>
					</div>
							
					<label for="kotatujuan" class="col-md-2 col-form-label">Kota Tujuan</label>
					<div class="col-md-4 col-sm-10">
						<input class="form-control" name="kota_tujuan" type="text" list="kotatujuan" required>
								<datalist id="kotatujuan" width="100%">
								<?php foreach($kotatujuan as $kttujuan) : ?>
							  		<option value="<?php echo $kttujuan["kota_tujuan"]; ?>"></option>
							  	<?php endforeach; ?>
							</datalist>	
					</div>
				</div>
				
				<div class="form-group row">
					<label for="alamat_penumpang" class="col-md-2 col-form-label">Alamat Penjemputan </label>
					<div class="col-md-4 col-sm-10">
					<textarea class="form-control" name="alamat_penumpang" id="alamat_penumpang" required></textarea>
					</div>

					<label for="nohp_penumpang" class="col-md-2 col-form-label">Nomor HP</label>
					<div class="col-md-4 col-sm-10">
					<input class="form-control" type="text" name="nohp_penumpang" id="nohp_penumpang" required>
					</div>
				</div>


				<div class="form-group row">
					<label for="jumlah_penumpang" class="col-md-2 col-form-label">Jumlah Penumpang</label>
					<div class="col-md-4 col-sm-10">
						<select class="form-control" name="jumlah_penumpang" id="jumlah_penumpang" required>
							<option value="">Pilih Jumlah Penumpang</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
						</select>
					</div>

					<label for="harga" class="col-md-2 col-form-label">Harga</label>
					<div class="col-md-4 col-sm-10">
					<select class="form-control" name="harga" id="harga" required>
						<option value="">Pilih Harga</option>
						<?php foreach ($harga as $hrg) : ?>
						<option value="<?php echo $hrg['harga']; ?>"><?php echo $hrg["harga"]; ?></option>
						<?php endforeach ?>
					</select>
					</div>
				</div>

					<div class="form-group row">

					<label for="tempatduduk_penumpang" class="col-md-2 col-form-label">Pilih Tempat Duduk</label>
					<div class="col-md-4 col-sm-10">
						<select name="tempatduduk_penumpang" class="form-control" id="tempatduduk_penumpang" required>
							<option value="">Pilih Tempat Duduk</option>
							<option>CC</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
						</select>
						<!-- <button onclick="document.getElementById('myImage').src='img/seat3.png'">Tampilkan gambar</button>
						<img id="myImage"></img> -->
						
						<a href="javascript:setImageVisible('myImageId', true)">Tampilkan Gambar</a>
						<a href="javascript:setImageVisible('myImageId', false)">Sembunyikan Gambar</a>
						<img id="myImageId" src="img/seat3.png"></img>
						
						
					</div>




				<div class="col-sm-10 offset-sm-2 mt-5">
				<button class="btn btn-primary text-white" type="submit" name="kirim"><i class="fa fa-plus"></i> Tambah Penumpang</button>
				<a class="btn btn-danger" href="penumpang.php"><i class="fa fa-window-close"></i> Kembali</a>
				</div>
				
			</form>

		</div>
		<!-- Tutup isi Halaman Web disamping sidebar -->

	</div>
	<!-- Tutup row no gutters -->
	
	<script type="text/javascript">
		function showImage() 
		{
		    var img = document.getElementById('myImageId');
		    img.style.visibility = 'visible';
		}
		function setImageVisible(id, visible) 
		{
		    var img = document.getElementById(id);
		    img.style.visibility = (visible ? 'visible' : 'hidden');
		}
	</script>

	<!-- Optional Javascript -->
	<!-- jQuery first. then popper.js, then bootstrap.js -->
	<script type="text/javascript" src="asset/js/jquery.js"></script>
	<script type="text/javascript" src="asset/js/popper.js"></script>
	<script type="text/javascript" src="asset/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="asset/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="asset/js/admin.js"></script>

	
</body>


</html>