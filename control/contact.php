<?php
	session_start();
	if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
	$csrf_token = $_SESSION['csrf_token'];
	$racine_path = '../';
	$titre = 'Formulaire de contact';
	/*view*/ include($racine_path."view/header.php");
	
	$action = $racine_path."control/confirmation_contact.php";
	$method = "POST";
	
	/*view*/ include($racine_path."view/formulaire_contact.php");
	
	/*view*/ include($racine_path."view/footer.php");

?>