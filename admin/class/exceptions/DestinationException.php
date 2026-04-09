<?php 

namespace exceptions;

class DestinationException extends Exception {
    public function __construct($message, $code) {
        parent::__construct("DestinationException ->", $message, $code);
    }
}

?>