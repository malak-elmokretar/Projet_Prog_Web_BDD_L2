<?php
    session_start();
    require_once $racine . 'cookies.php';
    require_once $racine . 'csrf.php';
    $userId = $_SESSION['user_id'] ?? null;
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $titre; ?></title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="<?php echo $racine.'./view/CSS/template.css'?>">	
    </head>
    
    <body class="d-flex flex-column min-vh-100">

    <?php include($racine . 'view/bandeau_cookies.php'); ?>
    
    <header class="menuhead">
        <div class="d-flex align-items-center w-100">
            <a href="<?php echo $racine_path.'index.php'; ?>">
                <img src="<?php echo $racine_path.'./view/images/logo.png'; ?>" alt="Logo" class="logo img-fluid me-3">
            </a>
            <h1 class="text-center flex-grow-1 mb-0 titre"><?php echo $titre; ?></h1>
            
            <!-- <div class="ms-auto d-flex align-items-center gap-2">
                <?php if ($userId): ?>
                    <span class="text-white">Connecté</span>
                    <a href="<?php echo $racine_path; ?>control/deconnexion.php" class="btn btn-outline-light btn-sm">
                        Se déconnecter
                    </a>
                <?php else: ?>
                    <a href="<?php echo $racine_path; ?>control/connexion.php" class="btn btn-outline-light btn-sm">
                        Se connecter
                    </a>
                <?php endif; ?>
            </div> -->

            <?php include("menu.php"); ?>
        </div>
    </header>