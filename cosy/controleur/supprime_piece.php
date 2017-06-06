<?php

    $onglet = "Supprimer une pièce";
  //  $titre = "Mon site / Accueil";
    $menu = $function; //connecte ou pas
    $title = "Supprimer une pièce";

    ob_start();//bloque tous les envois des fichiers que l'on appel + bloque tous les echos

    include("vue/supprime_piece.php");

    $contenu = ob_get_clean();

    require("vue/gabarit.php");

?>
