<?php
    $racine_path = '../../';
    $racine = '../../../';

    require_once $racine_path . 'model/Connect.php';
    require_once $racine_path . 'model/DestinationDB.php';
    require_once $racine_path . 'class/Destination.php';

    use model\Connect;
    use model\DestinationDB;

    $connect = new Connect();
    $db = $connect->getConn();
    $destinationModel = new DestinationDB($db);

    $titre = "Suppression d'une destination";
    include($racine_path . "view/base/header.php"); // démarre la session

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='../../control/connexion.php'>Se connecter</a></p>";
        include($racine_path . "view/base/footer.php");
        exit;
    }

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = (int) $_GET['id'];
        $success = $destinationModel->supprimerDest($id);

        if ($success) {
            echo "<p>Destination supprimée !</p>";
            echo "<a href='" . $racine_path . "control/destinations/destinations.php' class='btn btn-primary'>Retour à la liste</a>";
        } else {
            echo "<p>Erreur suppression.</p>";
        }
    } else {
        echo "<p>Identifiant de destination invalide.</p>";
    }

    include($racine_path . "view/base/footer.php");
?>