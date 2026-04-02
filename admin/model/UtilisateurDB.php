<?php

class UtilisateurDB implements UtilisateurDBInterface {
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

    $instr=$pdo->prepare("SELECT * FROM webutilisateur");
    $instr->execute();
    $destinations = $instr->fetchAll(PDO::FETCH_ASSOC);
    function inscription($id_user, $nom, $prenom, $dateNaiss, $role, $login, $mdp){
        $requete = $pdo->prepare("INSERT INTO webutilisateur (nom, prenom, dateNaiss, role, login, mdp) VALUES (:")
    }
}

?>