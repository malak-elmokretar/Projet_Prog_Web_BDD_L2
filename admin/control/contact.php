<?php
	session_start();
	if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
	if (!isset($_SESSION['id'])) {
        header("Location: ./connexion.php");
    	exit;
    }
	$racine_path = '../';
	$titre = 'Formulaire de contact';
	/*view*/ include($racine_path."view/base/header.php");
	
	require_once($racine_path . "model/Connect.php");
	require_once($racine_path . "model/UtilisateurDB.php");

	use model\Connect;
	use model\UtilisateurDB;

	$connect = new Connect();
	$db = $connect->getConn();

	$udb = new UtilisateurDB($db);

	$user = $udb->getUtilisateurById($_SESSION['id']);
	
    $csrf_token = $_SESSION['csrf_token'];

	$action = $racine_path."control/confirmations/confirmation_contact.php";
	$method = "POST";
	
	/*view*/ include($racine_path."view/formulaire_contact.php");
	
	/*view*/ include($racine_path."view/base/footer.php");

?>