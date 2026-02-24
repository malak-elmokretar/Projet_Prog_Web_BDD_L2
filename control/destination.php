<?php
$racine_path = '../';
$titre = 'Les destinations';
include($racine_path."view/header.php");

echo '<main>';

// Tableau des destinations
$destinations = [
    [
        'id' => 1,
        'nom' => 'Paris',
        'descr' => 'Ville des lumières',
        'fort' => 'Tour Eiffel',
        'img' => 'paris.jpg',
    ],
    [
        'id' => 2,
        'nom' => 'New York',
        'descr' => 'The Big Apple',
        'fort' => 'Manhattan',
        'img' => 'newYork.jpg',
    ],
    [
        'id' => 3,
        'nom' => 'Rome',
        'descr' => 'La città eterna',
        'fort' => 'Colisée',
        'img' => 'rome.jpg',
    ]
];

// Boucle pour afficher chaque destination
foreach ($destinations as $destination) {
    $nom_dest = $destination['nom'];
    $description_courte_dest = $destination['descr'];
    $image_dest = $destination['img'];
    $fort_dest = $destination['fort'];
    include($racine_path."view/carte_destination.php");
}

echo '</main>';
include($racine_path."view/footer.php");
?>
