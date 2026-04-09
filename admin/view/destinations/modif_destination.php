<div class="container mt-5 d-flex flex-column align-items-center text-center">
  <form action="<?php echo $action;?>" method="<?php echo $method;?>" enctype="multipart/form-data">
    
    <input type="hidden" name="id" value="<?php echo $id;?>">

    <div class="mb-3">
      <label for="nom" class="form-label">Nom de la destination</label>
      <input type="text" class="form-control" id="nom" name="nom" required value="<?php echo htmlspecialchars($nom_dest);?>">
    </div>

    <div class="mb-3">
      <label for="descr" class="form-label">Description courte :</label>
      <input type="text" class="form-control" id="descr" name="descr" required value="<?php echo htmlspecialchars($descr);?>"> 
    </div>
  
    <div class="mb-3">
      <label for="description" class="form-label">Description longue :</label>
      <input type="text" class="form-control" id="description" name="description" required value="<?php echo htmlspecialchars($description);?>"> 
    </div>

    <div class="mb-3">
      <label for="fort" class="form-label">Point fort :</label>
      <input type="text" class="form-control" id="fort" name="fort" required value="<?php echo htmlspecialchars($fort);?>"> 
    </div>
  
    <div class="mb-3">
      <label for="img" class="form-label">Image (nom du fichier) :</label>
      <input type="text" class="form-control" id="img" name="img" value="<?php echo $img; ?>">
    </div>
  
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
  </form>
</div>