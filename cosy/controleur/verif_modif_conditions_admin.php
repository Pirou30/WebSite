<?php

require ('modele/connect_database.php');
require ('modele/gestion_conditions_admin.php');
modif_conditions($db);
echo '<meta http-equiv="refresh" content="1; index.php?page=modif_conditions_admin" >';

?>
