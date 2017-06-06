<body id="bodyautre">
  <div id="contenu">
  <div id="banniereautre" class="banner2">
    <div class="diamond">
      <div></div>
    </div>
    <h1 class="text">Modification des conditions d'utilisation</h1>
  </div>
<input value="&#12296; Retour" class="boutonretour" type="submit" onclick="history.go(-1)">
<form method="POST" class="basic-grey ajouto modifo" action="index.php?page=verif_modif_conditions_admin">

<br />
<select>
 <?php
  $reponse = $db->query('SELECT valeur FROM page WHERE type="Conditions"');
  while ($donnees = $reponse->fetch())
  {
  ?>
  <option value="<?php echo $donnees['valeur']; ?>"> <?php echo $donnees['valeur']; ?></option>
  <?php
  }
  ?>
</select>
</p>

<input type="text" name="new_valeur" placeholder="Nouvelles conditions">
</br>

<input type="submit" name="ENREGISTRER" value="ENREGISTRER"/>


</form>
</div>
</body>
