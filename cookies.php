<?php

// 1 minute pour les tests (remettre 30 * 24 * 60 * 60 en production)
define('COOKIE_DUREE', time() + 60);

define('COOKIE_CHEMIN', '/~uapv2501798/');


// ---------------------------------------------------
// Enregistre les choix de l'utilisateur
// Les fonctionnels sont toujours vrais (obligatoires)
// $preferences et $statistiques = true ou false
// ---------------------------------------------------
function enregistrerConsentement(bool $preferences, bool $statistiques): void {
    $choix = json_encode([
        'fonctionnel'  => true,
        'preferences'  => $preferences,
        'statistiques' => $statistiques,
    ]);
    setcookie('consent', $choix, COOKIE_DUREE, COOKIE_CHEMIN);
}

// ---------------------------------------------------
// Vérifie si l'utilisateur a déjà fait son choix
// ---------------------------------------------------
function consentementDonne(): bool {
    return isset($_COOKIE['consent']);
}

// ---------------------------------------------------
// Retourne les choix sous forme de tableau
// ---------------------------------------------------
function getConsentement(): array {
    if (!isset($_COOKIE['consent'])) {
        return [
            'fonctionnel'  => true,
            'preferences'  => false,
            'statistiques' => false,
        ];
    }
    return json_decode($_COOKIE['consent'], true);
}

// ---------------------------------------------------
// Vérifie si un type précis est accepté
// $type = 'fonctionnel' | 'preferences' | 'statistiques'
// ---------------------------------------------------
function cookieAccepte(string $type): bool {
    $consentement = getConsentement();
    return $consentement[$type] ?? false;
}


// ---------------------------------------------------
// Crée le cookie de session après connexion
// ---------------------------------------------------
function creerCookieSession(int $userId): void {
    setcookie('user_session', $userId, COOKIE_DUREE, COOKIE_CHEMIN);
}

// ---------------------------------------------------
// Retourne l'id de l'utilisateur connecté, ou null
// ---------------------------------------------------
function getSessionUtilisateur(): ?int {
    return isset($_COOKIE['user_session']) ? (int)$_COOKIE['user_session'] : null;
}

// ---------------------------------------------------
// Supprime le cookie de session (déconnexion)
// ---------------------------------------------------
function supprimerSession(): void {
    setcookie('user_session', '', time() - 3600, COOKIE_CHEMIN);
}