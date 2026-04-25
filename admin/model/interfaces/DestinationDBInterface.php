<?php 
namespace model;
    Interface DestinationBDInterface{
        function getDestById(int $id);
        function afficherDest(int $id);
        function getAllDestinations();
        function ajoutDest(Destination $destination);
        function modifDest(Destination $destination);
        function supprimerDest(int $id);

    }
?>    