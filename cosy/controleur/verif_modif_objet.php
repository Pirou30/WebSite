<?php
  require ('modele/gestion_capteur.php');
//modifie l'objet dans la base de donnée
  modif_objet($db);
//redirection vers la page des objets
  echo '<meta http-equiv="refresh" content="1; index.php?page=objet" >';

?>
