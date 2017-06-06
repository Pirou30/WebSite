<body id="bodyautre">
  <div id="contenu">
  <div id="banniereautre" class="banner2">
    <div class="diamond">
      <div></div>
    </div>
    <h1 class="text">Suppression d'une catégorie </h1>
  </div>
<input value="&#12296; Retour" class="boutonretour" type="submit" onclick="history.go(-1)">
<form method="POST" class="basic-grey ajouto modifo" action="index.php?page=verif_suppr_cat">

  <h3>
    Sélectionner la catégorie à supprimer
    Vérifier que la catégorie est vide avant de la supprimer
  </h3>


<select name="nom">
 <?php

  $reponse = $db->query('SELECT * FROM categorie');
  while ($donnees = $reponse->fetch())
  {
  ?>
             <option value="<?php echo $donnees['nom']; ?>"> <?php echo $donnees['nom']; ?></option>
  <?php
  }

  ?>
</select>
<input type="submit" value="Supprimer" />


</form>
</div>
</body>
