
<body id="bodyautre">
  <div id="contenu">
  <div id="banniereautre" class="banner2">
    <div class="diamond">
      <div></div>
    </div>
    <h1 class="text">Modification d'une pièce</h1>
  </div>
<input value="&#12296; Retour" class="boutonretour" type="submit" onclick="history.go(-1)">
<form method="POST" class="basic-grey ajouto modifo" action="index.php?page=verif_modif_piece">

<h3>Sélectionner la pièce à modifier</h3>

<br />
<select name="pieceold">
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
</p>



<input type="text" name="piece" required placeholder="Nouveau nom">
</br>

<input type="submit" name="ENREGISTRER" value="ENREGISTRER"/>


</form>
</div>
</body>
