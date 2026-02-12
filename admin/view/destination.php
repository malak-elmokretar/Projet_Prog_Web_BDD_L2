<?php
    $title = "Destinations";
    require_once "head.php";
?>

<h1>Nos destinations</h1>
<div>
    <div class='row row-cols-1 row-cols-md-2 g-4'>
        <div class="col">
        <?php
            // À FAIRE : une fois l'accès à la BDD fait, créer une requête SQL telle que "SELECT COUNT(id_destination) FROM destination;" dont on stockera le résultat dans la variable $nb_destination
            // À FAIRE : $nom_destination = "SELECT nom FROM destination;"
            //if ($nb_destination) {
            // À FAIRE : une fois l'accès à la BDD fait, remplacer 9 par $nb_destination
            /*for ($i = 0; $i < 10; $i++){
            echo "<div class='card'>";
                echo "<img src='...' class='card-img-top' alt='...'>";
                echo "<div class='card-body'>"; 
                    echo "<h5 class='card-title'>Card title</h5>"; 
                     echo "<p class='card-text'>This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>"; 
                echo "</div>"; 
            echo "</div>"; */
             
            
            for ($i = 0; $i < 10; $i++) {
                echo "<div class='col'>";
                    echo "<div class='card h-100'>";
                        echo "<img src='...' class='card-img-top' alt='Destination'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Destination n°" . ($i + 1) . "</h5>";
                            echo "<p class='card-text'>
                                    This is a longer card with supporting text below as a natural lead-in
                                    to additional content.
                                  </p>";
                            echo "<a href='#' class='btn btn-primary me-2'>Modifier</a>";
                            echo "<button type='button' class='btn btn-danger'>Supprimer</button>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
            
            
            /*for ($i = 0; $i <= 10; $i++){
                echo "<div class='card' style='width: 18rem;'>";
                    echo "<img src='...' class='card-img-top' alt='...'>";
                    echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>Destination n°$i</h5>";
                        //echo "<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card’s content.</p>";
                        echo "<a href='#' class='btn btn-primary'>Modifier la destination</a>";
                        echo "<button type='button' class='btn btn-danger'>Supprimer la destination</button>";
                    echo "</div>";
                echo "</div>";*/
                    /*echo "<p>Destination n°$i</p>";
                    echo "</br>";
                    echo "<img src='https://share.google/images/eEvianpase5jyXOUq'></br>";
                    echo "<p><a href='#' class='link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Modifier la destination</a></p>";
                    echo "<p><a href='#' class='link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Danger link</a></p>";
                    echo "</br>";
                   // echo $nom_destination;
                echo "</div>";*/
            //}
        /*
        } else {
            echo "<div class='alert alert-danger' role='alert'> Oups il n'existe aucune destination. </div>";
        }
        */
    ?>
    </div>
    </div>
    <button><a href='#'>Créer une destination</a></button>
</div>
<?php require_once "footer.html"; ?>