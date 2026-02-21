<!DOCTYPE html>
<html>
	<head>
		<title> Accueil de mon Front Office </title>
		
		<!-- lien CDN pour un framework CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<!-- insérer son propre CSS -->
		<link rel="stylesheet" href="<?php echo $racine_path."templates/css/template.css"; ?>">
	</head>
	
	
	<body class="d-flex flex-column min-vh-100">
	
	<header>
		<h1> <?php echo $titre; ?> </h1>
		<?php include("menu.php"); ?>
		<div class="container" style="margin-right: 220px;">
	</div>
	</header>