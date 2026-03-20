<?php

class Destination implements DestinationInterface{
    $id_destination;
    $nom;
    $descr;
    $description;
    $fort;
    $img;


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

    function __get($name){
        echo "$name n'existe pas"; 
    }

    function __set($name, $val){
        echo "$name n'existe pas"
    }

    function afficher(){

    }
}

?> 