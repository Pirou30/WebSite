<?php

require ('modele/connect_database.php');
require ('modele/gestion_piece.php');
// On teste nos variables
if (isset($_POST['piece']))
{
      $reponse = recup_all_piece($db);
      $i=0;

      while ($donnees = $reponse->fetch())
      {
      	if($donnees['localisation_dans_la_maison'] == $_POST['piece'])
        {
          $i=1;
        }
      }
      $reponse->closeCursor();

      if($i==0)
      {
          modif_piece($db);
          header("Location:index.php?page=piece");
          }
      else
       {
        echo '<br/>Erreur : Votre modification est inutile';
      }
}
else
{
  echo '<br/>Erreur : Les variables du formulaire ne sont pas déclarées.';
}
?>
