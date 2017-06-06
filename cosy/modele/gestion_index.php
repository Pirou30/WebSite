<?php

function id_cookie($db,$identifiant,$mdp)
{
  $reponse = $db->query('SELECT id_utilisateur,type,prenom FROM utilisateur WHERE login = "'.$identifiant.'" AND mot_de_passe = "'.$mdp.'"');
  return $reponse;
}

 ?>
