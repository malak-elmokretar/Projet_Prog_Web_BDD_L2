<?php
    $racine_path = '../';
    $racine = '../../';

    require_once $racine . 'csrf.php';
    require_once $racine_path . "model/Connect.php";
    require_once $racine_path . "model/UtilisateurDB.php";

    use model\Connect;
    use model\UtilisateurDB;

    $titre = 'Formulaire de contact';
    include($racine_path."view/base/header.php"); // démarre la session

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='./connexion.php'>Se connecter</a></p>";
        include($racine_path."view/base/footer.php");
        exit;
    }

    if (isset($_GET['success'])): ?>
        <div class="alert alert-success container mt-3">Votre message a bien été envoyé !</div>
    <?php else:
        $connect = new Connect();
        $db = $connect->getConn();
        $udb = new UtilisateurDB($db);
        $user = $udb->getUtilisateurById($_SESSION['user_id']);

        $action = $racine_path."control/confirmations/confirmation_contact.php";
        $method = "POST";

        include($racine_path."view/formulaire_contact.php");
    endif;

    include($racine_path."view/base/footer.php");
?>