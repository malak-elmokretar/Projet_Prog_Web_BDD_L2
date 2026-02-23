<?php
$titre = "Let's go"; 
$racine_path = './';
?>
		
<?php /*view*/  include('./view/header.php');?>

<?php 
$main = "<p>retrouvez ici des destinations !! </p>"; 
$pageariane = 'Votre agence de voyage préférée ';
/*view*/  include($racine_path.'view/main.php');

?>

<?php /*view*/  include($racine_path.'view/footer.php');?>
