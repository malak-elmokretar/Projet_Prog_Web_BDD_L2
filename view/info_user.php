<div class="container mt-5 d-flex flex-column align-items-center text-center">

  <form action="<?php echo $action;?>" method="<?php echo $method;?>">
    
    <div class="mb-3">
      <label for="nomUser" class="form-label">Nom :</label>
      <input type="text" class="form-control" id="nomUser" value="<?php echo "nom";?>" minlength="2" maxlength="50">
    </div>

    <div class="mb-3">
      <label for="prenomUser" class="form-label">Prénom :</label>
      <input type="text" class="form-control" id="prenomUser" value="<?php echo "prenom";?>" minlength="2" maxlength="50">
    </div>
  
    <div class="mb-3">
      <label for="date_naissance" class="form-label">Date de naissance :</label>
      <input type="date" class="form-control" id="date_naissance"> 
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Adresse e-mail :</label>
      <div class="input-group">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="mail" class="form-control" id ="email" value="<?php echo "mail@mail.mail";?>" minlength="3" maxlength="50">
      </div>
    </div>
  
    <div class="mb-3">
      <label for="mdp" class="form-label">Mot de passe :</label>
      <input type="password" class="form-control" id="mdp" value="<?php echo "motdepasse";?>" minlength="12" maxlength="50"> 
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    <button type="submit" class="btn btn-danger">Supprimer mon compte</button>

  </form>
</div>