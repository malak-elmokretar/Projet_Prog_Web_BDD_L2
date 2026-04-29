<?php
	session_start();
	
	if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    $csrf_token = $_SESSION['csrf_token'];

	$racine_path = '../';
	$titre = 'Connexion';
	include($racine_path."view/base/header.php");
	
	$action = $racine_path."control/confirmations/confirmation_connexion.php";
	$method = "POST";
	
	/*view*/ include($racine_path."view/formulaire_connexion.php");
	
	/*view*/ include($racine_path."view/base/footer.php");

?>