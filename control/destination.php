<?php
$racine_path = '../';
$racine = '../';

$titre = "Destination";

require_once $racine_path . 'admin/model/Connect.php';   
require_once $racine_path . 'admin/model/DestinationDB.php';

use model\Connect;
use model\DestinationDB;

$connect = new Connect();
$db = $connect->getConn();

$destinationModel = new DestinationDB($db);
$id  = isset($_GET['id']) ? (int)$_GET['id'] : 0;


include($racine_path."view/header.php");

echo '<main>';
///*view*/ include($racine_path."view/fiche_destination.php");
$destinationModel->afficherDest($id);

echo '</main>';

/*view*/ include($racine_path."view/footer.php");
?>


