<?php
    $racine_path = '../';
    $titre = 'Formulaire de contact';
    include($racine_path."view/base/header.php");

    $action = $racine_path."control/confirmations/confirmation_contact.php";
    $method = "POST";

    include($racine_path."view/formulaire_contact.php");

    include($racine_path."view/base/footer.php");
?>