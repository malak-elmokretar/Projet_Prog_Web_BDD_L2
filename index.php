<?php
$titre = 'Accueil'; 
$racine_path = './';
?>
		
<?php /*view*/  include('./view/header.php');?>

<?php 
$main = "<p>retrouvez ici des destinations !! </p>"; 
$pageariane = 'Accueil';
/*view*/  include($racine_path.'view/main.php');

?>

<?php /*view*/  include($racine_path.'view/footer.php');?>
