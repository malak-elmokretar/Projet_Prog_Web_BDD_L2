<?php
	$racine_path = '../';
	$titre = 'Les animaux';
	/*view*/ include($racine_path."view/front/header.php");
	
	echo '<main>';
	
	// récupérer les animaux dans la base de donnée : $animaux (nom, descption courte, id, lien image)
	// Dans un for pour chaque animal : $animal:
		$id = 1;
		$lien_image_animal = "";
		$nom_animal = "Lion";
		$description_courte_animal = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>" ;
		$lien_fiche_animal = $racine_path."control/animal.php?id=$id";
	
		/*view*/ include($racine_path."view/front/carte_animal.php");
	
	echo '</main>';
	
	/*view*/ include($racine_path."view/front/footer.php");

?>