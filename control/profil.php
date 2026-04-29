<?php
    $racine_path = '../';

    require_once($racine_path . "admin/model/Connect.php");
    require_once($racine_path . "admin/model/UtilisateurDB.php");

    use model\Connect;
    use model\UtilisateurDB;

    $titre = 'Mon profil';
    include($racine_path . "view/header.php"); 

    if (!isset($_SESSION['user_id'])) {
        echo "<script>window.location.href='../control/connexion.php';</script>";
        exit;
    }

    $connect = new Connect();
    $db = $connect->getConn();
    $udb = new UtilisateurDB($db);
    $user = $udb->getUtilisateurById($_SESSION['user_id']);

    $action = $racine_path . "control/confirmation_modif.php";
    $method = "POST";

    include($racine_path . "view/info_user.php");
    include($racine_path . "view/footer.php");
?>