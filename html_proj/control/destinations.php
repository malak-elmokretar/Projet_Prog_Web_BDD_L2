<?php
	$racine_path = '../';
	$titre = 'Les destinations';
	/*view*/ include($racine_path."view/header.php");
	
	include('liste.php');
	echo '<main>';
	echo '<div class="container-fluid"><div class="row">';

	// (( récupérer les destinations dans la base de donnée (nom, descption courte, id, lien image) ))
	// Dans un for pour chaque destinations : $destination:
	//--> en attendant données dans un tableau


	foreach ($destinations as $destination) {
    $nom_dest = $destination['nom'];
    $description_courte_dest = $destination['descr'];
    $image_dest = $destination['img'];
    $fort_dest = $destination['fort'];
    include($racine_path."view/carte_destination.php");
}

echo '</div></div>';
echo '</main>';
/*view*/ include($racine_path."view/footer.php");

?>