<?php
    $racine_path = '../';
    $racine = '../';

    $titre = 'Formulaire de contact';
    include($racine_path."view/header.php"); // démarre la session

    $action = $racine_path."control/confirmation.php";
    $method = "POST";

    include($racine_path."view/formulaire_contact.php");
    include($racine_path."view/footer.php");
?>