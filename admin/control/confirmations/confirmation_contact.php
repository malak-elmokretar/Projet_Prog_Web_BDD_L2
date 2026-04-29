<?php
	session_start();
	$racine_path = '../../';
	$titre = "Merci pour votre message";
	/*view*/ include($racine_path."view/base/header.php");
	

	function csrf_token(){
		global $csrf_token;
		$csrf_token_length = 50;
		if(!isset($csrf_token)){
			$csrf_token = substr(bin2hex(random_bytes(ceil($csrf_token_length / 2))), 0, $csrf_token_length);
			$_SESSION['csrf_token'] = $csrf_token;
		}
		return $csrf_token;
	}

	echo "<p>Merci pour votre message ! Vous venez de recevoir un mail de confirmation. Nous vous répondrons dès que possible.</p>";
	

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		// if(isset($_POST['id_csrf'])){
			if(!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
            	echo '<div class="alert alert-danger" role="alert">TOKEN INCORRECT</div>';
        	} else {
            	echo '<div class="alert alert-success" role="alert">TOKEN CORRECT</div>';
				$nom     = $_POST["name"] ?? '';
				$prenom  = $_POST["prenom"] ?? '';
				$objet   = $_POST["objet"] ?? '';
				$email   = $_POST["mail"] ?? '';
				$message = $_POST["message"] ?? '';
		// }
	
				$to_admin =  "malak.el-mokretar@alumni.univ-avignon.fr"	;	// admin -> à déterminer
				$subject_admin = "LET'S GO - ".$objet;	// sujet = le sujet renseigné par l'utilisateur
				$message_envoye_admin = $message_envoye_admin = "
					<!DOCTYPE html>
					<html lang='fr'>
						<head>
							<meta charset='UTF-8'>
							<title>Nouveau message</title>
						</head>
						<body style='margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, sans-serif;'>
							<table width='100%' cellpadding='0' cellspacing='0' style='padding:20px;'>
								<tr>
									<td align='center'>
										<table width='600' cellpadding='0' cellspacing='0' style='background:white; border-radius:10px; overflow:hidden;'>
											<tr>
												<td style='background-color:#198754; color:white; text-align:center; padding:20px;'>
													<h1 style='margin:0;'>Nouveau message reçu</h1>
												</td>
											</tr>
											<tr>
												<td style='padding:30px; color:#333;'>
													<h2 style='color:#198754;'>Détails du contact</h2>
													<p><strong>Nom :</strong> ".$nom."</p>
													<p><strong>Prénom :</strong> ".$prenom."</p>
													<p><strong>Email :</strong> <a href='mailto:".$email."' style='color:#198754;'>".$email."</a></p>
													<p><strong>Objet :</strong> ".$objet."</p>
													<hr style='margin:20px 0;'>
													<h3 style='color:#198754;'>Message</h3>
													<p style='background:#f1f1f1; padding:15px; border-radius:5px;'>".$message."</p>
												</td>
											</tr>
											<tr>
												<td style='background:#145c3a; color:white; text-align:center; padding:15px; font-size:12px;'>Message automatique envoyé depuis le site Let's Go</td>
											</tr>
										</table>

									</td>
								</tr>
							</table>
						</body>
					</html>
				";
	
				$headers_admin = array(
					'MIME-Version' => '1.0',
					'Content-type' => 'text/html; charset=UTF-8',
					'From' => 'malak.el-mokretar@alumni.univ-avignon.fr',
					'Reply-To' => $email,
					'X-Mailer' => 'PHP/' . phpversion()
				);

				$to_conf = $email;
				$subject_conf = "LET'S GO - E-MAIL ENVOYÉ :".$objet;
				$message_envoye_conf = $message_envoye_conf = "
					<!DOCTYPE html>
					<html lang='fr'>
						<head>
							<meta charset='UTF-8'>
							<title>Confirmation</title>
						</head>
						<body style='margin:0; padding:0; background-color:#e9f7ef; font-family: Arial, sans-serif;'>
							<table width='100%' cellpadding='0' cellspacing='0' style='padding:20px;'>
								<tr>
									<td align='center'>
										<table width='600' cellpadding='0' cellspacing='0' style='background:white; border-radius:10px; overflow:hidden;'>
											<tr>
												<td style='background-color:#198754; color:white; text-align:center; padding:20px;'>
													<h1 style='margin:0;'>Let's Go</h1>
												</td>
											</tr>
											<tr>
												<td style='padding:30px; color:#333;'>
													<h2 style='color:#198754;'>Confirmation de votre message</h2>
													<p>Bonjour <strong>'.$prenom.' '.$nom.'</strong>,</p>
													<p>Nous avons bien reçu votre demande concernant : <strong>'.$objet.'</strong>.</p>
													<p style='background:#f1f1f1; padding:15px; border-radius:5px;'>'.$message.'</p>
													<p>Notre équipe vous répondra dans les plus brefs délais.</p>
													<p style='margin-top:30px;'>À très bientôt,<br><strong>L’équipe Let's Go</strong></p>
												</td>
											</tr>
											<tr>
												<td style='background:#145c3a; color:white; text-align:center; padding:15px; font-size:12px;'>© 2026 Let's Go - Tous droits réservés</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</body>
					</html>
				";

				$headers_conf = array(
					'MIME-Version' => '1.0',
					'Content-type' => 'text/html; charset=UTF-8',
					'From' => 'malak.el-mokretar@alumni.univ-avignon.fr',
					'Reply-To' => "do-not-reply@letsgo.fr",
					'X-Mailer' => 'PHP/' . phpversion()
				);

				mail($to_admin, $subject_admin, $message_envoye_admin, $headers_admin);
				mail($to_conf, $subject_conf, $message_envoye_conf, $headers_conf);
			}
		}
	// }
	/*view*/ include($racine_path."view/base/footer.php");

?>