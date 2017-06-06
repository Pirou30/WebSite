<?php

 function ajout_piece($db)
 {
   //Variable qui contient la date d'aujourd'hui et l'heure
  $today = date("Y-m-d H:i:s");
  $id_user = $_SESSION['id_utilisateur'];
  $req = $db->prepare('INSERT INTO piece(localisation_dans_la_maison, description_de_la_piece, date_d_ajout, date_de_derniere_modification)
  VALUES(:localisation_dans_la_maison, :description_de_la_piece, :date_d_ajout, :date_de_derniere_modification)');
  //Execute
 $req->execute(array(
   'localisation_dans_la_maison' => $_POST['piece'],
   'description_de_la_piece' => NULL,
   'date_d_ajout' => $today,
   'date_de_derniere_modification' => $today
 ));
 //récupération de l'id de la pièce
 $req2 = $db->query('SELECT id_piece FROM piece WHERE date_d_ajout = "'.$today.'"');
 $id_piece = $req2 -> fetch();

 //Insertion dans la table des droits
 $req3 = $db->prepare('INSERT INTO posseder(droit_d_utilisateur, date_de_modification_des_droits, id_utilisateur, id_piece)
 VALUES (:droit_d_utilisateur,:date_de_modification_des_droits, :id_utilisateur, :id_piece)');
//execute

  $req3->execute(array(
    'droit_d_utilisateur' => 'primaire',
    'date_de_modification_des_droits' => $today,
    'id_utilisateur' => $id_user,
    'id_piece' => $id_piece['id_piece']
  ));

//ajout des droits null à tout les utilisateurs secondaires
  $sql = "SELECT id_utilisateur FROM utilisateur WHERE id_utilisateur_1 = '".$id_user."'";
  $request = $db->query ($sql);
  $secondary_users_array = $request -> fetch();
  $line = 0;
  do
  {
    $secondary_user_id = $secondary_users_array[$line];
    $req4 = $db->prepare('INSERT INTO posseder(droit_d_utilisateur, date_de_modification_des_droits, id_utilisateur, id_piece)
    VALUES (:droit_d_utilisateur,:date_de_modification_des_droits, :id_utilisateur, :id_piece)');
    $req4->execute(array(
       'droit_d_utilisateur' => 'NULL',
       'date_de_modification_des_droits' => $today,
       'id_utilisateur' => $secondary_user_id,
       'id_piece' => $id_piece['id_piece']
     ));
    $line++;
    $next_user = $secondary_users_array[$line];
  } while (isset($next_user));


 }

 //fonction qui suppripme une piece
 function suppr_piece($db)
 {
   $req2 = $db->query('SELECT id_piece FROM piece WHERE localisation_dans_la_maison="'.$_POST['supprime_piece'].'"');
   $id_piece = $req2 -> fetch();
   //check si la pièce est bien vide:
   $req3 = $db -> query("SELECT id_objet FROM objet_connecte WHERE id_piece = '".$id_piece['id_piece']."'");
   $empty = $req3 -> fetch();
   if (!isset($empty['id_objet']))
   {
     $db->exec('DELETE FROM piece WHERE id_piece="'.$id_piece['id_piece'].'"');
     $db->exec('DELETE FROM posseder WHERE id_piece="'.$id_piece['id_piece'].'"');
   }
   else {
     echo '<meta http-equiv="refresh" content="1; index.php?page=piece" >';
     $_SESSION['supression_piece_non_vide'] = 1;
   }
 }

	  //fonction qui modifie une piece
 function modif_piece($db)
 {
 $db->exec('UPDATE piece SET localisation_dans_la_maison ="'.$_POST['piece'].'", description_de_la_piece ="'.$_POST['description'].'" WHERE localisation_dans_la_maison ="'.$_POST['pieceold'].'"');
 }

// fonction qui cherche toute les pieces dans la base de données
function recup_all_piece($db)
{
$reponse = $db->query('SELECT localisation_dans_la_maison FROM piece');
return $reponse;
}

function chargetable($db,$table)
// Fonction qui permet de charger une table de la base de donnée
{
$req = 'SELECT * FROM '.$table;
$reponse = $db->query($req);
return $reponse;
}
?>
