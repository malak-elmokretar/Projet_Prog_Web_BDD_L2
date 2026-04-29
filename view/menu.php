<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="menu ms-auto">
    <div class="d-flex flex-column p-3">

        <a class="navbar-brand mb-2" href="<?= $racine_path ?>">Accueil</a>
        <a class="navbar-brand mb-2" href="<?= $racine_path ?>control/destinations.php">Les destinations</a>
        <a class="navbar-brand mb-2" href="<?= $racine_path ?>control/contact.php">Contact</a>

        <?= isset($_SESSION['id'])
            ? '<a class="navbar-brand mb-3" href="'.$racine_path.'control/utilisateurs/profil.php">Profil</a>
               <a class="navbar-brand mb-3" href="'.$racine_path.'control/deconnexion.php">Déconnexion</a>'
            : '<a class="navbar-brand mb-3" href="'.$racine_path.'control/inscription.php">Inscription</a>
               <a class="navbar-brand mb-3" href="'.$racine_path.'control/connexion.php">Connexion</a>'
        ?>

        <a class="navbar-brand mb-2" href="<?= $racine_path ?>control/mentionslegales.php">Mentions légales</a>

    </div>
</nav>