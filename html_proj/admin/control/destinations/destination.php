<?php
$racine_path = '../../';
include('liste_destinations.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;


$destination_trouvee = null;
foreach ($destinations as $destination) {
    if ($destination['id'] === $id) {
        $destination_trouvee = $destination;
        break;
    }
}

$nom_dest = $destination_trouvee['nom'];
$img = $destination_trouvee['img'];
$descr = $destination_trouvee["descr"];
$description= $destination_trouvee['description'];
$fort = $destination_trouvee["fort"];

$titre = "Modification de ".$nom_dest;

$action = $racine_path."control/confirmations/confirmation_modif.php";
$method = "POST";


/*view*/ include($racine_path."view/base/header.php");

echo '<main>';
/*view*/ include($racine_path."view/destinations/modif_destination.php");
echo '</main>';

/*view*/ include($racine_path."view/base/footer.php");
?>
