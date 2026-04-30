<?php
    $racine_path = '../../';
    $racine = '../../../';

    require_once $racine . 'csrf.php';
    require_once $racine_path . 'model/Connect.php';
    require_once $racine_path . 'model/DestinationDB.php';
    require_once $racine_path . 'class/Destination.php';

    use model\Connect;
    use model\DestinationDB;
    use model\Destination;

    $connect = new Connect();
    $db = $connect->getConn();
    $destinationModel = new DestinationDB($db);

    $titre = "Ajout effectué !";
    include($racine_path . "view/base/header.php"); // démarre la session

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='../../control/connexion.php'>Se connecter</a></p>";
        include($racine_path . "view/base/footer.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
            echo '<div class="alert alert-danger" role="alert">TOKEN INCORRECT</div>';
        } else {
            supprimerTokenCsrf();

            $nom         = $_POST['nom']         ?? '';
            $descr       = $_POST['descr']       ?? '';
            $description = $_POST['description'] ?? '';
            $fort        = $_POST['fort']        ?? '';
            $img         = $_POST['img']         ?? '';

            $destination = new Destination(0, $nom, $descr, $description, $fort, $img);
            $success = $destinationModel->ajoutDest($destination);

            if ($success) {
                echo "<p>La destination a été ajoutée avec succès.</p>";
            } else {
                echo "<p>Une erreur est survenue lors de l'ajout de la destination.</p>";
            }
        }
    } else {
        echo "<p>Méthode de requête non valide.</p>";
    }

    include($racine_path . "view/base/footer.php");
?>