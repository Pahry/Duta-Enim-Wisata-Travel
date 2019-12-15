<?php  
	session_start();

	if (!isset($_SESSION["login"])) {
		header('Location: loginadmin.php');
		exit;
	}

	include 'functions.php';

	$ids = $_GET["id_supir"];
	
	hapussupir($ids);
?>