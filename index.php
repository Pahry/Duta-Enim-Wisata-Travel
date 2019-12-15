<!DOCTYPE html>
<html>
<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit-no">
	

	<link rel="stylesheet" type="text/css" href="admin/asset/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="admin/asset/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="admin/asset/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="admin/asset/css/user.css">

	<title>Duta Enim Wisata Travel</title>

</head>
<body>

	<!-- Navbar untuk header -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		
		<a class="navbar-brand" href="#">
			<img src="img/dutaenim.jpg" width="50" height="50"alt="">
		Duta Enim Wisata</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#
		navbarSupportedContent" aria-controls="navbarSupportedContent" ariaexpanded="
		false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-5 ml-auto">
				<li class="nav-item">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item ml-5">
				<a class="nav-link" href="#">Rute</a>
				</li>
				<li class="nav-item ml-5">
				<a class="nav-link" href="#">Loket</a>
				</li>
				<li class="nav-item ml-5">
				<a class="nav-link" href="#">Armada</a>
				</li>
				<li class="nav-item ml-5">
				<a class="nav-link" href="#">Testimoni Pelanggan</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Tutup navbar header -->

	<!-- Jumbotron -->
	<div class="jumbotron bg-white p-0">
		<img src="img/holiday.jpg" width="100%">
	</div>
	<!-- tutup jumbotron -->
	
	<!-- Section Form Pemesanan -->
	<section class="pemesanan" id="pemesanan">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-12">
					<p class="h2 text-center">Form Pemesanan</p><hr>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-sm-12">
					
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
							<label for="nama_penumpang" class="col-md-2 col-form-label">Rute</label>
							<div class="col-md-4 col-sm-10">
								<select class="form-control">
									<option>Pilih Rute</option>
									<option value="Tanjung Enim-Jambi">Tanjung Enim - Jambi</option>
									<option value="Tanjung Enim-Bengkulu">Tanjung Enim Bengkulu</option>
									<option value="Tanjung Enim-Bandar Lampung">Tanjung Enim - Bandar Lampung</option>
									<option value="Jambi-Tanjung Enim">Jambi - Tanjung Enim</option>
									<option value="Bengkulu-Tanjung Enim">Bengkulu -Tanjung Enim</option>
									<option value="Bandar Lampung-Tanjung Enim">Bandar Lampung - Tanjung Enim</option>
									<option value="Prabumulih-Jambi">Prabumulih - Jambi</option>
									<option value="Jambi-Prabumulih">Jambi - Prabumulih</option>
									<option value="Tanjung Enim-Pringsewu">Tanjung Enim - Pringsewu</option>
									<option value="Pringsewu-Tanjung Enim">Pringsewu - Tanjung Enim</option>
								</select>	
							</div>

							<label for="kotatujuan_keberangkatan" class="col-md-2 col-form-label">Kota Tujuan</label>
							<div class="col-md-4 col-sm-10">
								<select class="form-control">
									<option id="kotatujuan_keberangkatan">Pilih Kota Tujuan</option>
									<option value="Jambi">Jambi</option>
									<option value="Simpang Tampino">Simpang Tampino</option>
									<option value="Sungai Lilin">Sungai Lilin</option>
								</select>
							</div>

						</div>

						<div class="form-group row">
							<label for="jam_keberangkatan" class="col-md-2 col-form-label">Jam</label>
							<div class="col-md-4 col-sm-10">
								<select class="form-control">
									<option>Pilih Jam Keberangkatan</option>
									<option>10.00</option>
									<option>17.00</option>
									<option>19.00</option>
									<option>20.00</option>
								</select>
							</div>
									
							<label for="kotapenjemputan" class="col-md-2 col-form-label">Kota Penjemputan</label>
							<div class="col-md-4 col-sm-10">
								<select class="form-control">
									<option>Pilih Kota Penjemputan</option>
									<option>Tanjung Agung</option>
									<option>Keban Agung</option>
									<option>Tanjung Enim</option>
								</select>
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
							<input class="form-control" type="number" name="jumlah_penumpang" id="jumlah_penumpang" required></textarea>
							</div>

							<label for="harga" class="col-md-2 col-form-label">Harga</label>
							<div class="col-md-4 col-sm-10">
							<input class="form-control" type="number" name="harga" id="harga" required></textarea>
							</div>
						</div>

						<div class="form-group row">

						<label for="tempatduduk_penumpang" class="col-md-2 col-form-label">Pilih Tempat Duduk</label>
						<div class="col-md-4 col-sm-10">
							<select class="form-control">
								<option>Pilih Tempat Duduk</option>
								<option>CC</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
							</select>
							<img class="mt-1" src="img/seat3.png">
						</div>

						<div class="col-sm-10 offset-sm-2 mt-5">
							<button class="btn btn-primary text-white" type="submit" name="kirim"><i class="fa fa-plus"></i> Tambah Penumpang</button>
							<a class="btn btn-danger" href="penumpang.php"><i class="fa fa-window-close"></i> Kembali</a>
						</div>
				
					</form>

				</div><!-- tutup col-sm-10 pemesanan -->
			</div><!-- tutup row pemesanan -->

		</div><!-- tutup container pemesanan -->
	</section>
	<!-- Tutup Section Form Pemesanan -->

	<!-- Section Loket Tanjung Enim -->
	<section class="progress-area gray-bg" id="progress_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="page-title section-padding">
                        <h5>Kantor</h5>
                        <h3>Kantor Pusat Tanjung Enim</h3>
                           <p>Kantor Pusat Tanjung Enim</p>
                           <p>Jl.......</p>
                           <p>Nomor HP.....</p>  
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <figure class="mobile-image">
                        
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- Tutup Section Loket Tanjung Enim -->

    <!-- Section Loket Jambi -->
    <section class="video-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="video-photo">
                        <img src="images/video-image.jpg" alt="">
                        <a href="https://www.youtube.com/watch?v=ScrDhTsX0EQ" class="popup video-button">
                            <img src="images/play-button.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-5 col-md-offset-1">
                    <div class="space-60 hidden visible-xs"></div>
                    <div class="page-title">
                        <h5 class="title wow fadeInUp" data-wow-delay="0.2s">Kantor</h5>
                        <div class="space-10"></div>
                        <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s">Kantor Perwakilan <h3>
                        <div class="space-20"></div>
                        <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                            <p>Alamat</p>
                            <p>No HP</p>
                        </div>
                        <div class="space-50"></div>
                        <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.8s">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- Tutup section loket tanjung enim -->

	<!-- Footer -->
	<footer>
		<div class="container text-center">
			
			<div class="row">
				<div class="col-sm-12">
					<p> &copy; copyright 2019 | built by <a href="instagram.com/paahryy">Pahridila Lintang</a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 text-white">
					<a class="btn btn-info" href="">Linkedn</a>
					<a class="btn btn-primary">Facebook</a>
					<a class="btn btn-success">Whatsapp</a>
				</div>
			</div>

		</div>	
	</footer>
	<!-- Tutup footer -->


<!-- Optional JavaScript, First jquery.js and then popper.js and then bootstrap JS  -->
<script type="text/javascript" src="admin/asset/js/jquery.js"></script>
<script type="text/javascript" src="admin/asset/js/popper.js"></script>
<script type="text/javascript" src="admin/asset/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="admin/asset/fontawesome/js/all.js"></script>

</body>
</html>