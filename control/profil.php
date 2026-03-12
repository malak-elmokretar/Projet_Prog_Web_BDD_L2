<?php
	$racine_path = '../';
	$titre = 'Mon profil';
	include($racine_path."view/header.php");
	
	$action = $racine_path."control/confirmation_modif.php";
	$method = "POST";
	
	/*view*/ include($racine_path."view/info_user.php");

	/*view*/ include($racine_path."view/footer.php");

?>