<?php
  require ('modele/gestion_capteur.php');
//supprime l'objet séléctionné
  suppr_objet($db);
//reedirection vers la page objt
  echo '<meta http-equiv="refresh" content="1; index.php?page=objet" >';
?>
