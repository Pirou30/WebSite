<?php
//user management functions
  require("modele/gestion_utilisateur.php");
//header definition
  $onglet = "Edition des droits";
  $titre = "Edition des droits";
//connection status for the header menu
  $menu = $function;
//Set selected user as a $_SESSION to keep it each refresh
  if (isset($_POST['user_id']))
  {
    $_SESSION['selected_user_id'] = $_POST['user_id'];
  }
//Set the variable required for managing the user rights
  $user_id =  $_SESSION['selected_user_id'];
  $piece_array = get_primary_user_piece_list($db);
  $rights_array = get_primary_user_piece_rights($db, $user_id);

//get the html file and save it in $contenu
  ob_start();
  include("vue/profile_secondary_rights.php");
  $contenu = ob_get_clean();
//insert page content in gabarit.php
  require("vue/gabarit.php");
?>
