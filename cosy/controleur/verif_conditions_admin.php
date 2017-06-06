<?php
require('modele/connect_database.php');
require('modele/gestion_conditions_admin.php');

// On teste nos variables
if (isset($_POST['textarea']))
{
  ajout_conditions($db);
  header("Location:index.php?page=conditions_admin");
}
else
{
  echo '<br/>Erreur : Les variables du formulaire ne sont pas déclarées.';
}

?>
