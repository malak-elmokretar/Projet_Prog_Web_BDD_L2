<?php
namespace model;

require_once __DIR__ . '/interfaces/UtilisateurDBInterface.php';
require_once __DIR__ . '/../class/Utilisateur.php';

class UtilisateurDB implements UtilisateurDBInterface {

    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    function getDb() {
        return $this->db;
    }

    function getAllUtilisateurs() {
        $sql  = "SELECT * FROM webutilisateur ORDER BY nom, prenom";
        $stmt = $this->db->query($sql);
        $utilisateurs = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $utilisateurs[] = new Utilisateur(
                $row['id_utilisateur'],
                $row['nom'],
                $row['prenom'],
                $row['mail'],
                $row['mdp'],
                $row['date_naissance'],
                $row['role_a']
            );
        }
        return $utilisateurs;
    }

    function getUtilisateurById($id) {
        $sql  = "SELECT * FROM webutilisateur WHERE id_utilisateur = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row  = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }
        else{
        return new Utilisateur(
            $row['id_utilisateur'],
            $row['nom'],
            $row['prenom'],
            $row['mail'],
            $row['mdp'],
            $row['date_naissance'],
            $row['role_a']
        );
        }
    }

    function getUtilisateurByMail($mail) {
        $sql  = "SELECT * FROM webutilisateur WHERE mail = :mail";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':mail' => $mail]);
        $row  = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        else{
            return new Utilisateur(
                $row['id_utilisateur'],
                $row['nom'],
                $row['prenom'],
                $row['mail'],
                $row['mdp'],
                $row['date_naissance'],
                $row['role_a']
            );
        }
    }

    function inscription(Utilisateur $utilisateur) {
        $req = "INSERT INTO webutilisateur (nom, prenom, mail, mdp, date_naissance, role_a)
                VALUES (:nom, :prenom, :mail, :mdp, :date_naissance, :role_a)";

        $stmt = $this->db->prepare($req);
        $stmt->bindValue(':nom',$utilisateur->getNom());
        $stmt->bindValue(':prenom', $utilisateur->getPrenom());
        $stmt->bindValue(':mail',$utilisateur->getMail());
        $stmt->bindValue(':mdp', password_hash($utilisateur->getMdp(), PASSWORD_DEFAULT));
        $stmt->bindValue(':date_naissance',$utilisateur->getDateNaissance());
        $stmt->bindValue(':role_a',$utilisateur->getRoleA());
        return $stmt->execute();

    }

  function modifUtilisateur(Utilisateur $utilisateur) {
        $sql = "UPDATE webutilisateur
                SET nom = :nom,
                    prenom = :prenom,
                    mail = :mail,
                    date_naissance = :date_naissance,
                    role_a = :role_a
                WHERE id_utilisateur = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom'=> $utilisateur->getNom(),
            ':prenom'=> $utilisateur->getPrenom(),
            ':mail'=> $utilisateur->getMail(),
            ':date_naissance' => $utilisateur->getDateNaissance(),
            ':role_a'=> $utilisateur->getRoleA(),
            ':id'=> $utilisateur->getIdUtilisateur(),
        ]);
    }

    function supprimerUtilisateur($id) {
        $sql  = "DELETE FROM webutilisateur WHERE id_utilisateur = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    function verifierConnexion($mail, $mdp_saisi) {
        $utilisateur = $this->getUtilisateurByMail($mail);

        if ($utilisateur && password_verify($mdp_saisi, $utilisateur->getMdp())) {
            return $utilisateur;
        }
        return null;
    }

    function verifierConnexionA($mail, $mdp_saisi) {
        $utilisateur = $this->getUtilisateurByMail($mail);

        if ($utilisateur && password_verify($mdp_saisi, $utilisateur->getMdp())) {
            if($utilisateur->getRoleA()=='t'){
                return $utilisateur;
            }
            return null;
        }
        return null;
    }
}
?>