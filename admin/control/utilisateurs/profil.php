<?php
	session_start();
	if (!isset($_SESSION['id'])) {
		header('Location: ../control/connexion.php');
		exit;
	}

	$racine_path = '../../';
	$titre = 'Mon profil';
	
	require_once($racine_path . "model/Connect.php");
	require_once($racine_path . "model/UtilisateurDB.php");

	use model\Connect;
	use model\UtilisateurDB;

	$connect = new Connect();
	$db = $connect->getConn();

	$udb = new UtilisateurDB($db);

	$user = $udb->getUtilisateurById($_SESSION['id']);
	include($racine_path."view/base/header.php");

	$action = $racine_path."control/confirmations/confirmation_modif_user.php";
	$method = "POST";

	include($racine_path."view/utilisateurs/info_user.php");
	include($racine_path."view/base/footer.php");
?>