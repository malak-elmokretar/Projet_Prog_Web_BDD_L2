<?php
    $titre = "Let's go : back-office administrateur"; 
    $racine_path = './';
    $racine = '../'; 

    include('./view/base/header.php');
    $main = "<p> Contenu confidentiel ! <a href='./control/connexion.php'>Connectez-vous</a> ou <a href='./control/inscription.php'>inscrivez-vous</a> pour accéder au contenu du site.</p>"; 
    $pageariane = "Accueil";
    include($racine_path.'view/base/main.php');
    include($racine_path.'view/base/footer.php');

?>