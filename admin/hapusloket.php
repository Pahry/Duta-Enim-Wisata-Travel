<?php  
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}

	include 'functions.php';

	$id_loket = $_GET["id_loket"];
	
	hapusloket($id_loket);
?>