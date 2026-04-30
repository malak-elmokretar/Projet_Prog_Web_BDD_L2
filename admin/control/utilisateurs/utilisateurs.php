<?php
    $racine_path = '../../';
    $racine = '../../../';

    require_once $racine_path . 'model/Connect.php';
    require_once $racine_path . 'model/UtilisateurDB.php';
    require_once $racine_path . 'class/Utilisateur.php';

    use model\Connect;
    use model\UtilisateurDB;

    $connect = new Connect();
    $db = $connect->getConn();
    $userModel = new UtilisateurDB($db);
    $utilisateurs = $userModel->getAllUtilisateurs();

    $titre = "Les utilisateurs";
    include($racine_path . "view/base/header.php"); // démarre la session

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='../../control/connexion.php'>Se connecter</a></p>";
        include($racine_path . "view/base/footer.php");
        exit;
    }

    echo "<main>";
    echo "<div class='container'>";
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Nom et prénom</th>
                    <th>Adresse e-mail</th>
                    <th>Rôle</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class='table-group-divider'>";

    foreach ($utilisateurs as $utilisateur) {
        echo $utilisateur->afficherHTML();
    }

    echo "</tbody></table>";
    echo "</div>";
    echo "</main>";

    include($racine_path . "view/base/footer.php");
?>