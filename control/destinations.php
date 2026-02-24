<?php
	$racine_path = '../';
	$titre = 'Les destinations';
	/*view*/ include($racine_path."view/header.php");
	
	echo '<main>';
	
	// (( récupérer les destinations dans la base de donnée : $animaux (nom, descption courte, id, lien image) ))
	// Dans un for pour chaque destinations : $destination:
	//--> en attendant données dans un tableau
	$destinations=[
		[
			'id' => 1,
			'nom' => 'Paris',
			'descr'=> 'ville des lumières',
			'fort' =>'Tour eiffel' ,
			'img' => 'paris.jpg',
		],

		[
			'id' => 2,
			'nom' => 'New York',
			'descr'=> 'The big apple',
			'fort' => 'Manhattan' ,
			'img' =>'newYork.jpg',
		],

		[
			'id' => 3,
			'nom' => 'Rome',
			'descr'=> 'La città eterna',
			'fort' => 'Colisée' ,
			'img' =>'rome.jpg',
		]
	];

	foreach ($destinations as $destination) {
    $nom_dest = $destination['nom'];
    $description_courte_dest = $destination['descr'];
    $image_dest = $destination['img'];
    $fort_dest = $destination['fort'];
    include($racine_path."view/carte_destination.php");
}

echo '</div>';
echo '</div>';
echo '</main>';
/*view*/ include($racine_path."view/footer.php");

?>