<?php
    $racine_path = '../../';
    $racine = '../../../';

    require_once $racine . 'csrf.php';
    require_once $racine_path . 'model/Connect.php';
    require_once $racine_path . 'model/DestinationDB.php';
    require_once $racine_path . 'class/Destination.php';

    use model\Connect;
    use model\DestinationDB;

    $connect = new Connect();
    $db = $connect->getConn();
    $destinationModel = new DestinationDB($db);

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $destination = $destinationModel->getDestById($id);

    $nom_dest    = $destination ? $destination->getNom() : '';
    $img         = $destination ? $destination->getImg() : '';
    $descr       = $destination ? $destination->getDescr() : '';
    $description = $destination ? $destination->getDescription() : '';
    $fort        = $destination ? $destination->getFort() : '';

    $titre  = "Modification de " . $nom_dest;
    $action = $racine_path . "control/confirmations/confirmation_modif_destination.php";
    $method = "POST";

    include($racine_path . "view/base/header.php"); // démarre la session

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='../../control/connexion.php'>Se connecter</a></p>";
        include($racine_path . "view/base/footer.php");
        exit;
    }

    if ($destination === null) {
        echo "<p>Destination introuvable.</p>";
        include($racine_path . "view/base/footer.php");
        exit;
    }

    echo '<main>';
    include($racine_path . "view/destinations/modif_destination.php");
    echo '</main>';
    include($racine_path . "view/base/footer.php");
?>