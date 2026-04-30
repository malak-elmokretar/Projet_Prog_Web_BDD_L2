<?php
    $racine_path = '../../';
    $racine = '../../../';

    require_once $racine . 'csrf.php';
    require_once $racine_path . 'model/Connect.php';
    require_once $racine_path . 'model/UtilisateurDB.php';
    require_once $racine_path . 'class/Utilisateur.php';

    use model\Connect;
    use model\UtilisateurDB;
    use model\Utilisateur;

    $connect = new Connect();
    $db = $connect->getConn();
    $udb = new UtilisateurDB($db);
    $ancienUser = $udb->getUtilisateurById($_POST['id']);

    $titre = "Modification effectuée !";
    include($racine_path . "view/base/header.php"); // démarre la session

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='../../control/connexion.php'>Se connecter</a></p>";
        include($racine_path . "view/base/footer.php");
        exit;
    }

    if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
        echo '<div class="alert alert-danger" role="alert">TOKEN INCORRECT</div>';
    } else {
        supprimerTokenCsrf();

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
                $ancienUser->getRoleA()
            );

            $udb->modifUtilisateur($utilisateur);
            $message = "Vos informations ont bien été mises à jour.";
        }

        echo "<p>" . htmlspecialchars($message) . "</p>";
        echo '<div class="container mt-5 text-center"><a href="../utilisateurs/utilisateur.php?id=' . $ancienUser->getIdUtilisateur() . '" class="btn btn-primary mt-3">Retour au profil</a></div>';
    }

    include($racine_path . "view/base/footer.php");
?>