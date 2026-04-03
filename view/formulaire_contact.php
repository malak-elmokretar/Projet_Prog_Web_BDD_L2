<div class="container mt-4">
	<form action="<?php echo "$action"; ?>" method="<?php echo "$method"; ?>" class="mx-auto">
		<div class="mb-3">
			<label for="name" class="form-label">Nom</label>	
			<input type="text" class="form-control" id="name" name="name" required>	
		</div>
	
		<div class="mb-3">
			<label for="mail" class="form-label">Adresse Mail</label>	
			<input type="email"class="form-control" id="mail" name="mail" required>	
		</div>

		<div class="form-floating mb-3">
			<label for="message" class="form-label">Message :</label>
			<textarea class="form-control long_texte" id="message" required></textarea>
			<label for="floatingTextarea2">Message</label>
		</div>

		<div class="d-grid">
			<button type="submit" class="btn btn-primary">Envoyer</button>	
		</div>
	</form>
</div>