<?php
    $racine_path = '../';
    $racine = '../../';
    $titre = 'Connexion';
    include($racine_path."view/base/header.php"); // démarre la session

	$action = "confirmations/confirmation_connexion.php";	 
	$method = "POST";

    include($racine_path."view/formulaire_connexion.php");
    include($racine_path."view/base/footer.php");
?>