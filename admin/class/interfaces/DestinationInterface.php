<?php 
namespace model;
interface DestinationInterface{
        public function getIdDest();
        public function getNom();
        public function getDescr();
        public function getDescription();
        public function getFort();
        public function getImg();
        public function setNom($nom);
        public function setDescr($descr);
        public function setDescription($description);
        public function setFort($fort);
        public function setImg($img);
        public function afficherHTML();

}

?>