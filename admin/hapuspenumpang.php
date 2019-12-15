<?php 
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}

	include 'functions.php';

	$idpnpg = $_GET["id_penumpang"];
	
	hapuspenumpang($idpnpg);
 ?>