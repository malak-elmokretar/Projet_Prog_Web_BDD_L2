<?php
    $racine_path = '../';
    $racine  = '../';
    $titre = 'Mot de passe oublié';

    include($racine_path."view/header.php"); // démarre la session

    $action = $racine_path."control/confirmation_mdp.php";
    $method = "POST";

    include($racine_path."view/formulaire_mdp_oublie.php");
    include($racine_path."view/footer.php");
?>