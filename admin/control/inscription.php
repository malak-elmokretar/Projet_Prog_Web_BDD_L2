<?php
    $racine_path = '../';
    $racine = '../../';

    require_once $racine . 'csrf.php';

    $titre = 'Inscription';
    include($racine_path."view/base/header.php"); // démarre la session

    $action = $racine_path."control/confirmations/confirmation_inscription.php";
    $method = "POST";

    include($racine_path."view/formulaire_inscription.php");
    include($racine_path."view/base/footer.php");
?>