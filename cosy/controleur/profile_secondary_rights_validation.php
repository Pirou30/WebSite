<?php
//user management functions
  require('Modele/gestion_utilisateur.php');

//Set the variable required for the rights change validation
  $user_id =  $_SESSION['selected_user_id'];
  $id_piece = $_POST['id_piece'];
//Variable explaining the edit done on the user access rights
  $edit_rights = $_POST['rights'];
//edit the user access rights according to the radiobutton
  edit_secondary_users_rights($edit_rights, $user_id, $id_piece, $db);

//refresh the page
 echo '<meta http-equiv="refresh" content="1; index.php?page=profile_secondary_rights" >';
 ?>
