<?php
class Destination {
    function afficherDest($racine_path){
        //gerer la connection avec pdo
        $instr=$pdo->prepare("SELECT nom, descr, img, fort, FROM destinations";)
        $instr->execute();
        $destinations = $instr->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($destinations as $dest){
            $nom_dest=$dest['nom'];
            $description_courte_dest=$dest['descr'];
            $image_dest=$dest['img'];
            $fort_dest=$dest['fort'];
        }
    include ($racine_path. "view/carte_destination.php");    
    }

}

?>