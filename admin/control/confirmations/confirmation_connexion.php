<?php
session_start(); // session

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

$racine_path = '../../';
$racine = "../../../";
require_once $racine_path."cookies.php";
require_once $racine_path . 'model/Connect.php';
require_once $racine_path . 'model/UtilisateurDB.php';
require_once $racine_path . 'class/Utilisateur.php';

use model\Connect;
use model\UtilisateurDB;

$connect= new Connect();
$db= $connect->getConn();
$userModel= new UtilisateurDB($db);


function csrf_token(){
  global $csrf_token;
  
  $csrf_token_length = 50;
  
  if(!isset($csrf_token)){
    
    $csrf_token = substr(bin2hex(random_bytes(ceil($csrf_token_length / 2))), 0, $csrf_token_length);
    
    $_SESSION['csrf_token'] = $csrf_token;
    
  }
  
  return $csrf_token;
}

$titre= "Connexion";
include($racine_path . "view/base/header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if(!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
        echo '<div class="alert alert-danger" role="alert">TOKEN INCORRECT</div>';
    } else {
        echo '<div class="alert alert-success" role="alert">TOKEN CORRECT</div>';
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
            echo "<p>Identifiants incorrects ou accès interdit. Vous devez être administrateur pour accéder au back-office. <a href='" . $racine_path . "control/connexion.php'>Réessayer</a></p>";
        }
    }
} else {
    echo "<p>Erreur requête.</p>";
}

include($racine_path . "view/base/footer.php");
?>