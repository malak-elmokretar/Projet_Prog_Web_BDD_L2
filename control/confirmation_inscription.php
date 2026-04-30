<?php
    $racine_path = '../';
    $racine = '../';

    require_once $racine_path . 'admin/model/Connect.php';
    require_once $racine_path . 'admin/model/UtilisateurDB.php';
    require_once $racine_path . 'admin/class/Utilisateur.php';
    require_once $racine_path . 'csrf.php';

    use model\Connect;
    use model\UtilisateurDB;
    use model\Utilisateur;

    $titre = "Inscription";
    include($racine_path . "view/header.php"); // démarre la session

    if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
        http_response_code(403);
        die("Requête invalide.");
    }
    supprimerTokenCsrf();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $connect = new Connect();
        $db = $connect->getConn();
        $userModel = new UtilisateurDB($db);

        $nom           = $_POST['nom'] ?? '';
        $prenom        = $_POST['prenom'] ?? '';
        $mail          = $_POST['mail'] ?? '';
        $mdp           = $_POST['mdp'] ?? '';
        $date_naissance = $_POST['date_naissance'] ?? '';

        $utilisateur = new Utilisateur(2, $nom, $prenom, $mail, $mdp, $date_naissance, 0);
        $success = $userModel->inscription($utilisateur);

        if ($success) {
            echo "<p>Votre compte a bien été créé.</p>";
            echo "<a href='" . $racine_path . "control/connexion.php' class='btn btn-primary mt-3'>Se connecter</a>";
        } else {
            echo "<p>Erreur inscription.</p>";
        }
    } else {
        echo "<p>Erreur requête.</p>";
    }

    include($racine_path . "view/footer.php");
?>