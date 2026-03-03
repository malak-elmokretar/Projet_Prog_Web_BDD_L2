<?php
	$racine_path = '../';
	$titre = 'Les destinations';
	/*view*/ include($racine_path."view/header.php");
	
	echo '<main>';
	echo '<div class="container"><div class="row">';

	// (( récupérer les destinations dans la base de donnée : $animaux (nom, descption courte, id, lien image) ))
	// Dans un for pour chaque destinations : $destination:
	//--> en attendant données dans un tableau
	$destinations=[
		[
			'id' => 1,
			'nom' => 'Paris',
			'descr'=> 'ville des lumières',
			'description' => '<p>Paris est la captiale de la france, est accessible en train ou en avion... </p>
							<p> Il y a de nombreux musées et batiments a visiter </p>',
			'fort' =>'Tour eiffel' ,
			'img' => 'paris.jpg',
		],

		[
			'id' => 2,
			'nom' => 'New York',
			'descr'=> 'The big apple',
			'description' => '<p>New York est une grande ville des USA , elle est accessible en train ou en avion... </p>
							<p> Il y a de nombreux musées et batiments a visiter </p>',
			'fort' => 'Manhattan' ,
			'img' =>'newYork.jpg',
		],

		[
			'id' => 3,
			'nom' => 'Rome',
			'descr'=> 'La città eterna',
			'description' => '<p>Rome est la captiale de l Italie, est accessible en train ou en avion... </p>
							<p> Il y a de nombreux musées et batiments a visiter </p>',
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

echo '</div></div>';
echo '</main>';
/*view*/ include($racine_path."view/footer.php");

?>