<div class="container mt-4">
	<form action="<?php echo "$action"; ?>" method="<?php echo "$method"; ?>" class="mx-auto">
	
	<div class="mb-3">
		<label for="mail" class="form-label">Adresse Mail</label>	
		<input type="email"class="form-control" id="mail" name="mail" required>	
	</div>
	
	<div class="d-grid">
		<button type="submit" class="btn btn-primary"> Envoyer </button>	
	</div>
	</form>
</div>