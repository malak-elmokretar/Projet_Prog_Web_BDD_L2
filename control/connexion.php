<?php
	session_start();

	$racine_path = '../';
	$titre = 'Connexion';

	include($racine_path."view/header.php");
	

	$action = $racine_path."control/confirmation_connexion.php";
	$method = "POST";
	
	/*view*/ include($racine_path."view/formulaire_connexion.php");

	/*view*/ include($racine_path."view/footer.php");

?>