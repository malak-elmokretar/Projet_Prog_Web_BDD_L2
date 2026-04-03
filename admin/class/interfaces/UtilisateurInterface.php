<?php
namespace class\interfaces;
 
interface UtilisateurInterface {
    public function getIdUtilisateur();
    public function getNom();
    public function getPrenom();
    public function getMail();
    public function getMdp();
    public function getDateNaissance();
    public function getRoleA();
 
    public function setNom($nom);
    public function setPrenom($prenom);
    public function setMail($mail);
    public function setMdp($mdp);
    public function setDateNaissance($date);
    public function setRoleA($role_a);
 
    public function afficherHTML();
}
?>
 