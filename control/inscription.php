<?php
	$racine_path = '../';
	$titre = 'Inscription';
	include($racine_path."view/header.php");
	
	$action = $racine_path."control/confirmation_inscription.php";
	$method = "POST";
	
	/*view*/ include($racine_path."view/formulaire_inscription.php");

		// À faire : une fois l'accès à la base de données :
		// insérer les données récupérées grâce au GET dans la bdd
    
	/*view*/ include($racine_path."view/footer.php");

?>