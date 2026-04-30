<?php
namespace model;
require_once __DIR__ . '/interfaces/DestinationInterface.php';

/**
 * Destination
 *
 * Représente une destination avec ses informations principales.
 *
 * @package model
 */
class Destination implements DestinationInterface{    
    /**
     * id_destination
     *
     * @var mixed
     */
    public $id_destination;    
    /**
     * nom
     *
     * @var mixed
     */
    public $nom;    
    /**
     * descr
     *
     * @var mixed
     */
    public $descr;    
    /**
     * description
     *
     * @var mixed
     */
    public $description;    
    /**
     * fort
     *
     * @var mixed
     */
    public $fort;    
    /**
     * img
     *
     * @var mixed
     */
    public $img;

    
    /**
     * __construct
     * le constructeur permet d'initialiser les attributs
     *
     * @param  mixed $id_destination
     * @param  mixed $nom
     * @param  mixed $descr
     * @param  mixed $description
     * @param  mixed $fort
     * @param  mixed $img
     * @return void
     */
    function __construct($id_destination, $nom, $descr, $description, $fort, $img){
        $this->id_destination = $id_destination;
        $this->nom = $nom;
        $this->descr = $descr;
        $this->description = $description;
        $this->fort = $fort;
        $this->img = $img;
    }

    /**
     * __destruct
     *s'exécute soit :                          soit
     * lors de l'appel de la méthode unset()    à la fin du fichier    
     * 
     * @return void
     */
    function __destruct(){
        //echo "<p>Suppression de la destination $this->nom</p>";
    } 
     
    /**
     * __toString
     *
     * @return string
     */
    function __toString(){
        return "$this->nom $this->descr";
    }

    /**
     * __debugInfo
     *
     * @return array
     */
    function __debugInfo(){
        return ["destination" => "$this->nom"];
    }
    
    /**
     * __get
     *
     * @param  mixed $name
     * @return $this->name ou string
     */
    function __get($name){
		if(isset($this->$name)){
			return $this->$name;
		}
		else{
			echo "$name n'existe pas";
		}
	}
    
    /**
     * getIdDest
     *
     * @return $this->id_destination
     */
    public function getIdDest(){
        return $this->id_destination;
    }   

    /**
     * getNom
     *
     * @return $this->nom
     */
    public function getNom(){
        return $this->nom;
    }
        
    /**
     * getDescr
     *
     * @return $this->descr
     */
    public function getDescr(){
        return $this->descr;
    }
        
    /**
     * getDescription
     *
     * @return $this->description
     */
    public function getDescription(){
        return $this->description;
    }    
    /**
     * getFort
     *
     * @return $this->fort
     */
    public function getFort(){
        return $this->fort;
    }

        
    /**
     * getImg
     *
     * @return $this->img
     */
    public function getImg(){
        return $this->img;
    }
    
    /**
     * __set
     *
     * @param  mixed $name
     * @param  mixed $val
     * @return void
     */
    function __set($name, $val){
		if(isset($this->$name)){
			$this->$name=$val;
		}
		else{
			echo " $name n'existe pas";
		}
	}
    
    /**
     * setNom
     *
     * @param  mixed $nom
     * @return nom
     */
    public function setNom($nom){
        $this->nom=$nom;
    }
        
    /**
     * setDescr
     *
     * @param  mixed $descr
     * @return void
     */
    public function setDescr($descr){
        $this->descr=$descr;
    }
        
    /**
     * setDescription
     *
     * @param  mixed $description
     * @return this->description
     */
    public function setDescription($description){
        $this->description=$description;
    }
        
    /**
     * setFort
     *
     * @param  mixed $fort
     * @return void
     */
    public function setFort($fort){
        $this->fort=$fort;
    }    
    /**
     * setImg
     *
     * @param  mixed $img
     * @return void
     */
    public function setImg($img){
        $this->img=$img;
    }
    
    /**
     * afficherHTML
     * Permet d'afficher les destinations dans control/destinations.php
     * @return void
     */
    public function afficherHTML(){
    return "
        <tr>
            <td>{$this->nom}</td>
            <td>{$this->descr}</td>
            <td>
                <a href='destination.php?id={$this->id_destination}' class='btn btn-primary'>Modifier</a>
                <a href='../confirmations/confirmation_supp_destination.php?id={$this->id_destination}' class='btn btn-danger'>Supprimer</a>
            </td>
        </tr>
    ";
}

}

?> 