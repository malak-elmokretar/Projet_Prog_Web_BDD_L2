<div class="container mt-5 d-flex flex-column align-items-center text-center">
  <form action="<?php echo $action; ?>" method="<?php echo $method; ?>" enctype="multipart/form-data">

    <div class="mb-3">
<input type="hidden" name="csrf_token" value="<?php echo genererTokenCsrf(); ?>">    </div>

    <div class="mb-3">
      <label for="nom" class="form-label">Nom de la destination</label>
      <input type="text" class="form-control" id="nom" name="nom" required >
    </div>

    <div class="mb-3">
      <label for="descr" class="form-label">Description courte :</label>
      <input type="text" class="form-control" id="descr" name="descr" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description longue :</label>
      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label for="fort" class="form-label">Point fort :</label>
      <input type="text" class="form-control" id="fort" name="fort" required>
    </div>

    <div class="mb-3">
      <label for="img" class="form-label">Image (nom du fichier) :</label>
      <input type="text" class="form-control" id="img" name="img" placeholder="ex: paris.jpg">
    </div>

    <button type="submit" class="btn btn-primary">Créer la destination</button>
  </form>
</div>