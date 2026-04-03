<?php
/**
 * Autoloading des classes
 * 
 * Cette classe permet d'autoloader les fichiers des classes du projet 
 * lorsqu'elles sont instanciées.
 */
class Autoloader{
	
	
	 /**
     * Appel de spl_autoload_register
	 *
	 * @return null
     */
	public static function enregistrer(){
		spl_autoload_register(array('Autoloader', 'autoload'));
	}
	
	
	/**
     * Charge les fichiers des classes instanciées
	 *
	 * @param	nom de la classe à instancier
	 * @return 	null
     */
	public static function autoload($nom_class){
		$nom_class = str_replace("class\\", '', $nom_class);
		$nom_class = str_replace("\\", '/', $nom_class);
		
		var_dump($nom_class);

		 $paths = [
            'class/',
            'class/interfaces/'
        ];

        foreach ($paths as $path) {
            $file = $path.$nom_class.'.php';
            if (file_exists($file)) {
                require $file;
			}
		}	
	}
}

?>