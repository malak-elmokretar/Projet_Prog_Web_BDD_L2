<?php
    $racine_path = '../../';
    $racine = '../../../';

    require_once $racine . 'csrf.php';
    require_once $racine_path . 'model/Connect.php';
    require_once $racine_path . 'model/UtilisateurDB.php';
    require_once $racine_path . 'class/Utilisateur.php';

    use model\Connect;
    use model\UtilisateurDB;

    $connect = new Connect();
    $db = $connect->getConn();
    $userModel = new UtilisateurDB($db);

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $utilisateur = $userModel->getUtilisateurById($id);

    $titre = "Modification user";
    include($racine_path . "view/base/header.php"); // démarre la session

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='../../control/connexion.php'>Se connecter</a></p>";
        include($racine_path . "view/base/footer.php");
        exit;
    }

    if (!$utilisateur) {
        echo "<p>Utilisateur introuvable.</p>";
        include($racine_path . "view/base/footer.php");
        exit;
    }

    $action = $racine_path . "control/confirmations/confirmation_modif_user.php";
    $method = "POST";

    echo "<main>";
    include($racine_path . "view/utilisateurs/modif_utilisateur.php");
    echo "</main>";
    include($racine_path . "view/base/footer.php");
?>