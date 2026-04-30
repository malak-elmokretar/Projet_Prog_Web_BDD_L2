<?php
namespace model;
require_once __DIR__ . '/interfaces/UtilisateurInterface.php';

/**
 * Utilisateur
 * Représente une destination
 * @package model
 */
class Utilisateur implements UtilisateurInterface {
    
    /**
     * id_utilisateur
     *
     * @var mixed
     */
    public $id_utilisateur;    
    /**
     * nom
     *
     * @var mixed
     */
    public $nom;    
    /**
     * prenom
     *
     * @var mixed
     */
    public $prenom;    
    /**
     * mail
     *
     * @var mixed
     */
    public $mail;    
    /**
     * mdp
     *
     * @var mixed
     */
    public $mdp;    
    /**
     * date_naissance
     *
     * @var mixed
     */
    public $date_naissance;    
    /**
     * role_a
     *
     * @var mixed
     */
    public $role_a;

    
    /**
     * __construct
     *
     * @param  mixed $id_utilisateur
     * @param  mixed $nom
     * @param  mixed $prenom
     * @param  mixed $mail
     * @param  mixed $mdp
     * @param  mixed $date_naissance
     * @param  mixed $role_a
     * @return void
     */
    function __construct($id_utilisateur, $nom, $prenom, $mail, $mdp, $date_naissance, $role_a = 0) {
        $this->id_utilisateur = $id_utilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->mdp = $mdp;
        $this->date_naissance = $date_naissance;
        $this->role_a = $role_a;
    }
    
    /**
     * __destruct
     *
     * @return void
     */
    function __destruct() {
        //echo "<p>Suppression de l'utilisateur $this->nom $this->prenom</p>";
    }
    
    /**
     * __toString
     *
     * @return void
     */
    function __toString() {
        return "$this->nom $this->prenom";
    }
    
    /**
     * __debugInfo
     *
     * @return void
     */
    function __debugInfo() {
        return ["identite" => "$this->nom $this->prenom"];
    }
    
    /**
     * __get
     *
     * @param  mixed $name
     * @return void
     */
    function __get($name) {
        if (isset($this->$name)) {
            return $this->$name;
        }
        echo "$name n'existe pas";
    }
    
    /**
     * __set
     *
     * @param  mixed $name
     * @param  mixed $val
     * @return void
     */
    function __set($name, $val) {
        if (isset($this->$name)) {
            $this->$name = $val;
        } else {
            echo "$name n'existe pas"; 
        }
    }
    
    /**
     * getIdUtilisateur
     *
     * @return void
     */
    function getIdUtilisateur(){ 
        return $this->id_utilisateur; 
    }    
    /**
     * getNom
     *
     * @return void
     */
    function getNom(){
         return $this->nom;
    }    
    /**
     * getPrenom
     *
     * @return void
     */
    function getPrenom(){ 
        return $this->prenom; 
    }    
    /**
     * getMail
     *
     * @return void
     */
    function getMail(){ 
        return $this->mail; 
    }    
    /**
     * getMdp
     *
     * @return void
     */
    function getMdp(){ 
        return $this->mdp; 
    }    
    /**
     * getDateNaissance
     *
     * @return void
     */
    function getDateNaissance(){ 
        return $this->date_naissance; 
    }    
    /**
     * getRoleA
     *
     * @return void
     */
    function getRoleA(){ 
        return $this->role_a; 
    }
    
    /**
     * setNom
     *
     * @param  mixed $nom
     * @return void
     */
    function setNom($nom){ 
        $this->nom = $nom; 
    }        
    /**
     * setPrenom
     *
     * @param  mixed $prenom
     * @return void
     */
    function setPrenom($prenom){ 
        $this->prenom = $prenom; 
    }    
    /**
     * setMail
     *
     * @param  mixed $mail
     * @return void
     */
    function setMail($mail){
        $this->mail = $mail; 
    }     
    /**
     * setMdp
     *
     * @param  mixed $mdp
     * @return void
     */
    function setMdp($mdp){ 
        $this->mdp = $mdp;
    }    
    /**
     * setDateNaissance
     *
     * @param  mixed $date
     * @return void
     */
    function setDateNaissance($date){ 
        $this->date_naissance = $date; 
    }    
    /**
     * setRoleA
     *
     * @param  mixed $role_a
     * @return void
     */
    function setRoleA($role_a){ 
        $this->role_a = $role_a; 
    }
    
    /**
     * afficherHTML
     * Affiche les utilisateurs dans control/utilisateurs
     * @return void
     */
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