<?php
require('modele/connect_database.php');
require('modele/gestion_capteur.php');
require('modele/gestion_type.php');
//Sécurité remplissage du champs
if (isset($_POST['serie']))
{
	// Sécurité double numéro de série
      $reponse = recup_all_serie($db);
      $i=0;
      while ($donnees = $reponse->fetch())
      {
      	if($donnees['numero_de_serie'] == $_POST['serie'])
        {
          $i=1;
        }
      }
      $reponse->closeCursor();







// Si vérification des sécurités
// Si l'objet n'a pas déjà été ajouté
      if($i==0)
      {
          ajout_type($db);
          ajout_cle($db);
          header("Location: index.php?page=cle");

          }
      else
       {
          $_SESSION['erreur'] = "Le numéro de série est déjà attribué </h3>";
	header("Location: index.php?page=ajout_cle");//Redirection vers la page d'erreur
	exit();//Permet l'arret du script
}



}
else
{
  $_SESSION['erreur'] = "Les champs du formulaire ne sont pas remplis </h3>";
header("Location: index.php?page=ajout_cle");//Redirection vers la page d'erreur
}
?>
