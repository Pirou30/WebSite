<?php
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/

 function ajout_objet($db)
 {
//Variable qui contient la date d'aujourd'hui et l'heure
    $today = date("Y-m-d H:i:s");
//requete d'insertion du cpteur dans la base de donnée
    $req = $db->prepare('INSERT INTO objet_connecte( numero_de_serie, date_d_installation, etat_de_fonctionnement, date_de_modification, id_piece, id_categorie)
      VALUES(:numero_de_serie, :date_d_installation, :etat_de_fonctionnement, :date_de_modification, :id_piece, :id_categorie)');
//
    $reponse = $db->query('SELECT id_categorie FROM numero_serie WHERE numero_de_serie ="'.$_POST['cle'].'"');
    $type = $reponse ->fetch();

//Execution de la requête
   $req->execute(array(
     'numero_de_serie' => $_POST['cle'],
     'date_d_installation' => $today,
     'etat_de_fonctionnement' => ON,
     'date_de_modification' => $today,
     'id_piece' => $_POST['salle'],
     'id_categorie' => $type[0]
   ));
//désactivation du numéro de série
  $cle = $_POST['cle'];
  $req2 = $db -> query("UPDATE numero_serie SET activation = 0 WHERE numero_de_serie = '".$cle."'");
 }

/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/

// fonction qui cherche tous les capteurs dans la base de données
  function recup_all_objet($db)
  {
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $reponse = $db->query("SELECT * FROM objet_connecte WHERE id_piece IN (SELECT id_piece FROM posseder WHERE id_utilisateur = '".$id_utilisateur."')");
    return $reponse;
  }

/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/

// fonction qui cherche tous les capteurs dans la base de données
  function recup_all_serie($db)
  {
    $reponse = $db->query('SELECT * FROM numero_serie');
    return $reponse;
  }

/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/

// fonction qui cherche toutes les catégories dans la base de données
  function recup_all_categorie($db)
  {
    $reponse = $db->query('SELECT * FROM categorie');
    return $reponse;
  }

/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/

// fonction qui cherche toutes les pieces dans la base de données dans l'ordre alphabétique en fonction du nom
  function recup_all_piece_ordered_by_name($db)
  {
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $reponse = $db->query("SELECT * FROM piece WHERE id_piece IN (SELECT id_piece FROM posseder WHERE id_utilisateur = '".$id_utilisateur."') ORDER BY localisation_dans_la_maison DESC");
    return $reponse;
  }

/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/

// fonction qui cherche toutes les pièces
  function recup_all_piece($db)
  {
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $reponse = $db->query("SELECT * FROM piece WHERE id_piece IN (SELECT id_piece FROM posseder WHERE id_utilisateur = '".$id_utilisateur."')");
    return $reponse;
  }

/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/

// fonction qui supprime l'object connecté séléctionné
  function suppr_objet($db)
  {
    $db->exec('DELETE FROM objet_connecte WHERE numero_de_serie="'.$_POST['num'].'"');
  //réativation du numéro de sérecup_all_serie
    $req = $db -> query("UPDATE numero_serie SET activation = 1 WHERE numero_de_serie = '".$_POST['num']."'");
  }

/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/

//fonction qui modifie un objet
 function modif_objet($db)
 {
    $db->exec('UPDATE objet_connecte SET id_piece ="'.$_POST['salle'].'" WHERE numero_de_serie ="'.$_POST['num'].'"');
 }

/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
// fonction qui cherche la salle d'un objet avec un numéro de série dans la base de données
  function mdp($db,$piece)
  {
     $reponse = $db->query('SELECT piece FROM objet_connecte WHERE id_objet="'.$id_objet.'"');
     return $reponse;
  }

/*****************************************************************************************************************************/
/*****************************************************************************************************************************/
/*****************************************************************************************************************************/

// Fonction qui permet de charger une table de la base de donnée
  function chargetable($db,$table)
  {
    if ($table == 'objet_connecte')
    {
      $id_utilisateur = $_SESSION['id_utilisateur'];
    //  $req = "SELECT * FROM objet_connecte WHERE id_piece IN (SELECT id_piece FROM posseder WHERE id_utilisateur = '".$id_utilisateur."')";
      $req = "SELECT * FROM objet_connecte LEFT JOIN sauvegarde_des_valeurs ON objet_connecte.id_objet=sauvegarde_des_valeurs.id_objet INNER JOIN piece ON objet_connecte.id_piece=piece.id_piece INNER JOIN posseder ON posseder.id_piece = piece.id_piece INNER JOIN utilisateur ON posseder.id_utilisateur = utilisateur.id_utilisateur WHERE utilisateur.id_utilisateur = '".$id_utilisateur."'";

      $reponse = $db->query($req);
      return $reponse;
    }
    else
    {
      $req = 'SELECT * FROM '.$table;
      $reponse = $db->query($req);
      return $reponse;
    }
  }
?>
