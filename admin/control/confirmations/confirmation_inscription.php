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
    $userModel = new UtilisateurDB($db);

    $titre = "Inscription";
    include($racine_path . "view/base/header.php"); // démarre la session

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!verifierTokenCsrf($_POST['csrf_token'] ?? '')) {
            echo '<div class="alert alert-danger" role="alert">TOKEN INCORRECT</div>';
        } else {
            supprimerTokenCsrf();

            $nom           = $_POST['nom']           ?? '';
            $prenom        = $_POST['prenom']        ?? '';
            $mail          = $_POST['mail']          ?? '';
            $mdp           = $_POST['mdp']           ?? '';
            $date_naissance = $_POST['date_naissance'] ?? '';

            $utilisateur = new Utilisateur(1, $nom, $prenom, $mail, $mdp, $date_naissance, 0);
            $success = $userModel->inscription($utilisateur);

            $to_conf = $mail;
            $subject_conf = "LET'S GO - BIENVENUE";
            $message_conf = "
                <!DOCTYPE html>
                <html lang='fr'>
                    <head><meta charset='UTF-8'><title>Bienvenue LET'S GO</title></head>
                    <body style='margin:0; padding:0; background-color:#d1e7dd; font-family:Arial, sans-serif;'>
                        <table width='100%' cellpadding='0' cellspacing='0' border='0' bgcolor='#d1e7dd'>
                            <tr><td align='center'>
                                <table width='600' cellpadding='0' cellspacing='0' border='0' style='background:#ffffff; margin:40px 0; border-radius:12px; overflow:hidden;'>
                                    <tr><td style='background-color:#198754; padding:20px; text-align:center;'>
                                        <h1 style='color:#ffffff; margin:0; font-size:28px; font-family:Georgia, serif;'>LET'S GO</h1>
                                    </td></tr>
                                    <tr><td style='padding:40px 30px; text-align:center;'>
                                        <h2 style='color:#198754; margin-bottom:20px;'>Bienvenue à bord !</h2>
                                        <p style='color:#333333; font-size:16px; line-height:1.6;'>Cher(e) <strong>".$nom." ".$prenom."</strong>,</p>
                                        <p style='color:#555555; font-size:15px; line-height:1.6;'>Toute l'équipe de <strong>LET'S GO</strong> est ravie de vous accueillir.</p>
                                        <p style='color:#555555; font-size:15px; line-height:1.6;'>Votre compte a bien été créé et sera validé très prochainement par nos administrateurs.</p>
                                        <table cellpadding='0' cellspacing='0' border='0' align='center' style='margin-top:30px;'>
                                            <tr><td align='center' bgcolor='#66c2a5' style='border-radius:6px;'>
                                                <a href='https://pedago.univ-avignon.fr/~uapv2601797/admin/control/connexion.php' style='display:inline-block; padding:12px 25px; color:#ffffff; text-decoration:none; font-weight:bold;'>Se connecter</a>
                                            </td></tr>
                                        </table>
                                    </td></tr>
                                    <tr><td style='background-color:#0f5132; padding:20px; text-align:center; font-size:12px; color:#cccccc;'>© 2026 LET'S GO — Tous droits réservés</td></tr>
                                </table>
                            </td></tr>
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
            $subject_admin = "LET'S GO - NOUVELLE INSCRIPTION";
            $message_admin = "
                <!DOCTYPE html>
                <html lang='fr'>
                    <head><meta charset='UTF-8'><title>Nouvelle demande admin</title></head>
                    <body style='margin:0; padding:0; background-color:#d1e7dd; font-family:Arial, sans-serif;'>
                        <table width='100%' cellpadding='0' cellspacing='0' border='0' bgcolor='#d1e7dd'>
                            <tr><td align='center'>
                                <table width='600' cellpadding='0' cellspacing='0' border='0' style='background:#ffffff; margin:40px 0; border-radius:12px; overflow:hidden;'>
                                    <tr><td style='background-color:#198754; padding:20px; text-align:center;'>
                                        <h1 style='color:#ffffff; margin:0; font-size:26px; font-family:Georgia, serif;'>LET'S GO - ADMIN</h1>
                                    </td></tr>
                                    <tr><td style='padding:35px 30px;'>
                                        <h2 style='color:#dc3545; margin-bottom:20px; text-align:center;'>Demande sensible</h2>
                                        <p style='color:#333333; font-size:15px; line-height:1.6;'>Un utilisateur a tenté de créer un <strong>compte administrateur</strong>.</p>
                                        <table width='100%' cellpadding='10' cellspacing='0' style='margin-top:20px; background-color:#f8f9fa; border-radius:8px;'>
                                            <tr><td style='font-size:14px; color:#333;'><strong>Nom :</strong> ".$nom."</td></tr>
                                            <tr><td style='font-size:14px; color:#333;'><strong>Prénom :</strong> ".$prenom."</td></tr>
                                            <tr><td style='font-size:14px; color:#333;'><strong>Email :</strong> ".$mail."</td></tr>
                                        </table>
                                        <table cellpadding='0' cellspacing='0' border='0' align='center' style='margin-top:30px;'>
                                            <tr><td align='center' bgcolor='#198754' style='border-radius:6px;'>
                                                <a href='https://pedago.univ-avignon.fr/~uapv2601797/admin/control/connexion.php' style='display:inline-block; padding:12px 25px; color:#ffffff; text-decoration:none; font-weight:bold;'>Accéder à l'administration</a>
                                            </td></tr>
                                        </table>
                                    </td></tr>
                                    <tr><td style='background-color:#0f5132; padding:15px; text-align:center; font-size:12px; color:#cccccc;'>Notification automatique — LET'S GO</td></tr>
                                </table>
                            </td></tr>
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

            if ($success) {
                echo "<p>Votre compte a bien été créé. Un e-mail de confirmation vous a été envoyé à : ".$mail."</p>";
                mail($to_conf, $subject_conf, $message_conf, $headers_conf);
                mail($to_admin, $subject_admin, $message_admin, $headers_admin);
                echo "<a href='" . $racine_path . "control/connexion.php' class='btn btn-primary mt-3'>Se connecter</a>";
            } else {
                echo "<p>Erreur inscription.</p>";
            }
        }
    } else {
        echo "<p>Erreur requête.</p>";
    }

    include($racine_path . "view/base/footer.php");
?>