<div class="container mt-4">
	<form action="<?php echo "$action"; ?>" method="<?php echo "$method"; ?>" class="mx-auto">
		
		<div class="mb-3">
			<input type="hidden" name="csrf_token" value="<?php echo genererTokenCsrf(); ?>">
    	</div>

		<div class="mb-3">
			<label for="name" class="form-label">Nom</label>	
			<input type="text" class="form-control" id="name" name="name" value="<?php echo $user->getNom();?>" disabled required>	
		</div>

		<div class="mb-3">
			<label for="prenom" class="form-label">Prénom</label>	
			<input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $user->getPrenom();?>" disabled required>	
		</div>

		<div class="mb-3">
			<label for="objet" class="form-label">Objet</label>	
			<input type="text" class="form-control" id="objet" name="objet" required>	
		</div>
	
		<div class="mb-3">
			<label for="mail" class="form-label">Adresse Mail</label>	
			<input type="email"class="form-control" id="mail" name="mail" value="<?php echo $user->getMail();?>" disabled required>	
		</div>
	
		<div class="form-floating mb-3">
			<label for="message" class="form-label">Message :</label>
			<textarea class="form-control long_texte" id="message" name="message" required></textarea>
		</div>
	
		<div class="d-grid">
			<button type="submit" class="btn btn-primary">Envoyer</button>	
		</div>
	</form>
</div>