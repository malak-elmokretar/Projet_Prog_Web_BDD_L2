<?php

namespace exceptions\UtilisateurException;

class DateNaissanceException extends UtilisateurException {
    public function __construct($message, $code) {
        parent::__construct("DateNaissanceException ->", $message, $code);
    }
}

?>