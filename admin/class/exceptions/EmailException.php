<?php

namespace exceptions\UtilisateurException;

class EmailException extends UtilisateurException {
    public function __construct($message, $code) {
        parent::__construct("EmailException ->", $message, $code);
    }
}

?>