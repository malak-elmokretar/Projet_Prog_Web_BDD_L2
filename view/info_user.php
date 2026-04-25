<div class="container mt-5 d-flex flex-column align-items-center text-center">

  <form action="<?php echo $action; ?>" method="<?php echo $method; ?>">
    <input type="hidden" name="id" value="<?php echo $user->getIdUtilisateur(); ?>">

    <div class="mb-3">
      <label for="nomUser" class="form-label">Nom :</label>
      <input type="text" class="form-control" id="nomUser" name="nom" value="<?php echo htmlspecialchars($user->getNom()); ?>" required>
    </div>

    <div class="mb-3">
      <label for="prenomUser" class="form-label">Prénom :</label>
      <input type="text" class="form-control" id="prenomUser" name="prenom" value="<?php echo htmlspecialchars($user->getPrenom()); ?>" required>
    </div>

    <div class="mb-3">
      <label for="date_naissance" class="form-label">Date de naissance :</label>
      <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $user->getDateNaissance(); ?>" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Adresse e-mail :</label>
      <div class="input-group">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" id="email" name="mail" value="<?php echo htmlspecialchars($user->getMail()); ?>"  required>
      </div>
    </div>

    <div class="mb-3">
      <label for="mdp" class="form-label">Mot de passe :</label>
      <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Nouveau mot de passe (optionnel)">
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
  </form>

  <form action="<?php echo $racine_path.'control/confirmation_supp.php'; ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $user->getIdUtilisateur(); ?>">  
    <button type="submit" class="btn btn-danger mt-3">Supprimer mon compte</button>
  </form>

</div>
