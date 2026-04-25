<?php
namespace model;
require_once __DIR__ . '/interfaces/DestinationDBInterface.php';
require_once __DIR__ . '/../class/interfaces/DestinationInterface.php';
require_once __DIR__ . '/../class/Destination.php';

class DestinationDB implements DestinationBDInterface{
    private $db;
    function __construct($db){
        $this->db=$db; 
    }
    /* function afficherDest($racine_path){
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
    */
    function getDestById(int $id){
        $req="SELECT * FROM webdestination WHERE id_destination =:id";
        $stmt=$this->db->prepare($req);       
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row=$stmt->fetch(\PDO::FETCH_ASSOC);
        if($row){
            return new Destination(
                $row['id_destination'],
                $row['nom'],
                $row['descr'],
                $row['description'],
                $row['fort'],
                $row['img']
            );
        }
        return null;
    }
    
    function afficherDest(int $id){
        $destination = $this->getDestById($id);
        if ($destination === null) {
            echo "Destination non trouvée.";
            return;
        }
    $nom_dest = $destination->getNom();
    $img = $destination->getImg();
    $description = $destination->getDescription();

        global $racine_path;
        include($racine_path . "view/fiche_destination.php");
    }

     function getAllDestinations(){
        $stmt = $this->db->query("SELECT * FROM webdestination");
        $destinations = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $destinations[] = new Destination(
                $row['id_destination'],
                $row['nom'],
                $row['descr'],
                $row['description'],
                $row['fort'],
                $row['img']
            );
        }
        return $destinations;
    }


    function ajoutDest(Destination $destination){
        $req="INSERT INTO webdestination (nom, descr, description, fort, img) VALUES
        (:nom, :descr, :description, :fort, :img)";
        $stmt=$this->db->prepare($req);
        $stmt->bindValue(':nom', $destination->getNom());
        $stmt->bindValue(':descr',$destination->getDescr()); 
        $stmt->bindValue(':description', $destination->getDescription()); 
        $stmt->bindValue(':fort',$destination->getFort());
        $stmt->bindValue(':img',  $destination->getImg());
        return $stmt->execute();
    }

        function modifDest(Destination $destination) {
        $req = "UPDATE webdestination SET nom = :nom, descr = :descr, description = :description, fort = :fort, img = :img
                WHERE id_destination = :id";
        $stmt = $this->db->prepare($req);
        $stmt->bindValue(':id', $destination->getIdDest());
        $stmt->bindValue(':nom', $destination->getNom());
        $stmt->bindValue(':descr', $destination->getDescr());
        $stmt->bindValue(':description', $destination->getDescription());
        $stmt->bindValue(':fort', $destination->getFort());
        $stmt->bindValue(':img', $destination->getImg());
        return $stmt->execute();
        }

    function supprimerDest(int $id) {
    $sql = "DELETE FROM webdestination WHERE id_destination = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $result = $stmt->execute();
    //var_dump($result);
    //var_dump($stmt->errorInfo());
    //var_dump($stmt->rowCount());
    return $result;
    }    

}

?>