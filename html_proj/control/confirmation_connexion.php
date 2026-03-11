<?php
	$racine_path = '../';
	$titre = "Bon retour parmi nous !";
	/*view*/ include($racine_path."view/header.php");
	?>
	<p>La connexion a bien fonctionné, retrouvez 
			<a href="<?php echo $racine_path; ?>control/profil.php"> vos informations ici </a>
	</p>
	<?php
	/*view*/ include($racine_path."view/footer.php");

?>