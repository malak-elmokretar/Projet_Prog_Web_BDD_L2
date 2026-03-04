<!DOCTYPE html>
<html>
	<head>
		<title> Accueil </title>
		
		<!-- lien CDN pour un framework CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
		<link rel="stylesheet" href="<?php echo $racine_path.'./view/CSS/template.css'?>">	
	</head>
	
	
	<body class="d-flex flex-column min-vh-100">
	
	<header class="menuhead">
		<div class="d-flex align-items-center w-100">
			<img src="<?php echo $racine_path.'./view/images/logo.png';?>" alt="Logo" class="logo img-fluid me-3">
			<h1 class=" text-center flex-grow-1 mb-0 titre"><?php echo $titre; ?></h1>
			<?php include("menu.php"); ?>
		</div>
</header>