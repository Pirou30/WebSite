<?php

function ajout_conditions($db)
{
  $req = $db->prepare('INSERT INTO page(type, valeur)
  VALUES(:type, :valeur)');
  //Execute
  $req->execute(array(
  'type' => "Conditions",
  'valeur' => $_POST['textarea']
  ));
}

function lire_conditions($db)
{
  $req = 'SELECT valeur FROM page WHERE type="Conditions" ';
  $reponse = $db->query($req);
  $texte = $reponse -> fetch();
  $_POST['valeur'] = $texte['valeur'];
}

function modif_conditions($db)
{
$db->exec('UPDATE page SET valeur ="'.$_POST['new_valeur'].'" WHERE type="Conditions" ');
}

function get_user_list($db)
{
  $req = $db -> query("SELECT * FROM utilisateur");
  return $req;
}
?>
