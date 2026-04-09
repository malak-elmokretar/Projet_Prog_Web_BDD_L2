<?php
	use model\Connect;
    use model\DestinationDB;

    $racine_path = '../';

    require_once __DIR__ . '/../admin/model/Connect.php';
    require_once __DIR__ . '/../admin/model/DestinationDB.php';


    $connect = new Connect();
    $db = $connect->getConn();
    $destinationModel = new DestinationDB($db);

    $destinations = $destinationModel->getAllDestinations();

	$titre = 'Les destinations';
    /*view*/ include($racine_path."view/header.php");


    echo '<main>';
    echo '<div class="container"><div class="row">';

    foreach ($destinations as $destination) {
        $nom_dest        = $destination->getNom();
        $description_courte_dest = $destination->getDescr();
        $image_dest      = $destination->getImg();
        $fort_dest       = $destination->getFort();
        include($racine_path."view/carte_destination.php");
    }

    echo '</div></div>';
    echo '</main>';
    /*view*/ include($racine_path."view/footer.php");
?>