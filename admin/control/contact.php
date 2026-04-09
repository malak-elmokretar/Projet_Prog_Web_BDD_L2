<?php
	$racine_path = '../';
	$titre = 'Formulaire de contact';
	/*view*/ include($racine_path."view/base/header.php");
	
	$action = $racine_path."control/confirmations/confirmation_contact.php";
	$method = "POST";
	
	/*view*/ include($racine_path."view/formulaire_contact.php");

		// vérifier si nom
		// vérifier si email
		// envoyer mail -> verifier si l'envoie a fonctionné
			// confirmation de l'envoie

		// $sujet_mail = $_POST["objet"];


// 		if ($method === "POST") {

//     $nom     = $_POST["name"] ?? '';
//     $prenom  = $_POST["prenom"] ?? '';
//     $objet   = $_POST["objet"] ?? '';
//     $email   = $_POST["mail"] ?? '';
//     $message = $_POST["message"] ?? '';

//     // Exemple d'affichage (debug)
//     echo "Nom : " . htmlspecialchars($nom) . "<br>";
//     echo "Prénom : " . htmlspecialchars($prenom) . "<br>";
//     echo "Objet : " . htmlspecialchars($objet) . "<br>";
//     echo "Email : " . htmlspecialchars($email) . "<br>";
//     echo "Message : " . nl2br(htmlspecialchars($message)) . "<br>";
// }



// 		$to =  "malak.el-mokretar@alumni.univ-avignon.fr"	;	// admin -> à déterminer
// 		$subject = "LET'S GO - ".$objet;	// sujet = le sujet renseigné par l'utilisateur
// 		$message = 'hello';
// 		$headers = array(
// 			'From' => 'malak.el-mokretar@alumni.univ-avignon.fr',
// 			'Reply-To' => 'malak.el-mokretar@alumni.univ-avignon.fr',
// 			'X-Mailer' => 'PHP/' . phpversion()
// );
	
	/*view*/ include($racine_path."view/base/footer.php");

?>