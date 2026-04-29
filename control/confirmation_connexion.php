<?php
session_start();
$racine_path = '../';
require_once $racine_path . 'csrf.php';

require_once $racine_path . 'cookies.php';
require_once $racine_path . 'admin/model/Connect.php';
require_once $racine_path . 'admin/model/UtilisateurDB.php';
require_once $racine_path . 'admin/class/Utilisateur.php';

use model\Connect;
use model\UtilisateurDB;

$connect = new Connect();
$db      = $connect->getConn();
$userModel = new UtilisateurDB($db);

if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
    http_response_code(403);
    die("Requête invalide.");
}
supprimerTokenCsrf();

$titre = "Connexion";
include($racine_path . "view/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mail = $_POST['mail'] ?? '';
    $mdp  = $_POST['mdp']  ?? '';

    $utilisateur = $userModel->verifierConnexion($mail, $mdp);

    if ($utilisateur) {
        // Connexion réussie : on crée le cookie de session
        creerCookieSession($utilisateur->getIdUtilisateur());
        $_SESSION['user_id'] = $utilisateur->getIdUtilisateur();
        $_SESSION['user_mail'] = $utilisateur->getMail();
        header('Location: ' . $racine_path . 'control/profil.php');
        exit();
    } else {
        echo "<p>Identifiants incorrects. <a href='" . $racine_path . "control/connexion.php'>Réessayer</a></p>";
    }

} else {
    echo "<p>Erreur requête.</p>";
}

include($racine_path . "view/footer.php");
?>