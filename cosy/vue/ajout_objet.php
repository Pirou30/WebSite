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
    <form method="POST" class="basic-grey ajouto modifo" action="index.php?page=verif_ajout_objet">
      <h3>
        Entrer le numéro de série du périphérique à ajouter
      </h3>
      </br>
      </label>
      </p>
      <div id="eveC">
      <input type="text" name="cle" placeholder="Entrer le numéro de série" />
      <span style="display:none" id="cl">Disponible &#x2713</span>
      <span style="display:none" id="clN">Indisponible &#x2715</span>
      </div>
      <h3>
        Sélectionner la pièce où ajouter l'objet
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
      </br>
      <input type="submit" value="Ajouter" />
    </form>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="vue/securite_formulaire.js" type="text/javascript"></script>
</body>
