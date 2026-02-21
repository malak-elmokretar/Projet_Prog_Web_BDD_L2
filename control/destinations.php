<?php
	$racine_path = '../';
	$titre = 'Les destinations';
	/*view*/ include($racine_path."view/header.php");
	
	echo '<main>';
	
	// récupérer les destinations dans la base de donnée : $animaux (nom, descption courte, id, lien image)
	// Dans un for pour chaque animal : $animal:
		$id = 1;
		$lien_image_dest = "";
		$nom_dest = "Paris";
		$description_courte_dest = "<p> desrciption Paris </p>" ;
		$lien_fiche_dest = $racine_path."control/destination.php?id=$id";
	
		/*view*/ include($racine_path."view/carte_destination.php");
	
	echo '</main>';
	
	/*view*/ include($racine_path."view/footer.php");

?>