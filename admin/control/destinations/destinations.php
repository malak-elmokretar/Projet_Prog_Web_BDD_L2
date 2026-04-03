<?php
    $racine_path = '../../';
    $titre = 'Les destinations';

    require_once __DIR__ . '/../../model/Connect.php';
    require_once __DIR__ . '/../../model/DestinationDB.php';
    require_once __DIR__ . '/../../class/Destination.php';

    //use model\Connect;
    //use model\DestinationDB;


    $connect = new \model\Connect();
    $db = $connect->getConn();
    $destinationModel = new \model\DestinationDB($db);

    $destinations = $destinationModel->getAllDestinations();

    include($racine_path."view/base/header.php");

    echo '<main>';
    echo '<div class="container"><div class="row">';

    echo ("<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>Nom de la destination</th>
                    <th scope='col'></th>
                </tr>
            </thead>
            <tbody class='table-group-divider'>");

    foreach ($destinations as $destination) {
        if (empty($destinations)) {
            echo "Pas de destination";
        } else {
            foreach ($destinations as $destination) {
                echo $destination->afficherHTML();
            }
        }
    }

    echo '</tbody></table></div></div>';
    echo '</main>';

    include($racine_path."view/base/footer.php");
?>