<?php
    session_start(); // ← avant tout le reste
    $racine_path = '../';
    require_once $racine_path . 'csrf.php';
    require_once $racine_path . 'cookies.php';
    require_once $racine_path . 'admin/model/Connect.php';
    require_once $racine_path . 'admin/model/UtilisateurDB.php';
    require_once $racine_path . 'admin/class/Utilisateur.php';

    use model\Connect;
    use model\UtilisateurDB;

    $connect   = new Connect();
    $db        = $connect->getConn();
    $userModel = new UtilisateurDB($db);

    if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
        http_response_code(403);
        die("Requête invalide.");
    }
    supprimerTokenCsrf();

    $mail = $_POST['mail'] ?? '';
    $mdp  = $_POST['mdp']  ?? '';

    $utilisateur = $userModel->verifierConnexion($mail, $mdp);

    if ($utilisateur) {
        $_SESSION['user_id'] = $utilisateur->getIdUtilisateur();
        header('Location: ' . '../index.php');
        exit;
    }

    header('Location: ' . '../control/connexion.php?erreur=1');
    exit;
?>