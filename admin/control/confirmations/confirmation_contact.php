<?php
    session_start();
    $racine_path = '../../';
    $racine = '../../../';
    require_once $racine . 'csrf.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: ../../control/connexion.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
            http_response_code(403);
            die("Requête invalide.");
        }
        supprimerTokenCsrf();

        $nom     = $_POST["name"]    ?? '';
        $prenom  = $_POST["prenom"]  ?? '';
        $objet   = $_POST["objet"]   ?? '';
        $email   = $_POST["mail"]    ?? '';
        $message = $_POST["message"] ?? '';

        $to      = "thais.esteban@alumni.univ-avignon.fr";
        $subject = "LET'S GO - " . htmlspecialchars($objet);
        $corps   = "Nom : $nom\nPrénom : $prenom\nEmail : $email\n\n$message";
        $headers = ['From' => $email, 'Reply-To' => $email];

        mail($to, $subject, $corps, $headers);
        header('Location: ../contact.php?success=1');
        exit;
    } else {
        header('Location: ../contact.php');
        exit;
    }
?>