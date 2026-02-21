<?php
	$racine_path = '../';
	
	//  récuperer l'id de la destination via le get
	// récupérer toutes les infos de la destination dans la base de données : $dest
	$nom_dest = "Paris";
	$image_dest = "";
	$decription_dest= "<p>Paris, capitale de la france </p>
				<p>point fort : tour eiffel</p>"; 

	$titre = $nom_dest;
	/*view*/ include($racine_path."view/header.php");
	
	echo '<main>';
	
	/*view*/ include($racine_path."view/fiche_destination.php");
	
	echo '</main>';
	
	/*view*/ include($racine_path."view/footer.php");

?>