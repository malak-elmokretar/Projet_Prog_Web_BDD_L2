<?php
    $racine_path = '../';
    $racine = '../';

    require_once $racine_path . 'csrf.php';

    $titre = "E-mail envoyé !";
    include($racine_path."view/header.php"); // démarre la session

    if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
        http_response_code(403);
        die("Requête invalide.");
    }
    supprimerTokenCsrf();

    echo "<p>Vous allez bientôt recevoir un e-mail pour réinitialiser votre mot de passe.</p>";

    include($racine_path."view/footer.php");
?>