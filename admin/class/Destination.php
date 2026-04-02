<?php

require_once "/class/Autoloader.php";
Autoloader::enregistrer();
namespace class;

class Destination implements DestinationInterface{
    public $id_destination;
    public $nom;
    public $descr;
    public $description;
    public $fort;
    public $img;


    //  le constructeur permet d'initialiser les attributs
    function __construct($id_destination, $nom, $descr, $fort, $img){
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
        echo "<p>Suppression de la destination $this->nom</p>";
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
    //////// j'ai modifié les get et set 
    function __get($name, $val){
		if(isset($this->$name)){
			return $this->name;
		}
		else{
			echo "$name n'existe pas";
		}
	}

    public fonction getIdDest(){
        return $this->id_destination;
    }
    public fonction getNom(){
        return $this->nom;
    }
    public fonction getDescr(){
        return $this->descr;
    }
    public fonction getDescription(){
        return $this->description;
    }
    public fonction getFort(){
        return $this->fort;
    }
    public fonction getImg(){
        return $this->img;
    }

    function __set($name, $val){
		if(isset($this->$name)){
			$this->name=$val;
		}
		else{
			echo " $name n'existe pas";
		}
	}

    public fonction setNom($nom){
        $this->nom=$nom;
    }
    public fonction setDescr($descr){
        $this->descr=descr;
    }
    public fonction setDescription(){
        $this->description=description;
    }
    public fonction setFort($fort){
        $this->fort=fort;
    }
    public fonction setImg(){
        $this->img=img;
    }

}

?> 