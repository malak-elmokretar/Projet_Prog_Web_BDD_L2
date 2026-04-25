<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header("Location: ../connexion.php");
    exit;
    }

    require_once("../../model/Connect.php");
    require_once("../../model/UtilisateurDB.php");
    require_once("../../class/Utilisateur.php");

    use model\Connect;
    use model\UtilisateurDB;
    use model\Utilisateur;

    $connect = new Connect();
    $db = $connect->getConn();

    $udb = new UtilisateurDB($db);

    $ancienUser = $udb->getUtilisateurById($_POST['id']);

    if (!$ancienUser) {
        $message = "Utilisateur introuvable.";
    } 
    else {

        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $mail = trim($_POST['mail']);
        $date = $_POST['date_naissance'];
        $mdp = $_POST['mdp'];

        if (empty($mdp)) {
            $mdpFinal = $ancienUser->getMdp();
        } else {
            $mdpFinal = password_hash($mdp, PASSWORD_DEFAULT);
        }

        $utilisateur = new Utilisateur(
            $ancienUser->getIdUtilisateur(),
            $nom,
            $prenom,
            $mail,
            $mdpFinal,
            $date,
            $ancienUser->getRoleA()
        );


        $udb->modifUtilisateur($utilisateur);
        $message = "Vos informations ont bien été mises à jour.";
    }

    $racine_path = "../../";
    $titre = "Modification effectuée !";

    include($racine_path . "view/base/header.php");

    echo "<p>$message</p>";
?>

    <div class="container mt-5 text-center">
    <a href="../utilisateurs/profil.php?id=<?php echo $ancienUser->getIdUtilisateur(); ?>" class="btn btn-primary mt-3">Retour au profil</a>
    </div>

<?php include($racine_path . "view/base/footer.php"); ?>

