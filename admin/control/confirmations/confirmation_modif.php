<?php

$racine_path = '../../';
require_once $racine_path . '/model/Connect.php';
require_once $racine_path . '/model/DestinationDB.php';
require_once $racine_path . '/class/Destination.php';

use model\Connect;
use model\DestinationDB;
use model\Destination;

$connect = new Connect();
$db = $connect->getConn();
$destinationModel = new DestinationDB($db);

$id          = isset($_POST['id'])          ? (int)$_POST['id']     : 0;
$nom         = isset($_POST['nom'])         ? $_POST['nom']         : '';
$descr       = isset($_POST['descr'])       ? $_POST['descr']       : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$fort        = isset($_POST['fort'])        ? $_POST['fort']        : '';
$img         = isset($_POST['img_actuelle'])? $_POST['img_actuelle']: '';
$img = isset($_POST['img']) ? $_POST['img'] : '';

//erreur mettre image car pas de permissions 
/*if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    //$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
	$uploadDir = __DIR__ . '/../../view/images/';
	if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $img = basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $uploadDir . $img);
}*/ 

$destination = new Destination($id, $nom, $descr, $description, $fort, $img);
$success = $destinationModel->modifDest($destination);

$titre = "Modification effectuée !";

include($racine_path . "view/base/header.php");

if ($success) {
    echo "<p>Destination modifiée !</p>";
    echo "<a href='" . $racine_path . "control/destinations/destinations.php' class='btn btn-dark mt-3'>Voir les destinations</a>";
    } else {
    echo "<p>Erreur lors de la modification.</p>";
    }

include($racine_path . "view/base/footer.php");
?>