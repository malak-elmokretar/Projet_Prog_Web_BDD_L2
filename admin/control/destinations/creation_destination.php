<?php
    $racine_path = '../../';
    $racine = '../../../';

    require_once $racine . 'csrf.php';

    $titre  = 'Créer une destination';
    $action = $racine_path."control/confirmations/confirmation_ajout.php";
    $method = "POST";

    include($racine_path."view/base/header.php"); // démarre la session

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='../../control/connexion.php'>Se connecter</a></p>";
        include($racine_path."view/base/footer.php");
        exit;
    }

    echo '<main>';
    include($racine_path."view/destinations/ajout_destination.php");
    echo '</main>';
    include($racine_path."view/base/footer.php");
?>