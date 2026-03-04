<div class="container mt-5 d-flex flex-column align-items-center text-center">

  <form action="<?php echo $action;?>" method="<?php echo $method;?>">
    
    <div class="mb-3">
      <label for="nomUser" class="form-label">Nom :</label>
      <input type="text" class="form-control" id="nomUser" minlength="2" maxlength="50">
    </div>

    <div class="mb-3">
      <label for="prenomUser" class="form-label">Prénom :</label>
      <input type="text" class="form-control" id="prenomUser" minlength="2" maxlength="50">
    </div>
  
    <div class="mb-3">
      <label for="date_naissance" class="form-label">Date de naissance :</label>
      <input type="date" class="form-control" id="date_naissance"> 
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Adresse e-mail :</label>
      <div class="input-group">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="mail" class="form-control" id ="email" minlength="3" maxlength="50">
      </div>
    </div>
  
    <div class="mb-3">
      <label for="mdp" class="form-label">Mot de passe :</label>
      <input type="password" class="form-control" id="mdp" minlength="12" maxlength="50">
      <p> Pour des raisons de sécurité, votre mot de passe doit contenir au moins 12 caractères</p> 
    </div>

    <button type="submit" class="btn btn-primary">S'inscrire</button>
  </form>
</div>