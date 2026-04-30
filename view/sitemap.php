<section class="section-box mx-auto mb-5">
        <h2>Sitemap</h2>

        <ul>
    <li><a href="<?php echo $racine_path.'index.php';?>">Accueil</a></li>

    <li>Destinations
        <ul>
            <li><a href="<?php echo $racine_path.'control/destinations.php';?>">Toutes les destinations</a></li>
            <li><a href="<?php echo $racine_path.'control/destination.php?id=1';?>">Détail destination</a></li>
        </ul>
    </li>

    <li>Gestion du profil
        <ul>
            <li><a href="<?php echo $racine_path.'control/inscription.php';?>">Inscription</a></li>
            <li><a href="<?php echo $racine_path.'control/connexion.php';?>">Connexion</a></li>
            <li><a href="<?php echo $racine_path.'control/profil.php';?>">Profil (nécessite d'être connecté)</a></li>
        </ul>
    </li>

    <li>Mentions légales et contact
        <ul>
            <li><a href="<?php echo $racine_path.'control/mentionslegales.php';?>">Mentions légales</a></li>
            <li><a href="<?php echo $racine_path.'control/contact.php';?>">Contact</a></li>
        </ul>
    </li>
</ul>