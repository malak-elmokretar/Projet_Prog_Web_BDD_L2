<?php
namespace model;
require_once __DIR__ . '/interfaces/DestinationInterface.php';

class Destination implements DestinationInterface{
    public $id_destination;
    public $nom;
    public $descr;
    public $description;
    public $fort;
    public $img;


    //  le constructeur permet d'initialiser les attributs
    function __construct($id_destination, $nom, $descr, $description, $fort, $img){
        $this->id_destination = $id_destination;
        $this->nom = $nom;
        $this->descr = $descr;
        $this->description = $description;
        $this->fort = $fort;
        $this->img = $img;
    }

    // destructeur
    //  s'exécute soit :                        soit : 
    // lors de l'appel de la méthode unset()    à la fin du fichier
    function __destruct(){
        //echo "<p>Suppression de la destination $this->nom</p>";
    } 

    // méthode magique:
    // _toString()
    // echo
    // retourne string
    function __toString(){
        return "$this->nom $this->descr";
    }

    //var_dump
    // return array
    function __debugInfo(){
        return ["destination" => "$this->nom"];
    }

    ////////
    //////// jai modifié les get et set 
    function __get($name){
		if(isset($this->$name)){
			return $this->$name;
		}
		else{
			echo "$name n'existe pas";
		}
	}

    public function getIdDest(){
        return $this->id_destination;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getDescr(){
        return $this->descr;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getFort(){
        return $this->fort;
    }
    public function getImg(){
        return $this->img;
    }

    function __set($name, $val){
		if(isset($this->$name)){
			$this->$name=$val;
		}
		else{
			echo " $name n'existe pas";
		}
	}

    public function setNom($nom){
        $this->nom=$nom;
    }
    public function setDescr($descr){
        $this->descr=$descr;
    }
    public function setDescription($description){
        $this->description=$description;
    }
    public function setFort($fort){
        $this->fort=$fort;
    }
    public function setImg($img){
        $this->img=$img;
    }

    public function afficherHTML(){
    return "
        <tr>
            <td>{$this->nom}</td>
            <td>{$this->descr}</td>
            <td>
                <a href='destination.php?id={$this->id_destination}' class='btn btn-primary'>Modifier</a>
                <a href='../confirmations/confirmation_supp.php?id={$this->id_destination}' class='btn btn-danger'>Supprimer</a>
            </td>
        </tr>
    ";
}

}

?> 