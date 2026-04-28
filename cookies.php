<?php

define('COOKIE_DUREE', time() + 60); // 1 min pour les tests sinon 1h 3600
define('COOKIE_CHEMIN', '/~uapv2501798/');

function enregistrerConsentement(bool $preferences, bool $statistiques): void {
    setcookie('cookie_preferences',  $preferences  ? '1' : '0', COOKIE_DUREE, COOKIE_CHEMIN);
    setcookie('cookie_statistiques', $statistiques ? '1' : '0', COOKIE_DUREE, COOKIE_CHEMIN);
}

function consentementDonne(): bool {
    return isset($_COOKIE['cookie_preferences']) && isset($_COOKIE['cookie_statistiques']);
}

function cookieAccepte(string $type): bool {
    return ($_COOKIE[$type] ?? '0') === '1';
}

function supprimerConsentement(): void {
    setcookie('cookie_preferences',  '', time() - 3600, COOKIE_CHEMIN);
    setcookie('cookie_statistiques', '', time() - 3600, COOKIE_CHEMIN);
}


function creerCookieSession(int $userId): void {
    setcookie('user_session', $userId, COOKIE_DUREE, COOKIE_CHEMIN);
}

function getSessionUtilisateur(): ?int {
    return isset($_COOKIE['user_session']) ? (int)$_COOKIE['user_session'] : null;
}

function supprimerSession(): void {
    setcookie('user_session', '', time() - 3600, COOKIE_CHEMIN);
}