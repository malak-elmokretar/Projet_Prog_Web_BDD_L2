<?php
namespace model;

class Connect{
    private $conn;
    public function __construct(){
        $servername = "localhost";
        $username = "uapv2601797"; //login
        $password = "zQw8Sn"; //mon mdp
        //"postgresql";
        $port = 5432;

        try{
	        $this->conn = new \PDO("pgsql:host=$servername;port=$port;dbname=etd", $username, $password);
	        //echo "connecté";
        }catch(\PDOException $e){
	        echo 'PDOException : '.$e->getMessage();
        }
    }
        public function getConn() {
        return $this->conn;
    }

}
?>