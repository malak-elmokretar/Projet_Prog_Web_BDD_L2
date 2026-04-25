<?php
$racine_path = '../';
require_once $racine_path . 'admin/model/Connect.php';
require_once $racine_path . 'admin/model/UtilisateurDB.php';
require_once $racine_path . 'admin/class/Utilisateur.php';

use model\Connect;
use model\UtilisateurDB;
use model\Utilisateur;

$connect=new Connect();
$db=$connect->getConn();
$userModel=new UtilisateurDB($db);

$titre="Inscription";
include($racine_path . "view/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom= $_POST['nom'] ?? '';
    $prenom= $_POST['prenom'] ?? '';
    $mail= $_POST['mail'] ?? '';
    $mdp= $_POST['mdp'] ?? '';
    $date_naissance= $_POST['date_naissance'] ?? '';
    $role_a= 0; 

    $utilisateur= new Utilisateur(2, $nom, $prenom, $mail, $mdp, $date_naissance, 0);
    $success= $userModel->inscription($utilisateur);

    if ($success){
        echo "Votre compte a bien été créé.</p>";
        echo "<a href='" . $racine_path . "control/connexion.php' class='btn btn-primary mt-3'>Se connecter</a>";
    } else {
        echo "<p>Erreur inscription.</p>";
    }

} else {
    echo "<p>Erreur requête </p>";
}

include($racine_path . "view/footer.php");
?>