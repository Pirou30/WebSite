<body id="bodyautre">
  <div id="contenu">
  <div id="banniereautre" class="banner2">
    <div class="diamond">
      <div></div>
    </div>
    <h1 class="text">Ajout d'un objet</h1>
  </div>
<input value="&#12296; Retour" class="boutonretour" required type="submit" onclick="history.go(-1)">


<?php
// POPUP D'ERREUR
  if (isset($_SESSION['erreur']))
  {
  echo '<h3 id="erreurco" class="basic-grey">Une erreur est survenue car : '.$_SESSION['erreur'];
  unset($_SESSION['erreur']);

  }
  ?>

<form method="POST" class="basic-grey ajouto modifo" action="index.php?page=verif_ajout_cle">

  <h3>
    Entrer le numéro de série du périphérique à ajouter
  </h3>
  </br>

<p>
<input type="text" name="serie" placeholder="Entrer le numéro de série" required />
</p>
<h3>
  Sélectionner le type de l'objet
</h3>
</br>
<select name="type">
 <?php

  $reponse = $db->query('SELECT * FROM categorie ORDER BY nom DESC');
  while ($donnees = $reponse->fetch())
  {
  ?>
             <option value="<?php echo $donnees['id_categorie']; ?>"> <?php echo $donnees['nom']; ?></option>
  <?php
  }

  ?>
</select>
</br>
<p>
  Ou ajouter un nouveau type :
<input type="text" name="type2" required placeholder="Ajoutez un nouveau type" />
</p>

<input type="submit" value="Ajouter" />


</form>
</div>
</body>
