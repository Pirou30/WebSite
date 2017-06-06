<body id="bodyautre">
  <div id="contenu">
    <div id="banniereautre" class="banner2">
      <div class="diamond">
        <div></div>
      </div>
      <h1 class="text">Tous les utilisateurs</h1>
    </div>

<input value="&#12296; Retour" class="boutonretour" type="submit" onclick="history.go(-1)">
    <!--link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"-->
  <link rel="stylesheet" href="vue/material.min.css" />
  <script defer src="vue/material.min.js"></script>

<form class="basic-grey utilisateuro">

   <div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--10-col-desktop mdl-cell--stretch">
   <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
   <h3>Liste des utilisateurs</h3>

   <thead> <!-- En-tête du tableau -->
       <tr>
           <th>Nom</th>
           <th>Prénom</th>
           <th>Numéro de téléphone</th>
           <th>Type</th>
           <th>Date d'ajout</th>
           <th>Email</th>
       </tr>
   </thead>

<?php
// Affichage des données capteurs en tableau
$row=0;

while ($row < $i-1) {
?>
   <tbody> <!-- Corps du tableau -->
       <tr>
           <td> <?php echo $liste_utilisateurs[$row]['nom']; ?></td>
           <td> <?php echo $liste_utilisateurs[$row]['prenom']; ?></td>
           <td> <?php echo $liste_utilisateurs[$row]['numero_de_telephone']; ?></td>
           <td> <?php echo $liste_utilisateurs[$row]['type']; ?></td>
           <td> <?php echo $liste_utilisateurs[$row]['date_d_ajout']; ?></td>
           <td> <?php echo $liste_utilisateurs[$row]['email']; ?></td>
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
