<?php
session_start(); // session 

$racine_path = '../../';    //depuis admin
$racine = '../../../';

require_once $racine . 'cookies.php';

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

    $utilisateur = $userModel->verifierConnexionA($mail, $mdp);
   
        if ($utilisateur) {
            creerCookieSession($utilisateur->getIdUtilisateur());
            $_SESSION['id'] = $utilisateur->getIdUtilisateur();
            $_SESSION['nom'] = $utilisateur->getNom();
            header('Location: ../utilisateurs/profil.php');
            exit;
    } else {
        echo "<p>Identifiants incorrects ou alors vous n'etes pas admim !. <a href='" . $racine_path . "control/connexion.php'>Réessayer</a></p>";
    }

} else {
    echo "<p>Erreur requête.</p>";
}

include($racine_path . "view/base/footer.php");
?>