<?php  
	session_start();
	include 'functions.php';

	if ( isset($_COOKIE["id"]) && isset($_COOKIE["key"]) ) 
	{
		$id 	= $_COOKIE["id"];
		$key 	= $_COOKIE["key"];

		$result	= mysqli_query($conn, "SELECT username FROM admin WHERE id_admin = '$id' ");
		$row 	= mysqli_fetch_assoc($result);
		if ( $key === hash('sha256', $row['username'])) {
			$_SESSION["login"] = true;
		}
	}

	if (isset($_SESSION["login"])) {
		header('Location: index.php');
		exit;
	}

	global $conn;


	if (isset($_POST["login"])) 
	{

		$username 	= $_POST["username"];
		$password 	= $_POST["password"];

		$result 	= mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' ");

		if ($row = mysqli_fetch_assoc($result)) 
		{ 
				if (password_verify($password,$row["password"]))
				{
					$_SESSION["login"] = true;
					
						if (isset($_POST["ingatsaya"])) 
							{
								// setcookie
								setcookie("id" , $row["id_admin"] , time() + 60);
								setcookie('key' , hash('sha256', $row['username']) , time() + 60 );
							}
					header('Location:index.php');
				}
				else
				{
					echo 	"<script>
								alert('Password Salah');
							</script>";	
				}
		}else
		{
			echo 	"<script>
						alert('Username Salah');
					</script>";
		}


	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
</head>
<body>



	<div class="card w-50  mx-auto">
		<div class="card-body">
			<h5 class="card-title text-center">Form Login Admin</h5>
			
			<form method="post" action="">
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" type="text" name="username" id="username">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" type="password" name="password" id="password">
				</div>

				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" name="ingatsaya" id="ingatsaya"></input>
					<label class="form-check-label" for="ingatsaya">Ingat Saya</label>
				</div>

				<button class="btn btn-primary" type="submit" name="login">Login</button>
			</form>

		</div>
	</div>



</body>
</html>