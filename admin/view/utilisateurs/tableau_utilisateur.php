<tr>
  <td><?php echo $nom_user." ".$prenom_user;?></td>
  <td><?php echo $mail;?></td>
  <td><?php echo ($role == 1) ? "Administrateur" : "Client";?></td>
  <td><a href="<?php echo $racine_path.'./control/utilisateurs/utilisateur.php?id='.$id_user;?>" class="btn btn-primary mb-2">Modifier</a></td>
  <td><a href="<?php echo $racine_path.'./control/confirmations/confirmation_supp.php';?>" class="btn btn-danger mb-2">Supprimer</a></td>
</tr>