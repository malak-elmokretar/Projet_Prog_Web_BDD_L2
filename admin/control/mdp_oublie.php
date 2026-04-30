<?php
	$racine_path = '../';
	$titre = 'Formulaire de contact';
	/*view*/ include($racine_path."view/base/header.php");
	
	$action = $racine_path."control/confirmations/confirmation_mdp.php";
	$method = "POST";
	
	/*view*/ include($racine_path."view/formulaire_mdp_oublie.php");

		// À faire : 
        // - Vérifier si le compte existe (= l'email existe dans la bdd)
        // - Gérer l'envoi un mail automatique pour changer son mdp
	
	/*view*/ include($racine_path."view/base/footer.php");

?>