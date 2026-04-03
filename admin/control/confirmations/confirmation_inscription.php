<?php
$racine_path = '../../';
require_once $racine_path . 'model/Connect.php';
require_once $racine_path . 'model/UtilisateurDB.php';
require_once $racine_path . 'class/Utilisateur.php';

use model\Connect;
use model\UtilisateurDB;
use model\Utilisateur;

$connect=new Connect();
$db=$connect->getConn();
$userModel=new UtilisateurDB($db);

$titre="Inscription";
include($racine_path . "view/base/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom= $_POST['nom'] ?? '';
    $prenom= $_POST['prenom'] ?? '';
    $mail= $_POST['mail'] ?? '';
    $mdp= $_POST['mdp'] ?? '';
    try {
        $date_naissance = $_POST["date_naissance"];
        $annee_majeur = date("Y")-18;
        $date_majeur = date("d, m").",".$annee_majeur;
        $date_naissance <=  $date_majeur
    } catch (\exceptions\UtilisateurException\DateNaissanceException $e) {
        throw new DateNaissanceException("Erreur de date de naissance", 404);
    }
    $date_naissance= $_POST['date_naissance'] ?? '';
    $role_a= 0; 

    $utilisateur= new Utilisateur(0, $nom, $prenom, $mail, $mdp, $date_naissance, $role_a);
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

include($racine_path . "view/base/footer.php");
?>