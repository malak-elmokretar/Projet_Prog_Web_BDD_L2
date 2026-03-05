<div class="container mt-5 d-flex flex-column align-items-center text-center">
  <form action="<?php echo $action;?>" method="<?php echo $method;?>">
   
    <div class="mb-3">
      <label for="email" class="form-label">Adresse e-mail :</label>
      <div class="input-group">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="mail" class="form-control" id ="email" maxlength="50" required>
      </div>
    </div>

    <div class="mb-3">
      <label for="mdp" class="form-label">Mot de passe :</label>
      <input type="password" class="form-control" id="mdp" minlength="12" maxlength="50">
      <br>
      <p><a href="<?php echo $racine_path.'control/mdp_oublie.php'; ?>">J'ai oublié mon mot de passe</a></p>
      <br>
      <p>Pas encore de compte ? <a href="<?php echo $racine_path.'control/inscription.php'; ?>">S'inscrire</a></p>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</a></button>
  </form>
</div>