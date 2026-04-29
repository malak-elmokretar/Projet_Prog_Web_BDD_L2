<?php
session_start();

function csrf_token(){
    global $csrf_token;
    $csrf_token_length = 50;
    if(!isset($csrf_token)){
        $csrf_token = substr(bin2hex(random_bytes(ceil($csrf_token_length / 2))), 0, $csrf_token_length);
        $_SESSION['csrf_token'] = $csrf_token;
    }
  return $csrf_token;
}

$racine_path = '../../';
require_once $racine_path . 'model/Connect.php';
require_once $racine_path . 'model/DestinationDB.php';
require_once $racine_path . 'class/Destination.php';

use model\Connect;
use model\DestinationDB;
use model\Destination;

$connect = new Connect();
$db = $connect->getConn();

$destinationModel = new DestinationDB($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['id_csrf'])){
        if(!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
            echo '<div class="alert alert-danger" role="alert">TOKEN INCORRECT</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">TOKEN CORRECT</div>';
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $descr = isset($_POST['descr']) ? $_POST['descr'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $fort = isset($_POST['fort']) ? $_POST['fort'] : '';
            $img = isset($_POST['img']) ? $_POST['img'] : '';

            $destination = new Destination(0, $nom, $descr, $description, $fort, $img);
            $success = $destinationModel->ajoutDest($destination);

            $titre = "Ajout effectué !";
            include($racine_path . "view/base/header.php");

            if ($success) {
                echo "<p>La destination a été ajoutée avec succès.</p>";
            } else {
                echo "<p>Une erreur est survenue lors de l'ajout de la destination.</p>";
                // Afficher les erreurs PDO pour le débogage
                $errorInfo = $destinationModel->getDb()->errorInfo();
                echo "<p>Erreur SQL: " . $errorInfo[2] . "</p>";
            }
            include($racine_path . "view/base/footer.php");
        }
    }
} else {
    $titre = "Erreur";
    include($racine_path . "view/base/header.php");
    echo "<p>Méthode de requête non valide.</p>";
    include($racine_path . "view/base/footer.php");
}
?>