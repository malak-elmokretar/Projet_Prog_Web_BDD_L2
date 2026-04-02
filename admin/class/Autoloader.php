<?php

class Autoloader {
    
    public static function enregistrer(){
        spl_autoload_register(array("Autoloader", "autoload"));
    }

    public static function autoload($nom_classe){
        $paths = [
            "class/",
            "interface/"
        ];

        foreach ($paths as $path) {
            $file = $path.$nom_classe.".php";
        }

        if (file_exists($file)) {
            require_once $file;
        }
    }

}

?>