<?php
	session_start();
	$racine_path = '../';
	require_once $racine_path . 'csrf.php';

	if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
    	http_response_code(403);
    	die("Requête invalide.");
	}
	supprimerTokenCsrf();

	$titre = "E-mail envoyé !";
	/*view*/ include($racine_path."view/header.php");
	
	echo "<p>Vous allez bientôt recevoir un e-mail pour réinitialiser votre mot de passe.</p>";
	
	/*view*/ include($racine_path."view/footer.php");

?>