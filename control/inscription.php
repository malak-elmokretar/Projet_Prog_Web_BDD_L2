<?php
    $racine_path = '../';
    $titre = 'Inscription';
    include($racine_path."view/header.php"); // démarre la session

    $action = $racine_path."control/confirmation_inscription.php";
    $method = "POST";

    include($racine_path."view/formulaire_inscription.php");
    include($racine_path."view/footer.php");
?>