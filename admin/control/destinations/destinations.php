<?php
    $racine_path = '../../';
    $racine = '../../../';
    $titre = 'Les destinations';

    require_once $racine_path . 'model/Connect.php';
    require_once $racine_path . 'model/DestinationDB.php';
    require_once $racine_path . 'class/Destination.php';

    include($racine_path."view/base/header.php"); // démarre la session

    if (!isset($_SESSION['user_id'])) {
        echo "<p>Vous devez être connecté pour accéder à cette page. <a href='../../control/connexion.php'>Se connecter</a></p>";
        include($racine_path."view/base/footer.php");
        exit;
    }

    $connect = new \model\Connect();
    $db = $connect->getConn();
    $destinationModel = new \model\DestinationDB($db);
    $destinations = $destinationModel->getAllDestinations();

    echo '<main>';
    echo "<a href='".$racine_path."control/destinations/creation_destination.php' class='btn btn-outline-dark mt-3'>Ajouter une destination</a>";
    echo "<a href='".$racine_path."control/tdb.php' class='btn btn-outline-dark mt-3'>Retourner au tableau de bord</a>";
    echo '<div class="container"><div class="row">';
    echo "<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>Nom de la destination</th>
                    <th scope='col'></th>
                </tr>
            </thead>
            <tbody class='table-group-divider'>";

    foreach ($destinations as $destination) {
        echo $destination->afficherHTML();
    }

    echo '</tbody></table></div></div>';
    echo '</main>';

    include($racine_path."view/base/footer.php");
?>