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

session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$csrf_token = $_SESSION['csrf_token'];

$id= isset($_GET['id']) ? (int)$_GET['id'] : 0;
$utilisateur= $userModel->getUtilisateurById($id);

if (!$utilisateur) {
    $titre = "Erreur";
    include($racine_path . "view/base/header.php");
    echo "<p>Utilisateur introuvable.</p>";
    include($racine_path . "view/base/footer.php");
    exit;
}

$titre  = "Modification user " ;
$action = $racine_path . "control/confirmations/confirmation_modif_user.php";
$method = "POST";

include($racine_path . "view/base/header.php");
echo "<main>";
include($racine_path . "view/utilisateurs/modif_utilisateur.php");
echo "</main>";
include($racine_path . "view/base/footer.php");
?>