<?php
session_start();
$racine_path = '../../';
require_once $racine_path . '/model/Connect.php';
require_once $racine_path . '/model/UtilisateurDB.php';
require_once $racine_path . '/class/Utilisateur.php';

use model\Connect;
use model\UtilisateurDB;
use model\Utilisateur;

$connect=new Connect();
$db=$connect->getConn();
$userModel=new UtilisateurDB($db);

$titre="Inscription";
include($racine_path . "view/base/header.php");



function csrf_token(){
  global $csrf_token;
  
  $csrf_token_length = 50;
  
  if(!isset($csrf_token)){
    
    $csrf_token = substr(bin2hex(random_bytes(ceil($csrf_token_length / 2))), 0, $csrf_token_length);
    
    $_SESSION['csrf_token'] = $csrf_token;
    
  }
  
  return $csrf_token;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if(isset($_POST['id_csrf'])){
        if(!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
            echo '<div class="alert alert-danger" role="alert">TOKEN INCORRECT</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">TOKEN CORRECT</div>';
            
            $nom= $_POST['nom'] ?? '';
            $prenom= $_POST['prenom'] ?? '';
            $mail= $_POST['mail'] ?? '';
            $mdp= $_POST['mdp'] ?? '';
            $date_naissance= $_POST['date_naissance'] ?? '';
            $role_a= 0; 

            $utilisateur= new Utilisateur(1, $nom, $prenom, $mail, $mdp, $date_naissance, 0);
            $success= $userModel->inscription($utilisateur);
    
            $to_conf = $mail;
            $subject_conf = "LET'S GO - BIENVENUE";
	        $message_conf = $message_conf = "
                <!DOCTYPE html>
                <html lang='fr'>
                    <head>
                        <meta charset='UTF-8'>
                        <title>Bienvenue LET'S GO</title>
                    </head>
                    <body style='margin:0; padding:0; background-color:#d1e7dd; font-family:Arial, sans-serif;'>
                        <table width='100%' cellpadding='0' cellspacing='0' border='0' bgcolor='#d1e7dd'>
                            <tr>
                                <td align='center'>
                                    <table width='600' cellpadding='0' cellspacing='0' border='0' style='background:#ffffff; margin:40px 0; border-radius:12px; overflow:hidden;'>
                                        <tr>
                                            <td style='background-color:#198754; padding:20px; text-align:center;'>
                                                <h1 style='color:#ffffff; margin:0; font-size:28px; font-family:Georgia, serif;'>LET'S GO</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding:40px 30px; text-align:center;'>
                                                <h2 style='color:#198754; margin-bottom:20px;'>Bienvenue à bord !</h2>
                                                <p style='color:#333333; font-size:16px; line-height:1.6;'>Cher(e) <strong>".$nom." ".$prenom."</strong>,</p>
                                                <p style='color:#555555; font-size:15px; line-height:1.6;'>Toute l’équipe de <strong>LET'S GO</strong> est ravie de vous accueillir.</p>
                                                <p style='color:#555555; font-size:15px; line-height:1.6;'>Votre compte a bien été créé et sera validé très prochainement par nos administrateurs. En attendant, vous pouvez vous connecter en tant que client sur <a href='https://pedago.univ-avignon.fr/~uapv2601797/index.php'>le front office.</p>
                                                <table cellpadding='0' cellspacing='0' border='0' align='center' style='margin-top:30px;'>
                                                    <tr>
                                                        <td align='center' bgcolor='#66c2a5' style='border-radius:6px;'>
                                                            <a href='https://pedago.univ-avignon.fr/~uapv2601797/admin/control/connexion.php'style='display:inline-block; padding:12px 25px; color:#ffffff; text-decoration:none; font-weight:bold;'>Se connecter</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='background-color:#0f5132; padding:20px; text-align:center; font-size:12px; color:#cccccc;'>© 2026 LET'S GO — Tous droits réservés</td>
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
		        'From' => 'do-not-reply@letsgo.fr',
		        'Reply-To' => "do-not-reply@letsgo.fr",
		        'X-Mailer' => 'PHP/' . phpversion()
        	);
    
            $to_admin = "malak.el-mokretar@alumni.univ-avignon.fr";
	        $subject_admin = "LET'S GO - BIENVENUE";
	        $message_admin = "
                <!DOCTYPE html>
                <html lang='fr'>
                    <head>
                        <meta charset='UTF-8'>
                        <title>Nouvelle demande admin</title>
                    </head>

                    <body style='margin:0; padding:0; background-color:#d1e7dd; font-family:Arial, sans-serif;'>

                        <table width='100%' cellpadding='0' cellspacing='0' border='0' bgcolor='#d1e7dd'>
                            <tr>
                                <td align='center'>
                                    <table width='600' cellpadding='0' cellspacing='0' border='0' style='background:#ffffff; margin:40px 0; border-radius:12px; overflow:hidden;'>
                                        <tr>
                                            <td style='background-color:#198754; padding:20px; text-align:center;'>
                                                <h1 style='color:#ffffff; margin:0; font-size:26px; font-family:Georgia, serif;'>LET'S GO - ADMIN</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding:35px 30px;'>
                                                <h2 style='color:#dc3545; margin-bottom:20px; text-align:center;'>Demande sensible</h2>
                                                <p style='color:#333333; font-size:15px; line-height:1.6;'>Un utilisateur a tenté de créer un <strong>compte administrateur</strong>.</p>
                                                <p style='color:#555555; font-size:14px; line-height:1.6;'>Cette action nécessite une vérification manuelle.</p>
                                                <table width='100%' cellpadding='10' cellspacing='0' style='margin-top:20px; background-color:#f8f9fa; border-radius:8px;'>
                                                    <tr>
                                                        <td style='font-size:14px; color:#333;'>
                                                            <strong>Nom :</strong> ".$nom."
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style='font-size:14px; color:#333;'>
                                                            <strong>Prénom :</strong> ".$prenom."
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style='font-size:14px; color:#333;'>
                                                            <strong>Email :</strong> ".$mail."
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table cellpadding='0' cellspacing='0' border='0' align='center' style='margin-top:30px;'>
                                                    <tr>
                                                        <td align='center' bgcolor='#198754' style='border-radius:6px;'>
                                                            <a href='https://pedago.univ-avignon.fr/~uapv2601797/admin/control/connexion.php' style='display:inline-block; padding:12px 25px; color:#ffffff; text-decoration:none; font-weight:bold;'>Accéder à l'administration</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <p style='color:#999999; font-size:12px; margin-top:30px; text-align:center;'>Vérifiez attentivement cette demande avant validation.</p>
                                                </td>
                                        </tr>
                                        <tr>
                                            <td style='background-color:#0f5132; padding:15px; text-align:center; font-size:12px; color:#cccccc;'>Notification automatique — LET'S GO</td>
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
                'From' => 'do-not-reply@letsgo.fr',
                'Reply-To' => "do-not-reply@letsgo.fr",
                'X-Mailer' => 'PHP/' . phpversion()
	        );
    
            if ($success){
                echo "Votre compte a bien été créé. Un e-mail de confirmation vous a été envoyé à l'adresse : ".$mail." . Nos administrateurs vérifieront votre compte très bientôt.</p>";
                mail($to_conf, $subject_conf, $message_conf, $headers_conf);
                mail($to_admin, $subject_admin, $message_admin, $headers_admin);
                echo "<a href='" . $racine_path . "control/connexion.php' class='btn btn-primary mt-3'>Se connecter</a>";
            } else {
                echo "<p>Erreur inscription.</p>";
            }
        }
    }
} else {
    echo "<p>Erreur requête </p>";
}

include($racine_path . "view/base/footer.php");
?>