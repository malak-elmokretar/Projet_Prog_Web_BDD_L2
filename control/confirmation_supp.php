<?php
    session_start();
    $racine_path = '../';
    require_once $racine_path . 'admin/model/Connect.php';
    require_once $racine_path . 'admin/model/UtilisateurDB.php';
    require_once $racine_path . 'admin/class/Utilisateur.php';
    require_once $racine_path . 'csrf.php';


    use \model\Connect;
    use model\UtilisateurDB;


    if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
    http_response_code(403);
    die("Requête invalide.");
    }
    supprimerTokenCsrf();

    $connect = new Connect();
    $db = $connect->getConn();

    $userModel = new UtilisateurDB($db);

    $titre = "Suppression du profil";

    include($racine_path . "view/header.php");

    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = (int) $_POST['id'];
        $success = $userModel->supprimerUtilisateur($id);

        if ($success) {
            session_destroy();
            echo "<p>Profil supprimé !</p>";
            echo "<a href='" . $racine_path . "index.php'>Retour à l'accueil</a>";
        }   
    else {
            echo "<p>Erreur suppression.</p>";
        }

    } else {
        echo "<p>Identifiant utilisateur invalide.</p>";
    }

include($racine_path . "view/footer.php");
?>