<?php
$racine_path = '../../';
require_once $racine_path . 'cookies.php';

$action = $_POST['action'] ?? '';

if ($action === 'tout_accepter') {
    enregistrerConsentement(true, true);

} elseif ($action === 'tout_refuser') {
    enregistrerConsentement(false, false);

} elseif ($action === 'choisir') {
    $preferences  = isset($_POST['preferences']);   // true si case cochée
    $statistiques = isset($_POST['statistiques']);  // true si case cochée
    enregistrerConsentement($preferences, $statistiques);
}

// Retour à la page précédente
$retour = $_SERVER['HTTP_REFERER'] ?? $racine_path . 'index.php';
header('Location: ' . $retour);
exit;