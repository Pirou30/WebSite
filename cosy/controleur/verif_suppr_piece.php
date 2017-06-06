<?php

require ('modele/connect_database.php');
require ('modele/gestion_piece.php');
suppr_piece($db);
echo '<meta http-equiv="refresh" content="1; index.php?page=piece" >';
?>
