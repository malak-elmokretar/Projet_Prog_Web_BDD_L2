<?php 

class UtilisateurException extends Exception {
    public function __construct($message, $code) {
        parent::__construct("UtilisateurException ->", $message, $code);
    }
}

//  Exceptions à faire :
// lors de l'inscription, si la date de naissance > date du jour
// ou si la personne qui s'inscrit a moins de 18 ans
// Si l'e-mail existe déjà


?>