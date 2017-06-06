<?php
function ajout_cle($db)
{



   $req = $db->prepare('INSERT INTO numero_serie( numero_de_serie, activation, id_categorie)

   VALUES(:numero_de_serie, :activation, :id_categorie)');



//Execute
$req->execute(array(

  'numero_de_serie' => $_POST['serie'],
  'activation' => 1,
  'id_categorie' => $_POST['type']
));
}


function suppr_cle($db)
{
  $db->exec('DELETE FROM numero_serie WHERE numero_de_serie="'.$_POST['num'].'"');
}

function suppr_cat($db)
{
  $db->exec('DELETE FROM categorie WHERE nom="'.$_POST['nom'].'"');
}

function affichage_utilise($activation)
{
  if ($activation==1)
  {
    echo "Non";
  }
  else
  {
    echo "Oui";
  }
}


function ajout_type($db)
{
  if ($_POST['type2'] != "")
  {
   $req = $db->prepare('INSERT INTO categorie( nom)
   VALUES(:nom)');



//Execute
$req->execute(array(

  'nom' => $_POST['type2'],

));

  $reponse = $db->query('SELECT id_categorie FROM categorie WHERE nom ="'.$_POST['type2'].'"');
  $type = $reponse ->fetch();
  $_POST['type'] = $type[0];
}
}

?>
