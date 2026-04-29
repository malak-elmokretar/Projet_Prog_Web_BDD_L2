<?php
session_start();

if (!isset($_SESSION['id'])) {
        header("Location: ../connexion.php");
    exit;
}

$racine_path = '../../';
require_once $racine_path . '/model/Connect.php';
require_once $racine_path . '/model/UtilisateurDB.php';
require_once $racine_path . '/class/Utilisateur.php';

use model\Connect;
use model\UtilisateurDB;
use model\Utilisateur;

$connect = new Connect();
$db = $connect->getConn();
$udb = new UtilisateurDB($db);
$ancienUser = $udb->getUtilisateurById($_POST['id']);
$titre = "Modification effectuée !";
include($racine_path . "view/base/header.php");


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
        var_dump($_SESSION["csrf_token"]);
        echo '<div class="alert alert-danger" role="alert">TOKEN INCORRECT</div>';
} else {
    echo '<div class="alert alert-success" role="alert">TOKEN CORRECT</div>';
    if (!$ancienUser) {
        $message = "Utilisateur introuvable.";
    } else {
    $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $mail = trim($_POST['mail']);
        $date = $_POST['date_naissance'];
        $mdp = $_POST['mdp'];

        if (empty($mdp)) {
            $mdpFinal = $ancienUser->getMdp();
        } else {
            $mdpFinal = password_hash($mdp, PASSWORD_DEFAULT);
        }

        $utilisateur = new Utilisateur(
            $ancienUser->getIdUtilisateur(),
            $nom,
            $prenom,
            $mail,
            $mdpFinal,
            $date,
            $ancienUser->getRoleA()
        );


        $udb->modifUtilisateur($utilisateur);
        $message = "Vos informations ont bien été mises à jour.";
    }
}

echo $message;
echo '<div class="container mt-5 text-center"><a href="../utilisateurs/profil.php?id='.$ancienUser->getIdUtilisateur().'" class="btn btn-primary mt-3">Retour au profil</a></div>';
include($racine_path . "view/base/footer.php");
?>