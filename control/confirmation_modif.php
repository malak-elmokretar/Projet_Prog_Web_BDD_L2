<?php
	session_start();

	if (!isset($_SESSION['id'])) {
		header("Location: connexion.php");
		exit;
	}

	require_once $racine_path . 'csrf.php';

	require_once("../admin/model/Connect.php");
	require_once("../admin/model/UtilisateurDB.php");
	require_once("../admin/class/Utilisateur.php");

	use model\Connect;
	use model\UtilisateurDB;
	use model\Utilisateur;

	$connect = new Connect();
	$db = $connect->getConn();

	if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
		http_response_code(403);
		die("Requête invalide.");
	}
	supprimerTokenCsrf();
	$udb = new UtilisateurDB($db);

	$ancienUser = $udb->getUtilisateurById($_POST['id']);

	if (!$ancienUser) {
		$message = "Utilisateur introuvable.";
	} else {

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
			$ancienUser->getRoleA() ?: false 
		);

		$udb->modifUtilisateur($utilisateur);
		$message = "Vos informations ont bien été mises à jour.";
	}

	$racine_path = '../';
	$titre = "Modification effectuée !";
	include($racine_path."view/header.php");


echo "<p>$message</p>";
?>

<div class="container mt-5 text-center">
    <a href="../control/profil.php" class="btn btn-primary mt-3">Retour au profil</a>
</div>

<?php include($racine_path."view/footer.php"); ?>
