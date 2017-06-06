<body id="bodyautre">
  <div id="contenu">
    <div id="banniereautre" class="banner2">
      <div class="diamond">
        <div></div>
      </div>
      <h1 class="text">Modification d'un objet</h1>
    </div>
    <input value="&#12296; Retour" class="boutonretour" type="submit" onclick="history.go(-1)">
    <form method="POST" class="basic-grey ajouto modifo" action="index.php?page=verif_modif_objet">
    <h3>
      Sélectionner le numéro de série de l'objet
    </h3>
    </br>
    <select name="num">
    <?php
      while ($donnees = $objet_array->fetch())
      {
      ?>
        <option value="<?php echo $donnees['numero_de_serie']; ?>"> <?php echo $donnees['numero_de_serie']; ?></option>
      <?php
      }
    ?>
    </select>
    <h3>
      Sélectionner la pièce où mettre l'objet
    </h3>
    </br>
    <select name="salle">
    <?php
      while ($donnees = $piece_array->fetch())
      {
      ?>
        <option value="<?php echo $donnees['id_piece']; ?>"> <?php echo $donnees['localisation_dans_la_maison']; ?></option>
      <?php
      }
    ?>
    </select>
    <p>
      <input type="submit" value="Modifier" />
    </p>
    </form>
  </div>
</body>
