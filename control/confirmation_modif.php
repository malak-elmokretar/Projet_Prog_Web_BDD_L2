<?php
    $racine_path = '../';
     $racine  = '../';

    $titre = "Modification effectuée !";

    require_once $racine_path . 'csrf.php';
    require_once $racine_path . "admin/model/Connect.php";
    require_once $racine_path . "admin/model/UtilisateurDB.php";
    require_once $racine_path . "admin/class/Utilisateur.php";

    use model\Connect;
    use model\UtilisateurDB;
    use model\Utilisateur;

    include($racine_path . "view/header.php"); // démarre la session

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='../control/connexion.php'>Se connecter</a></p>";
        include($racine_path . "view/footer.php");
        exit;
    }

    if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
        http_response_code(403);
        die("Requête invalide.");
    }
    supprimerTokenCsrf();

    $connect = new Connect();
    $db = $connect->getConn();
    $udb = new UtilisateurDB($db);

    $ancienUser = $udb->getUtilisateurById($_POST['id']);

    if (!$ancienUser) {
        $message = "Utilisateur introuvable.";
    } else {
        $nom    = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $mail   = trim($_POST['mail']);
        $date   = $_POST['date_naissance'];
        $mdp    = $_POST['mdp'];

        $mdpFinal = empty($mdp)
            ? $ancienUser->getMdp()
            : password_hash($mdp, PASSWORD_DEFAULT);

        $utilisateur = new Utilisateur(
            $ancienUser->getIdUtilisateur(),
            $nom, $prenom, $mail, $mdpFinal, $date,
            $ancienUser->getRoleA() ?: false
        );

        $udb->modifUtilisateur($utilisateur);
        $message = "Vos informations ont bien été mises à jour.";
    }

    echo "<p>" . htmlspecialchars($message) . "</p>";
?>
<div class="container mt-5 text-center">
    <a href="<?php echo $racine_path; ?>control/profil.php" class="btn btn-primary mt-3">Retour au profil</a>
</div>
<?php include($racine_path . "view/footer.php"); ?>