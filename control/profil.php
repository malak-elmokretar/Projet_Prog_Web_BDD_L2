<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		header('Location: ../control/connexion.php');
		exit;
	}

	$racine_path = '../';
	$titre = 'Mon profil';
	
	require_once("../admin/model/Connect.php");
	require_once("../admin/model/UtilisateurDB.php");

	use model\Connect;
	use model\UtilisateurDB;

	$connect = new Connect();
	$db = $connect->getConn();

	$udb = new UtilisateurDB($db);

	$user = $udb->getUtilisateurById($_SESSION['id']);
	include($racine_path."view/header.php");

	$action = $racine_path."control/confirmation_modif.php";
	$method = "POST";

	include($racine_path."view/info_user.php");
	include($racine_path."view/footer.php");
?>
