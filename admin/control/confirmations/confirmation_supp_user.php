<?php
$racine_path = '../../';
require_once $racine_path . '/model/Connect.php';
require_once $racine_path . '/model/UtilisateurDB.php';
require_once $racine_path . '/class/Utilisateur.php';

use model\Connect;
use model\UtilisateurDB;

$connect = new Connect();
$db = $connect->getConn();

$utilisateurModel = new UtilisateurDB($db);

$titre = "Suppression d'un utilisateur";

include($racine_path . "view/base/header.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];
    $success = $utilisateurModel->supprimerUtilisateur($id);

	if ($success) {
        echo "<p>Utilisateur supprimé !</p>";
        echo "<a href='" . $racine_path . "control/utilisateurs/utilisateurs.php' class='btn btn-primary'>Retour à la liste</a>";

        } else {
        echo "<p>Erreur suppression.</p>";
    }

} else {
    echo "<p>Identifiant d'utilisateur invalide.</p>";
    }

include($racine_path . "view/base/footer.php");

?>