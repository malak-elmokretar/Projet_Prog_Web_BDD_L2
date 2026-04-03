<?php
$racine_path = '../../';
require_once $racine_path . 'model/Connect.php';
require_once $racine_path . 'model/UtilisateurDB.php';
require_once $racine_path . 'class/Utilisateur.php';

use model\Connect;
use model\UtilisateurDB;

$connect= new Connect();
$db= $connect->getConn();
$userModel= new UtilisateurDB($db);

$titre= "Connexion";
include($racine_path . "view/base/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mail= $_POST['mail'] ?? '';
    $mdp = $_POST['mdp']  ?? '';

    $utilisateur = $userModel->verifierConnexion($mail, $mdp);

    if ($utilisateur) {


        echo "<p>Bon retour parmi nous !</p>";
       // echo "<a href='" . $racine_path . "control/tdb.php' class='btn btn-primary mt-3'>Accéder au tableau de bord</a>";
    } else {
        echo "<p>Identifiants incorrects. <a href='" . $racine_path . "control/connexion.php'>Réessayer</a></p>";
    }

} else {
    echo "<p>Erreur requête.</p>";
}

include($racine_path . "view/base/footer.php");
?>