<?php
//namespace Model;
class Connect{
    private $conn;
    public function __construct(){
        
        $servername = "postgresql";
        $username = "uapv2601797";
        $password = "ELk@q7@i8Et$6X"; //mon mdp
        //"postgresql";
        $port = 5432;

        try{
	        $conn = new PDO("pgsql:host=$servername;port=$port;dbname=etd", $username, $password);
	        echo "Connecté";
        } catch(PDOException $e) {
	        echo 'PDOException : '.$e->getMessage();
        }
    }
}
?>