<?php
$racine_path = '../';
include('liste.php');

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
$description= $destination_trouvee['description'];
$titre = $nom_dest;

/*view*/ include($racine_path."view/header.php");

echo '<main>';
/*view*/ include($racine_path."view/fiche_destination.php");
echo '</main>';

/*view*/ include($racine_path."view/footer.php");
?>
