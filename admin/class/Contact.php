<?php

class Contact implements ContactInterface{
    $id_contact;
    $nom;
    $mail;
    $message;
    $date;
    public function __construct($id_contact, $nom, $mail, $message, $date) {
        $this->id_contact = $id_contact;
        $this->nom = $nom;
        $this->mail =$mail;
        $this->message = $message;
        $this->date = $date;
    }

    function __destruct(){
        "Suppression du message de $this->nom ($this->mail) datant du $this->date";
    }

    function _toString(){
        return "Message de $this->nom ($this->mail) : </br> $this->message </br> le : $this->date";
    }
}

?>