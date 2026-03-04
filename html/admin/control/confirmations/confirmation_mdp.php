<?php
	$racine_path = '../../';
	$titre = "E-mail envoyé !";
	/*view*/ include($racine_path."view/base/header.php");
	
	echo "<p>Vous allez bientôt recevoir un e-mail pour réinitialiser votre mot de passe.</p>";
	
	/*view*/ include($racine_path."view/base/footer.php");

?>