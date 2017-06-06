<?php
  require("modele/gestion_capteur.php");
  require("modele/gestion_type.php");
//titre de l'onglet
  $onglet = "Supprimer une catégorie";
//type du menu
  $menu = $function;
//définition des variables nécessaire pour générer la page
  $objet_array = recup_all_objet($db);
//bloque tous les envois des fichiers que l'on appel + bloque tous les echos
  ob_start();
  include("vue/supprime_cat.php");
  $contenu = ob_get_clean();
//insertion dans le gabarit pour construire la page
  require("vue/gabarit.php");

?>
