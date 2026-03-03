<?php
$racine_path = "../../";
include("liste_utilisateurs.php");

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;


$utilisateur_trouve = null;
foreach ($utilisateurs as $utilisateur) {
    if ($utilisateur["id"] === $id) {
        $utilisateur_trouve = $utilisateur;
        break;
    }
}

$nom_user = $utilisateur_trouve["nom"];
$prenom_user = $utilisateur_trouve["prenom"];
$date_naiss = $utilisateur_trouve["date_naissance"];
$mail= $utilisateur_trouve["mail"];
$mdp = $utilisateur_trouve["mdp"];
$role = $utilisateur_trouve["role_a"];


$titre = "Modification de ".$nom_user." ".$prenom_user." (".$mail.")";

$action = $racine_path."control/confirmations/confirmation_modif.php";
$method = "POST";


/*view*/ include($racine_path."view/base/header.php");

echo "<main>";
/*view*/ include($racine_path."view/utilisateurs/modif_utilisateur.php");
echo "</main>";

/*view*/ include($racine_path."view/base/footer.php");
?>
