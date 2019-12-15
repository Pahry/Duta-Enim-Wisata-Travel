<?php  

	include 'functions.php';

	global $conn;

	
	if (isset($_POST["daftar"])) {
		
		if ( daftaradmin($_POST) > 0 )
		{
			echo "	<script>
						alert('Data Berhasil Ditambahkan');
						document.location.href='loginadmin.php';
					</script>";
		}else{
			echo mysqli_error($conn);
		}
	
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Admin</title>
</head>
<body>



	<div class="card w-50  mx-auto">
		<div class="card-body">
			<h5 class="card-title text-center">Form Daftar Admin</h5>

			<form action="" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" type="text" name="username" id="username">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" type="password" name="password" id="password">
				</div>

				<div class="form-group">
					<label for="password2">Ulangi Password</label>
					<input class="form-control" type="password" name="password2" id="password2">
				</div>

				<button class="btn btn-primary" type="submit" name="daftar">Daftar</button>

			</form>
			
		</div>
	</div>



</body>
</html>