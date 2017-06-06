<?php
  require('modele/gestion_capteur.php');
  //Sécurité remplissage du champs
  if (isset($_POST['cle']))
  {
  // Sécurité double numéro de série
    $reponse = recup_all_objet($db);
    $i=0;
    while ($donnees = $reponse->fetch())
    {
      if($donnees['numero_de_serie'] == $_POST['cle'])
      {
        $i=1;
      }
    }
    $reponse->closeCursor();
  // Sinon , on vérifie que le numéro de série correspond bien à un objet existant
  	$a=0;
  	$reponse = recup_all_serie($db);
    while ($donnees = $reponse->fetch())
    {
      if($donnees['numero_de_serie'] == $_POST['cle'])
      {
        $a=1;
      }
    }
    $reponse->closeCursor();
  // Si vérification des sécurités
  // Si l'objet n'a pas déjà été ajouté
    if($i==0)
    {
  	//Si le numéro de série est bien attribué
  	 	if($a==1)
      {
        ajout_objet($db);
        header("Location: index.php?page=objet");
      }
      else
      {
        $_SESSION['erreur'] = "Le numéro de série n'est pas attribué (25 caractères)</h3>";
  	    header("Location: index.php?page=ajout_objet");//Redirection vers la page d'erreur
  	    exit();//Permet l'arret du script
      }

    }
    else
    {
      $_SESSION['erreur'] = "Cet objet a déjà été ajouté.</h3>";
  	  header("Location: index.php?page=ajout_objet");//Redirection vers la page d'erreur
  	  exit();//Permet l'arret du script
    }
  }
  else
  {
    echo '<br/>Erreur : Les variables du formulaire ne sont pas déclarées.';
  }

?>
