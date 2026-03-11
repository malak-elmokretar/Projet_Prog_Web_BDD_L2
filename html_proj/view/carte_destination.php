<div class="col-lg-6 col-xl-5 mb-4">
    <div class="card h-100 carte">
        <img src="../view/images/<?php echo $image_dest; ?>" class="card-img-top" alt="<?php echo $nom_dest; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $nom_dest; ?></h5>
            <p class="card-text"><?php echo $description_courte_dest; ?></p>
            <p class="card-text"><strong>Point fort : </strong><?php echo $fort_dest; ?></p>
<a href="../control/destination.php?id=<?php echo $destination['id']; ?>" class="btn btn-primary">Voir plus</a>        </div>
    </div>
</div>