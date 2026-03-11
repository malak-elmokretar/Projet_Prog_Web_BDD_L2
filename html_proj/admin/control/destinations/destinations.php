<?php
	$racine_path = '../../';
	$titre = 'Les destinations';
	/*view*/ include($racine_path."view/base/header.php");
	
	echo '<main>';
	echo '<div class="container"><div class="row">';

	// (( récupérer les destinations dans la base de donnée : $animaux (nom, descption courte, id, lien image) ))
	// Dans un for pour chaque destinations : $destination:
	//--> en attendant données dans un tableau
	
	include('liste_destinations.php');

    echo ("<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>Nom de la destination</th>
                    <th scope='col'></th>
                </tr>
            </thead>
            <tbody class='table-group-divider'>");

	foreach ($destinations as $destination) {
        $id_dest = $destination["id"];
        $nom_dest = $destination['nom'];
        $description_courte_dest = $destination['descr'];
        $image_dest = $destination['img'];
        $fort_dest = $destination['fort'];
        include($racine_path."view/destinations/tableau_destination.php");
    }

    echo '</tbody></table></div></div>';
echo '</main>';
/*view*/ include($racine_path."view/base/footer.php");

?>