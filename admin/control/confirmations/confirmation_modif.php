<?php
	$racine_path = '../../';
	$titre = "Modification effectuée !";
	/*view*/ include($racine_path."view/base/header.php");
	
	echo "<p>La modification n'est pas encore disponible pour le moment mais elle sera bientôt effective.</p>";
	echo "<div class='mt-5 d-flex flex-column align-items-center text-center'>";
		echo "<a href='".$racine_path."'./control/destinations/destinations.php' class='btn btn-dark mt-3 me-2'>Voir les destinations</a>";
		echo "<p>OU</p><a href='".$racine_path."'./control/utilisateurs/utilisateurs.php' class=''btn btn-dark mt-3'>Voir les utilisateurs</a>";
	echo "</div>";
	/*view*/ include($racine_path."view/base/footer.php");

?>