<?php

session_start();
if (!isset($_SESSION['id'])) {
        header("Location: ./connexion.php");
    exit;
}
	$racine_path = '../';
	$titre = "Tableau de bord";
	/*view*/ include($racine_path."view/base/header.php");
	echo "<main>";
	/*view*/ include($racine_path."view/tableau_de_bord.php");
	echo "</main>";
	/*view*/ include($racine_path."view/base/footer.php");

?>