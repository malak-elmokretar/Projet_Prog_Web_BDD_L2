<?php
$racine_path = '../../';
require_once $racine_path . 'model/Connect.php';
require_once $racine_path . 'model/UtilisateurDB.php';
require_once $racine_path . 'class/Utilisateur.php';

use model\Connect;
use model\UtilisateurDB;
use model\Utilisateur;

$connect= new Connect();
$db= $connect->getConn();
$userModel= new UtilisateurDB($db);

$titre = "Modification utilisateur";
include($racine_path . "view/base/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id= (int)($_POST['id'] ?? 0);
    $nom= $_POST['nom'] ?? '';
    $prenom= $_POST['prenom'] ?? '';
    $mail= $_POST['mail'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? '';
    $role_a= (int)($_POST['role_a'] ?? 0);

    $userActuel= $userModel->getUtilisateurById($id);
    $mdp= $userActuel ? $userActuel->getMdp() : '';

    $utilisateur= new Utilisateur($id, $nom, $prenom, $mail, $mdp, $date_naissance, $role_a);
    $success= $userModel->modifUtilisateur($utilisateur);

    if ($success) {
        echo "<p>Utilisateur modifié !</p>";
        echo "<a href='" . $racine_path . "control/utilisateurs/utilisateurs.php' class='btn btn-dark mt-3'>Voir les utilisateurs</a>";
    } else {
        echo "<p>Erreur modification.</p>";
    }

} else {
    echo "<p>Erreur requête.</p>";
}

include($racine_path . "view/base/footer.php");
?>