<?php
	session_start();
if (!isset($_SESSION['id'])) {
        header("Location: ./connexion.php");
    exit;
}
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    $csrf_token = $_SESSION['csrf_token'];
	$racine_path = '../../';
	$titre = 'Créer une destination';
    $action = $racine_path."control/confirmations/confirmation_ajout.php";
    $method = "POST";
	/*view*/ include($racine_path."view/base/header.php");

	
	echo '<main>';
	/*view*/ include($racine_path."view/destinations/ajout_destination.php");
	echo '</main>';
	/*view*/ include($racine_path."view/base/footer.php");
?>