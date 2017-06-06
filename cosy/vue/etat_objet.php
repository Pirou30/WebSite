<?php


ini_set('display_errors', 1); //pour afficher sur mamp quand il y'a des erreurs

// Charge la table objet_connecte
$reponse = chargetable($db,'objet_connecte');

// Fait un tableau de données de la table objet_connecte
$i=0;
while ($donnees_objet[$i++] = $reponse->fetch())
{
}
// On ferme l'application fetch()
 $reponse-> closeCursor();

// Charge la table piece
$reponse = chargetable($db,'categorie');

// Fait un tableau de données de la table piece

$j=0;
while ($donnees_cat[$j++] = $reponse->fetch())
{
}
$reponse-> closeCursor();

$reponse = chargetable($db,'piece');

// Fait un tableau de données de la table piece

$j=0;
while ($donnees_piece[$j++] = $reponse->fetch())
{
}
$reponse-> closeCursor();

 ?>
<body id="bodyautre">
  <div id="contenu">
    <div id="banniereautre" class="banner2">
      <div class="diamond">
        <div></div>
      </div>
      <h1 class="text">Tous les objets</h1>
    </div>

    <input value="&#12296; Retour" class="boutonretour" type="submit" onclick="history.go(-1)">
    <!--link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"-->
  <link rel="stylesheet" href="vue/material.min.css" />
  <script defer src="vue/material.min.js"></script>

<form class="basic-grey etato">

   <div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--10-col-desktop mdl-cell--stretch">
   <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
   <h3>Etat des objets connectés</h3>

   <thead> <!-- En-tête du tableau -->
       <tr>
           <th>Type</th>
           <th>Numéro de série</th>
           <th>Valeur</th>
           <th>Etat de fonctionnement</th>
           <th>Localisation</th>
       </tr>
   </thead>

<?php

// Affichage des données capteurs en tableau
$row=0;

while ($row < $i-1) {
?>
   <tbody> <!-- Corps du tableau -->
       <tr>
           <td> <?php echo $donnees_cat[$donnees_objet[$row]['id_categorie']-1]['nom']; ?></td>
           <td> <?php echo $donnees_objet[$row]['numero_de_serie']; ?></td>
           <td> <?php echo $donnees_objet[$row]['valeur']; ?></td>
           <td> <?php echo $donnees_objet[$row]['etat_de_fonctionnement']; ?></td>
           <td> <?php echo $donnees_piece[$donnees_objet[$row]['id_piece']-1]['localisation_dans_la_maison']; ?></td>
       </tr>
   <?php
  $row++;
}
?>

   </tbody>
</table>
</div>
</section>

</div>
</body>
