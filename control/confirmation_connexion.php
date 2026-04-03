<?php

    $racine_path = "../";
    $titre = "Bon retour parmi nous !";
    /*view*/ include($racine_path."view/header.php");

    echo "<p>La connexion a bien fonctionné, retrouvez <a href='".$racine_path."control/profil.php'> vos informations ici </a></p>";

    /*view*/ include($racine_path."view/footer.php");

?>