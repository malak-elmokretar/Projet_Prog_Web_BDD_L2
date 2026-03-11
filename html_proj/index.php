<?php
$titre = "Let's go"; 
$racine_path = './';

		
/*view*/  include('./view/header.php');


$main = "<p>retrouvez ici différentes destinations pour votre prochain voyage ! </p>
            <p>Que vous cherchiez un voyage en famille, entre ami, que vous soyez nombreux ou seuls, nous avons la solution ! </p>"; 
$pageariane = "Let's go, votre agence de voyage préférée ";
/*view*/  include($racine_path.'view/main.php');


/*view*/  include($racine_path.'view/footer.php');?>
