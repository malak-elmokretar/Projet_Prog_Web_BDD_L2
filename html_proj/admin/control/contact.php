<?php
	$racine_path = '../';
	$titre = 'Formulaire de contact';
	/*view*/ include($racine_path."view/base/header.php");
	
	$action = $racine_path."control/confirmations/confirmation_contact.php";
	$method = "POST";
	
	/*view*/ include($racine_path."view/formulaire_contact.php");

		// vérifier si nom
		// vérifier si email
		// envoyer mail -> verifier si l'envoie a fonctionné
			// confirmation de l'envoie
	
	/*view*/ include($racine_path."view/base/footer.php");

?>