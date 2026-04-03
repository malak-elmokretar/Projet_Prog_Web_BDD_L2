<?php
namespace class;
require_once __DIR__ . '/interfaces/UtilisateurInterface.php';

class Utilisateur implements UtilisateurInterface {

    public $id_utilisateur;
    public $nom;
    public $prenom;
    public $mail;
    public $mdp;
    public $date_naissance;
    public $role_a;


    function __construct($id_utilisateur, $nom, $prenom, $mail, $mdp, $date_naissance, $role_a = 0) {
        $this->id_utilisateur = $id_utilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->mdp = $mdp;
        $this->date_naissance = $date_naissance;
        $this->role_a = $role_a;
    }

    function __destruct() {
        // echo "<p>Suppression de l'utilisateur $this->nom $this->prenom</p>";
    }

    function __toString() {
        return "$this->nom $this->prenom";
    }

    function __debugInfo() {
        return ["identite" => "$this->nom $this->prenom"];
    }

    function __get($name) {
        if (isset($this->$name)) {
            return $this->$name;
        }
        echo "$name n'existe pas";
    }

    function __set($name, $val) {
        if (isset($this->$name)) {
            $this->$name = $val;
        } else {
            echo "$name n'existe pas"; 
        }
    }

    function getIdUtilisateur(){ 
        return $this->id_utilisateur; 
    }
    function getNom(){
         return $this->nom;
    }
    function getPrenom(){ 
        return $this->prenom; 
    }
    function getMail(){ 
        return $this->mail; 
    }
    function getMdp(){ 
        return $this->mdp; 
    }
    function getDateNaissance(){ 
        return $this->date_naissance; 
    }
    function getRoleA(){ 
        return $this->role_a; 
    }

    function setNom($nom){ 
        $this->nom = $nom; 
    }    
    function setPrenom($prenom){ 
        $this->prenom = $prenom; 
    }
    function setMail($mail){
        $this->mail = $mail; 
    } 
    function setMdp($mdp){ 
        $this->mdp = $mdp;
    }
    function setDateNaissance($date){ 
        $this->date_naissance = $date; 
    }
    function setRoleA($role_a){ 
        $this->role_a = $role_a; 
    }

    function afficherHTML() {
        $role = ($this->role_a == 1) ? "Administrateur" : "Client";
        return "
        <tr>
            <td>{$this->nom} {$this->prenom}</td>
            <td>{$this->mail}</td>
            <td>{$role}</td>
            <td>
                <a href='utilisateur.php?id={$this->id_utilisateur}' class='btn btn-primary'>Modifier</a>
                <a href='../confirmations/confirmation_supp_user.php?id={$this->id_utilisateur}' class='btn btn-danger'>Supprimer</a>
            </td>
        </tr>
        ";
    }
}
?>