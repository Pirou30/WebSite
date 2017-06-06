<body id="bodyautre">
  <div id="contenu">
  <div id="banniereautre" class="banner2">
    <div class="diamond">
      <div></div>
    </div>
    <h1 class="text">Suppression d'une pièce</h1>
  </div>
<input value="&#12296; Retour" class="boutonretour" type="submit" onclick="history.go(-1)">
<form method="POST" class="basic-grey ajouto modifo" action="index.php?page=verif_suppr_piece">


<h3>Sélectionner la pièce à supprimer</h3>

<select name="supprime_piece">
 <?php
  $id_utilisateur = $_SESSION['id_utilisateur'];
  $reponse = $db->query("SELECT * FROM piece WHERE id_piece IN (SELECT id_piece FROM posseder WHERE id_utilisateur = '".$id_utilisateur."')");
  while ($donnees = $reponse->fetch())
  {
  ?>
  <option value="<?php echo $donnees['localisation_dans_la_maison']; ?>"> <?php echo $donnees['localisation_dans_la_maison']; ?></option>
  <?php
  }
  ?>
</select>

<input type="submit" name="SUPPRIMER" value="SUPPRIMER"/>


</form>
</div>
</body>
