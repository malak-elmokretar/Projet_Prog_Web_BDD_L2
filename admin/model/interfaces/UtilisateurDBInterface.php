<?php
namespace model;
 
interface UtilisateurDBInterface {
    public function getDb();
    public function getAllUtilisateurs();
    public function getUtilisateurById($id);
    public function getUtilisateurByMail($mail);
    public function inscription(Utilisateur $utilisateur);
    public function modifUtilisateur(Utilisateur $utilisateur);
    public function supprimerUtilisateur($id);
    public function verifierConnexion($mail, $mdp_saisi);
}
?>
 