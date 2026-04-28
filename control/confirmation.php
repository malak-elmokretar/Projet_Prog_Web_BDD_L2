<?php
	session_start();
	$racine_path = '../';
	require_once $racine_path . 'csrf.php';

	if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
    	http_response_code(403);
    	die("Requête invalide.");
	}
	supprimerTokenCsrf(); 

	$titre = "Merci pour votre message";
	include($racine_path."view/header.php");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$nom     = $_POST["name"]    ?? '';
		$prenom  = $_POST["prenom"]  ?? '';
		$objet   = $_POST["objet"]   ?? '';
		$email   = $_POST["mail"]    ?? '';
		$message = $_POST["message"] ?? '';

		$to      = "thais.esteban@alumni.univ-avignon.fr";
		$subject = "LET'S GO - " . htmlspecialchars($objet);
		$corps   = "Nom : $nom\nPrénom : $prenom\nEmail : $email\n\n$message";
		$headers = [
			'From'     => $email,
			'Reply-To' => $email,
		];

		if (mail($to, $subject, $corps, $headers)) {
			echo "<p>Merci, votre message a bien été envoyé !</p>";
			echo "<p>Nous vous répondrons dès que possible.</p>";
		} else {
			echo "<p>Erreur lors de l'envoi, veuillez réessayer.</p>";
		}

	} else {
		header('Location: ' . $racine_path . 'control/contact.php');
		exit;
	}

	include($racine_path."view/footer.php");
?>