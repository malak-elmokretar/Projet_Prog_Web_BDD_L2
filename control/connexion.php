<?php
	$racine_path = '../';
	$racine = '../';

	$titre = 'Connexion';

	include($racine_path."view/header.php");

	if (isset($_SESSION['user_id'])) {
		echo "<p>Vous êtes déjà connecté. <a href='profil.php'>Accéder à mon profil</a></p>";
	} else {
		$action = $racine_path."control/confirmation_connexion.php";
		$method = "POST";
		include($racine_path."view/formulaire_connexion.php");
	}

	include($racine_path."view/footer.php");
?>