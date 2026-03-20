<?php
    $racine_path = "../../";
    $titre = "Bon retour parmi nous !";
    /*view*/ include($racine_path."view/base/header.php");

	echo "<p>La connexion a bien fonctionné, retrouvez <a href='".$racine_path."control/utilisateurs/utilisateur.php?id=1.php'> vos informations ici </a></p>";

	/*view*/ include($racine_path."view/base/footer.php");

?>