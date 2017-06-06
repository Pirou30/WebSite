<body id="bodyautre">
  <div id="contenu">
  <div id="banniereautre" class="banner2">
    <div class="diamond">
      <div></div>
    </div>
    <h1 class="text">Suppression d'une clé </h1>
  </div>
<input value="&#12296; Retour" class="boutonretour" type="submit" onclick="history.go(-1)">
<form method="POST" class="basic-grey ajouto modifo" action="index.php?page=verif_suppr_cle">

  <h3>
    Sélectionner la clé à supprimer
  </h3>


<select name="num">
 <?php

  $reponse = $db->query('SELECT * FROM numero_serie');
  while ($donnees = $reponse->fetch())
  {
  ?>
             <option value="<?php echo $donnees['numero_de_serie']; ?>"> <?php echo $donnees['numero_de_serie']; ?></option>
  <?php
  }

  ?>
</select>
<input type="submit" value="Supprimer" />


</form>
</div>
</body>
