<?php
spl_autoload_register(function ($class) use ($racine_path) {
    $class = str_replace('destBd\\', '', $class);
    
    $paths = [
        $racine_path . 'admin/class/' . $class . '.php',
        $racine_path . 'admin/model/' . $class . '.php',
        $racine_path . 'admin/class/interfaces/' . $class . '.php',
        $racine_path . 'admin/model/interfaces/' . $class . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});