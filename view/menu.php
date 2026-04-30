<nav class="menu ms-auto">
        <div class="d-flex flex-column p-3">
        <a class="navbar-brand mb-2" href="<?php echo $racine_path.'index.php'; ?>">Accueil</a>
        <a class="navbar-brand mb-2" href="<?php echo $racine_path.'control/destinations.php'; ?>">Les destinations</a>
        <a class="navbar-brand mb-2" href="<?php echo $racine_path.'control/contact.php'; ?>">Contact</a>
        <?php if ($userId): ?>
                <span class="text-white">Connecté</span>
                <a class="navbar-brand mb-3" href="<?php echo $racine_path.'control/profil.php';?>">Profil</a>
                <a class="navbar-brand mb-3" href="<?php echo $racine_path.'control/deconnexion.php';?>">Déconnexion</a>
        <?php else: ?>
                <a class="navbar-brand mb-3" href="<?php echo $racine_path.'control/inscription.php';?>">Inscription</a>
                <a class="navbar-brand mb-3" href="<?php echo $racine_path.'control/connexion.php';?>">Connexion</a>
        <?php endif; ?>
 </div>
</nav>
