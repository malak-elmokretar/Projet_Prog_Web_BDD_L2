<div class="container mt-5 d-flex flex-column align-items-center text-center">

  <form action="<?php echo $action;?>" method="<?php echo $method;?>">
    
    <div class="mb-3">
      <label for="NomDestination" class="form-label">Nom de la destination</label>
      <input type="text" class="form-control" id="NomDestination" value="<?php echo $nom_dest;?>">
    </div>

    <div class="mb-3">
      <label for="descr" class="form-label">Description courte :</label>
      <input type="text" class="form-control" id="descr" value="<?php echo $descr;?>"> 
    </div>
  
    <div class="mb-3">
      <label for="descr" class="form-label">Description longue :</label>
      <input type="text" class="form-control" id="description" value="<?php echo $description;?>"> 
    </div>

    <div class="mb-3">
      <label for="descr" class="form-label">Point fort :</label>
      <input type="text" class="form-control" id="fort" value="<?php echo $fort;?>"> 
    </div>
  
    <div class="input-group mb-3">
      <label class="form-label" for="img" accept="image/*">Image :</label>
      <input type="file" class="form-control" id="img">
    </div>
  
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
  </form>
</div>