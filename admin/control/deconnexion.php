<?php
    session_start();
    session_destroy();
    header('Location: ../control/connexion.php');
    exit;
?>