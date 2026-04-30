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
include($racine_path . "view/base/header.php");
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

if(!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
        echo '<div class="alert alert-danger" role="alert">TOKEN INCORRECT</div>';
    } else {
        echo '<div class="alert alert-success" role="alert">TOKEN CORRECT</div>';
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $descr = isset($_POST['descr']) ? $_POST['descr'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $fort = isset($_POST['fort']) ? $_POST['fort'] : '';
        $img = isset($_POST['img_actuelle'])? $_POST['img_actuelle']: '';
        $img = isset($_POST['img']) ? $_POST['img'] : '';

        $destination = new Destination($id, $nom, $descr, $description, $fort, $img);
        $success = $destinationModel->modifDest($destination);

        $titre = "Modification effectuée !";
        if ($success) {
            echo "<p>Destination modifiée !</p>";
            echo "<a href='" . $racine_path . "control/destinations/destinations.php' class='btn btn-dark mt-3'>Voir les destinations</a>";
        } else {
            echo "<p>Erreur lors de la modification.</p>";
        }
    }

include($racine_path . "view/base/footer.php");
?>