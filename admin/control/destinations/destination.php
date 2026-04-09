<?php
    $racine_path = '../../';
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

    if ($destination === null) {
        echo "<p>Destination introuvable.</p>";
        exit;
    }

    $nom_dest       = $destination->getNom();
    $img            = $destination->getImg();
    $descr          = $destination->getDescr();
    $description    = $destination->getDescription();
    $fort           = $destination->getFort();

    $titre  = "Modification de " . $nom_dest;
    $action = $racine_path . "control/confirmations/confirmation_modif.php";
    $method = "POST";

    include($racine_path . "view/base/header.php");
    echo '<main>';
    include($racine_path . "view/destinations/modif_destination.php");
    echo '</main>';
    include($racine_path . "view/base/footer.php");
?>