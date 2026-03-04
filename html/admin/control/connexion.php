<?php
	$racine_path = '../';
	$titre = 'Connexion';
	include($racine_path."view/base/header.php");
	
	$action = $racine_path."control/confirmations/confirmation_connexion.php";
	$method = "POST";
	
	/*view*/ include($racine_path."view/formulaire_connexion.php");

		// À faire : une fois l'accès à la base de données :
		// vérifier si l'e-mail est renseigné
		// vérifier si le mot de passe est renseigné
		// vérifier si l'e-mail et le mdp correspondent
		// envoyer mail -> verifier si l'envoi a fonctionné
			// confirmation de l'envoie
	/*view*/ include($racine_path."view/base/footer.php");

?>