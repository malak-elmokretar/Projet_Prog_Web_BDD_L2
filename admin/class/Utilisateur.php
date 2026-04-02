<?php

require_once "/class/Autoloader.php";
Autoloader::enregistrer();

namespace class;

class Utilisateur implements UtilisateurInterface{
    $id_user;
    $nom;
    $prenom;
    $dateNaiss;
    $role;
    $login;
    $mdp;


    //  le constructeur permet d'initialiser les attributs
    function __construct($id_user, $nom, $prenom, $dateNaiss, $role=1, $login, $mdp){
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaiss = $dateNaiss;
        $this->role = $role;
        $this->login = $login;
        $this->mdp = $mdp; 
    }

    // destructeur
    //  s'exécute soit :                        soit : 
    // lors de l'appel de la méthode unset()    à la fin du fichier
    function __destruct(){
        echo "<p>Suppression de l'utilisateur-ice $this->nom $this->prenom</p>";
    } 

    // méthode magique:
    // _toString()
    // echo
    // retourne string
    function _toString(){
        return "$this->nom $this->prenom";
    }

    //var_dump
    // return array
    function __debugInfo(){
        return ["identite" => "$this->nom $this->prenom"];
    }

    function __get($name){
        echo "$name n'existe pas"; 
    }

    function __set($name, $val){
        echo "$name n'existe pas"
    }
}

?>