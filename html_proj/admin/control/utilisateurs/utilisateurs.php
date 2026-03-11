<?php
	$racine_path = "../../";
	$titre = "Les utilisateurs";
	/*view*/ include($racine_path."view/base/header.php");
	
	echo "<main>";
	echo "<div class='container'><div class='row'>";

	// (( récupérer les utilisateurs dans la base de donnée : $animaux (nom, descption courte, id, lien image) ))
	// Dans un for pour chaque utilisateurs : $utilisateur:
	//--> en attendant données dans un tableau
	$utilisateurs=[
		[
			"id" => 1,
			"nom" => "DOE",
			"prenom" => "Jane",
			"date_naissance" => "1970-01-01",
			"mail"=> "jdoe@gmail.com",
			"mdp" => "",
			"role_a" => 0
		],

		[
			"id" => 2,
			"nom" => "ESTEBAN",
			"prenom" => "Jane",
			"date_naissance" => "1970-01-01",
			"mail"=> "thais@letsgo.com",
			"mdp" => "",
			"role_a" => 1
		],

		[
			"id" => 3,
			"nom" => "EL MOKRETAR",
			"prenom" => "Malak",
			"date_naissance" => "2005-05-25",
			"mail"=> "malak@letsgo.com",
			"mdp" => "",
			"role_a" => 1
		]
	];

    echo ("<table class='table'>
            <thead>
                <tr>
                    <th scope='col'>Nom et prénom</th>
                    <th scope='col'>Adresse e-mail</th>
                    <th scope='col'>Rôle</th>
                    <th scope='col'></th>
                </tr>
            </thead>
            <tbody class='table-group-divider'>");

	foreach ($utilisateurs as $utilisateur) {
        $id_user = $utilisateur["id"];
        $nom_user = $utilisateur["nom"];
        $prenom_user = $utilisateur["prenom"];
        $date_naiss = $utilisateur["date_naissance"];
        $mail = $utilisateur["mail"];
        $mdp = $utilisateur["mdp"];
        $role = $utilisateur["role_a"];
        include($racine_path."view/utilisateurs/tableau_utilisateur.php");
    }

    echo "</tbody></table></div></div>";
echo "</main>";
/*view*/ include($racine_path."view/base/footer.php");

?>