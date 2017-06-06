<?php
  require ('modele/gestion_type.php');
//supprime l'objet séléctionné
  suppr_cle($db);
//reedirection vers la page objt
  echo '<meta http-equiv="refresh" content="1; index.php?page=cle" >';
?>
