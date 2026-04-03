<?php
$racine_path = '../../';
require_once $racine_path . 'model/Connect.php';
require_once $racine_path . 'model/UtilisateurDB.php';

use model\Connect;
use model\UtilisateurDB;

$connect= new Connect();
$db= $connect->getConn();
$userModel= new UtilisateurDB($db);

$titre = "Suppression d'un utilisateur";
include($racine_path . "view/base/header.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id= (int)$_GET['id'];
    $success= $userModel->supprimerUtilisateur($id);

    if ($success) {
        echo "<p>Utilisateur supprimé !</p>";
        echo "<a href='" . $racine_path . "control/utilisateurs/utilisateurs.php' class='btn btn-primary mt-3'>Retour à la liste</a>";
    } else {
        echo "<p>Erreur suppression.</p>";
    }

} else {
    echo "<p>Probleme dentifiant.</p>";
}

include($racine_path . "view/base/footer.php");
?>