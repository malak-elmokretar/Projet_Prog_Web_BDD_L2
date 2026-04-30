<?php
$racine_path = '../../';
$racine = '../../../';

require_once $racine . "cookies.php";
require_once $racine . 'csrf.php'; 
require_once $racine_path . 'model/Connect.php';
require_once $racine_path . 'model/UtilisateurDB.php';
require_once $racine_path . 'class/Utilisateur.php';

use model\Connect;
use model\UtilisateurDB;

$titre = "Connexion";
include($racine_path . "view/base/header.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
        echo '<div class="alert alert-danger" role="alert">TOKEN INCORRECT</div>';
    } else {
        supprimerTokenCsrf();
        $connect = new Connect();
        $db = $connect->getConn();
        $userModel = new UtilisateurDB($db);

        $mail = $_POST['mail'] ?? '';
        $mdp  = $_POST['mdp']  ?? '';

        $utilisateur = $userModel->verifierConnexionA($mail, $mdp);

        if ($utilisateur) {
            $_SESSION['user_id'] = $utilisateur->getIdUtilisateur(); 
            $_SESSION['nom'] = $utilisateur->getNom();
            header('Location: ../utilisateurs/profil.php');
            exit;
        } else {
            echo "<p>Identifiants incorrects. <a href='../connexion.php'>Réessayer</a></p>";        }
    }
} else {
    echo "<p>Erreur requête.</p>";
}

include($racine_path . "view/base/footer.php");
?>