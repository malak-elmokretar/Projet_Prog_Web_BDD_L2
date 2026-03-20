<?php
	$racine_path = '../../';
	$titre = 'Créer une destination';
    $action = $racine_path."control/confirmations/confirmation_ajout.php";
    $method = "POST";
	/*view*/ include($racine_path."view/base/header.php");
	
	echo '<main>';
	/*view*/ include($racine_path."view/destinations/ajout_destination.php");
	echo '</main>';
	/*view*/ include($racine_path."view/base/footer.php");
