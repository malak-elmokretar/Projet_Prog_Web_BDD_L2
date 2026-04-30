<?php
    $racine_path = '../';
    $racine = '../../';
    $titre = "Tableau de bord";
    include($racine_path."view/base/header.php"); 

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='./connexion.php'>Se connecter</a></p>";
        include($racine_path."view/base/footer.php");
        exit;
    }

    echo "<main>";
    include($racine_path."view/tableau_de_bord.php");
    echo "</main>";
    include($racine_path."view/base/footer.php");
?>