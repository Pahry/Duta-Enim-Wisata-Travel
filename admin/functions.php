<link rel="stylesheet" type="text/css" href="asset/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="asset/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" type="text/css" href="asset/fontawesome/css/fontawesome.css">
<script type="text/javascript" src="asset/fontawesome/js/all.js"></script>
<script type="text/javascript" src="asset/fontawesome/js/all.min.js"></script>

<?php  

$conn = mysqli_connect("localhost","root","","duta_enim");

function tampilloket($tampil)
{
	global $conn;
	$result = mysqli_query($conn,$tampil);
	$rows = [];

	while( $row = mysqli_fetch_assoc($result) )
	{
		$rows[] = $row;
	}
	return $rows;
	
}

function tambahloket($tambah)
{
	global $conn;
	$nama 				= htmlspecialchars($tambah["nama_loket"]);
	$pengurus 			= htmlspecialchars($tambah["pengurus_loket"]);
	$nohp 				= htmlspecialchars($tambah["nohp_loket"]);
	$alamat 			= htmlspecialchars($tambah["alamat_loket"]);
	
	$fotoloket 			= tambahfoto_loket();
	
	$query 		= "INSERT INTO loket VALUES ('','$nama','$pengurus','$nohp','$alamat','$fotoloket')";
	mysqli_query($conn,$query);

	if( mysqli_affected_rows($conn) > 0 )
	{
		echo 	"<script>
					alert('Data Berhasil Ditambahkan');
					document.location.href='loket.php';
				</script>";
	}else{
		echo 	"<script>
					alert('Data gagal ditambahkan');
				 </script>";
	}
}

function tambahfoto_loket()
{
	$namafoto_loket 	= $_FILES["foto_loket"]["name"];	
	$tipefoto_loket 	= $_FILES["foto_loket"]["type"];
	$tmpfoto_loket 		= $_FILES["foto_loket"]["tmp_name"];
	$errorfoto_loket	= $_FILES["foto_loket"]["error"];
	$ukuranfoto_loket 	= $_FILES["foto_loket"]["size"];

	$ekstensivalidfoto_loket 	= ["jpg","jpeg","png"];
	$pecahfoto_loket 			= explode('.',$namafoto_loket);
	$ekstensifoto_loket 		= end($pecahfoto_loket);
	$ekstensifoto_loket			= strtolower($ekstensifoto_loket);

	
	if (!in_array($ekstensifoto_loket, $ekstensivalidfoto_loket))
	{
		echo 	"<script>
					alert('Yang anda upload bukan gambar');
				</script>";

				return false;
	}

	if ($ukuranfoto_loket > 2000000)
	{

		echo 	"<script>
					alert('Jangan lebih dari 2 MB');
				</script>";

				return false;
	}

	$namafoto_loketbaru = uniqid();
	$namafoto_loketbaru = $namafoto_loketbaru.'.'.$ekstensifoto_loket;

	move_uploaded_file($tmpfoto_loket,'img/fotoloket/'.$namafoto_loketbaru);

	return $namafoto_loketbaru;

}

function ubahloket($ubah)
{
	global $conn;
	$id_loket		= $ubah["id_loket"];
	$nama 			= htmlspecialchars ($ubah["nama_loket"]);
	$pengurus 		= htmlspecialchars($ubah["pengurus_loket"]);
	$nohp 			= htmlspecialchars($ubah["nohp_loket"]);
	$alamat 		= htmlspecialchars($ubah["alamat_loket"]);
	$fotolama_loket = $ubah['fotolama_loket'];

	if ( $_FILES['foto_loket']['error'] === 4 )
	{
		$foto_loket = $fotolama_loket;
	}else
	{
		$foto_loket = tambahfoto_loket();
	}
	
	
	$query 		= "UPDATE loket SET 
					nama_loket 		= '$nama',
					pengurus_loket	= '$pengurus',
					nohp_loket		= '$nohp',
					alamat_loket	= '$alamat',
					foto_loket 		= '$foto_loket'
					WHERE id_loket	=  $id_loket";

	mysqli_query($conn,$query);

	if( mysqli_affected_rows($conn) > 0 )
	{
		echo "	<script>
					alert('Data Berhasil Diubah');
					document.location.href='loket.php';
				</script>";
	}else{
		echo "Data gagal diubah";
		echo mysqli_error($conn);
	}
}

function hapusloket($id_loket)
{
	global $conn;
	$query = "DELETE FROM loket WHERE id_loket= $id_loket";
	mysqli_query($conn, $query);

	if( mysqli_affected_rows($conn) > 0 ){
		echo "	<script>
					alert ('Data Berhasil Dihapus');
					document.location.href='loket.php';
				</script>";
	}else{
		echo "Data gagal dihapus";
	}
}

function cariloket($cari)
{
	$query = "SELECT * FROM loket WHERE 
				nama_loket 		LIKE '%$cari%' OR 
				pengurus_loket 	LIKE '%$cari%' OR
				nohp_loket 		LIKE '%$cari%' OR
				alamat_loket 	LIKE '%$cari%' ";
	return tampilloket($query);
}

function tampilsupir($query)
{
	global $conn;

	$result = mysqli_query($conn,$query);
	$rows=[];
	while ($row=mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function tambahsupir($post)
{
	global $conn;

	$namasupir 	 = htmlspecialchars($_POST["nama_supir"]);
	$ttlsupir 	 = htmlspecialchars($_POST["ttl_supir"]);
	$tipemobil 	 = htmlspecialchars($_POST["tipe_mobil"]);
	$platmobil 	 = htmlspecialchars($_POST["plat_mobil"]);
	$sim		 = $_POST["sim"];
	$nohpsupir	 = htmlspecialchars($_POST["nohp_supir"]);
	$alamatsupir = htmlspecialchars($_POST["alamat_supir"]);

	$simgabung	 = implode(',', $sim);

	$fotosupir 		= uploadfotosupir();
	if (!$fotosupir) 
	{
		return false;
	}

	$query = "INSERT INTO supir VALUES ('','$namasupir','$ttlsupir','$tipemobil','$platmobil','$simgabung','$nohpsupir','$alamatsupir','$fotosupir')";
	$hasil = mysqli_query($conn,$query);

	if (mysqli_affected_rows($conn) > 0 ) {
		echo "	<script>
					alert('Data Berhasil Ditambahkan');
					document.location.href = 'supir.php';
				</script> ";
	}else{
		echo "Data gagal ditambahkan";
		
	}


		return mysqli_affected_rows($conn);
}

function uploadfotosupir()
{
	$namafotosupir 		= $_FILES["foto_supir"]["name"];
	$tipefotosupir		= $_FILES["foto_supir"]["type"];
	$tmpnamefotosupir	= $_FILES["foto_supir"]["tmp_name"];
	$errorfotosupir		= $_FILES["foto_supir"]["error"];
	$ukuranfotosupir	= $_FILES["foto_supir"]["size"];



	$ekstensivalidfotosupir = ['jpg','png','jpeg'];
	$ekstensifotosupir 		= explode('.',$namafotosupir);
	$ekstensifotosupir 		= strtolower(end($ekstensifotosupir));

	if (!in_array($ekstensifotosupir, $ekstensivalidfotosupir))
	{
		echo "<script>
				alert('File yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	if ($ukuranfotosupir > 100000)
	{
		echo "<script>
				alert('File yang anda upload lebih dari 1MB !');
			  </script>";
		return false;	
	}

	$namafilebaru	= uniqid();
	$namafilebaru	= $namafilebaru.'.'.$ekstensifotosupir;
	

	move_uploaded_file($tmpnamefotosupir,'img/'.$namafilebaru);
	return $namafilebaru;

}

function ubahsupir($ubah)
{
	global $conn;

	$id_supir		= $_POST["id_supir"];
	$nama_supir 	= htmlspecialchars($_POST["nama_supir"]);
	$ttl_supir		= htmlspecialchars($_POST["ttl_supir"]);
	$tipe_mobil		= htmlspecialchars($_POST["tipe_mobil"]);
	$plat_mobil		= htmlspecialchars($_POST["plat_mobil"]);
	$sim			= $_POST["sim"];
	$nohp_supir		= htmlspecialchars($_POST["nohp_supir"]);
	$alamat_supir	= htmlspecialchars($_POST["alamat_supir"]);
	$fotolama_supir	= $_POST["fotolama_supir"];

	$simgabung		= implode(',', $sim);

	if ( $_FILES['foto_supir']['error'] === 4 )
	{
		$foto_supir = $fotolama_supir;
	}else
	{
		$foto_supir = uploadfotosupir();
	}



	$query = ("UPDATE supir SET 
			 nama_supir 	= '$nama_supir',
			 ttl_supir		= '$ttl_supir',
			 tipe_mobil		= '$tipe_mobil',
			 plat_mobil		= '$plat_mobil',
			 sim 			= '$simgabung',
			 nohp_supir		= '$nohp_supir',
			 alamat_supir	= '$alamat_supir',
			 foto_supir 	= '$foto_supir'
			 WHERE id_supir = $id_supir");

	mysqli_query($conn,$query);
	
	if (mysqli_affected_rows($conn) > 0)
	{
		echo "	<script>
					alert('Data Berhasil Diubah');
					document.location.href='supir.php';
				</script>";
	}
	else{
		echo "<script>
				alert('Anda Tidak Melakukan Ubah Data');
			</script>";
	}

	return mysqli_affected_rows($conn);
}

function hapussupir($ids)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM supir WHERE id_supir=$ids");

	if(mysqli_affected_rows($conn) > 0 )
	{
		echo "	<script>
					alert ('Data Berhasil Dihapus');
					document.location.href='supir.php';
				</script>";
	}else{
		echo "Data gagal dihapus";
	}

	return mysqli_affected_rows($conn);
}

function carisupir($cari)
{
	$query = "SELECT * FROM supir WHERE 
				nama_supir 		LIKE '%$cari%' OR
				ttl_supir		LIKE '%$cari%' OR
				tipe_mobil 		LIKE '%$cari%' OR
				plat_mobil 		LIKE '%$cari%' OR
				sim 			LIKE '%$cari%' OR
				nohp_supir 		LIKE '%$cari%' OR
				alamat_supir 	LIKE '%$cari%'"; 

	return tampilsupir($query);
}

function tampilpenumpang($tampil)
{
	global $conn;
	$result = mysqli_query($conn,$tampil);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	}
	return $rows;
}

function tambahpenumpang($tambah)
{
	global $conn;
	$nama 					= htmlspecialchars($tambah["nama_penumpang"]);
	$tanggalkeberangkatan 	= htmlspecialchars($tambah["tanggalkeberangkatan_penumpang"]);
	$nohp 					= htmlspecialchars($tambah["nohp_penumpang"]);
	$jumlah					= htmlspecialchars($tambah["jumlah_penumpang"]);
	$alamat 				= htmlspecialchars($tambah["alamat_penumpang"]);

	$query = "INSERT INTO penumpang VALUES ('','$nama','$tanggalkeberangkatan','$nohp','$jumlah','$alamat')";

	mysqli_query($conn, $query);

	if( mysqli_affected_rows($conn) > 0 )
	{
		echo "	<script>
					alert('Data Berhasil Ditambahkan');
					document.location.href = 'penumpang.php';
				</script>";
	} else {
		echo "Gagal menambahkan data" . mysqli_error($conn);
	}
}

function ubahpenumpang($ubah)
{
	global $conn;
	$id_penumpang			= $_POST["id_penumpang"];
	$nama 					= htmlspecialchars($ubah["nama_penumpang"]);
	$tanggalkeberangkatan 	= htmlspecialchars($ubah["tanggalkeberangkatan_penumpang"]);
	$nohp 					= htmlspecialchars($ubah["nohp_penumpang"]);
	$jumlah_penumpang		= htmlspecialchars($ubah["jumlah_penumpang"]);
	$alamat 				= htmlspecialchars($ubah["alamat_penumpang"]);

	
	$query = "UPDATE penumpang SET 
				nama_penumpang	 				= '$nama',
				tanggalkeberangkatan_penumpang 	= '$tanggalkeberangkatan_penumpang',
				nohp_penumpang	 				= '$nohp',
				jumlah_penumpang 				= '$jumlah_penumpang',
				alamat_penumpang 				= '$alamat'
			 WHERE id_penumpang	 				=  $id_penumpang";

	mysqli_query($conn, $query);

	if( mysqli_affected_rows($conn) > 0 )
	{
		echo "	<script>
					alert('Data Berhasil Diubah');
					document.location.href = 'penumpang.php';
				</script>";
	} else {
		echo "Gagal mengubah data";
	}	
}

function hapuspenumpang($idpnpg)
{
	global $conn;
	$query = "DELETE FROM penumpang WHERE id_penumpang=$idpnpg";

	mysqli_query($conn, $query);

	if(mysqli_affected_rows($conn) > 0 )
	{
		echo " 	<script>
					alert('Data Berhasil Dihapus');
					document.location.href = 'penumpang.php';
				</script>";
	} else{
		echo "Data gagal dihapus";
	}
}

function caripenumpang($cari)
{
	$query = "SELECT * FROM penumpang WHERE 
				nama_penumpang 					LIKE '%$cari%' OR 
				tanggalkeberangkatan_penumpang 	LIKE '%$cari%' OR
				nohp_penumpang 					LIKE '%$cari%' OR
				jumlah_penumpang 				LIKE '%$cari%' OR
				alamat_penumpang 				LIKE '%$cari%' ";

	return tampilpenumpang($query);
}

function tampiltransaksipenumpang($tampiltransaksi)
{
	global $conn;
	$result = mysqli_query($conn,$tampiltransaksi);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	}
	return $rows;
}

function caritransaksipenumpang($cari)
{
	$query 	= "SELECT penumpang.id_penumpang,keberangkatan.tanggal_keberangkatan,keberangkatan.jam_keberangkatan, penumpang.nama_penumpang, penumpang.jumlah_penumpang, keberangkatan.kotatujuan_keberangkatan,penumpang.nohp_penumpang,keberangkatan.dari,penumpang.alamat_penumpang FROM penumpang JOIN keberangkatan
		 ON penumpang.id_penumpang = keberangkatan.id_penumpang WHERE
		 tanggal_keberangkatan		LIKE 	'%$cari%' OR
		 jam_keberangkatan			LIKE 	'%$cari%' OR
		 nama_penumpang				LIKE 	'%$cari%' OR
		 jumlah_penumpang			LIKE 	'%$cari%' OR
		 kotatujuan_keberangkatan	LIKE 	'%$cari%' OR
		 nohp_penumpang				LIKE 	'%$cari%' OR
		 dari						LIKE 	'%$cari%' OR
		 alamat_penumpang 			LIKE 	'%$cari%' ";

		 return tampilpenumpang($query);
}


function daftaradmin($data)
{
	global $conn;

	$username 	= stripslashes($data["username"]);
	$password 	= mysqli_real_escape_string($conn,$data["password"]);
	$password2 	= mysqli_real_escape_string($conn,$data["password2"]);
		
	
	$result		= mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' ");

	if(mysqli_fetch_assoc($result))
	{
		echo "<script>
					alert('Username Sudah Ada');
				</script>";
				return false;
	}

	if ($password != $password2) 
		{
			echo "	<script> 
						alert('Password Tidak Sesuai');
					</script>";
			return false;

		}

	$password 	= password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO admin VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);

}

function tampilkotaasal($data)
{
	global $conn;
	$result 	= mysqli_query ($conn,$data);
	$rows 		= [];
	while($row = mysqli_fetch_assoc($result))
	{
		$rows[] 	= $row;
	}

	return $rows;
}

function tampilkotatujuan($data)
{
	global $conn;
	$result 	= mysqli_query ($conn,$data);
	$rows 		= [];
	while($row = mysqli_fetch_assoc($result))
	{
		$rows[] 	= $row;
	}

	return $rows;
}

function tampiljamkeberangkatan($data)
{
	global $conn;
	$result 	= mysqli_query ($conn,$data);
	$rows 		= [];
	while($row = mysqli_fetch_assoc($result))
	{
		$rows[] 	= $row;
	}

	return $rows;

}

function tampilharga($data)
{
	global $conn;
	$result 	= mysqli_query ($conn,$data);
	$rows 		= [];
	while($row = mysqli_fetch_assoc($result))
	{
		$rows[] 	= $row;
	}

	return $rows;
}

?>