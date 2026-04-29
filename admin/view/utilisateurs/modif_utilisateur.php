<div class="container mt-5 d-flex flex-column align-items-center text-center">

  <form action="<?php echo $action; ?>" method="<?php echo $method; ?>">

    <input type="hidden" name="id" value="<?php echo $utilisateur->getIdUtilisateur(); ?>">

    <div class="mb-3">
			<input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    </div>

    <div class="mb-3">
      <label for="nom" class="form-label">Nom :</label>
      <input type="text" class="form-control" id="nom" name="nom"
             value="<?php echo htmlspecialchars($utilisateur->getNom()); ?>"
             minlength="2" maxlength="50" required>
    </div>

    <div class="mb-3">
      <label for="prenom" class="form-label">Prénom :</label>
      <input type="text" class="form-control" id="prenom" name="prenom"
             value="<?php echo htmlspecialchars($utilisateur->getPrenom()); ?>"
             minlength="2" maxlength="50" required>
    </div>

    <div class="mb-3">
      <label for="date_naissance" class="form-label">Date de naissance :</label>
      <input type="date" class="form-control" id="date_naissance" name="date_naissance"
             value="<?php echo $utilisateur->getDateNaissance(); ?>" required>
    </div>

    <div class="mb-3">
      <label for="mail" class="form-label">Adresse e-mail :</label>
      <div class="input-group">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" id="mail" name="mail"
               value="<?php echo htmlspecialchars($utilisateur->getMail()); ?>"
               minlength="3" maxlength="50" required>
      </div>
    </div>

    <div class="mb-3">
      <label for="mdp" class="form-label">Mot de passe :</label>
      <input type="password" class="form-control" id="mdp" name="mdp" minlength="2" maxlength="50">
    </div>

    <div class="form-check mb-3">
      <input type="radio" name="role_a" id="role_client" value="0"
             <?php echo ($utilisateur->getRoleA() == 0) ? "checked" : ""; ?>>
      <label class="form-label" for="role_client">Client</label>
      &nbsp;
      <input type="radio" name="role_a" id="role_admin" value="1"
             <?php echo ($utilisateur->getRoleA() == 1) ? "checked" : ""; ?>>
      <label class="form-label" for="role_admin">Administrateur</label>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
  </form>
</div>