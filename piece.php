<body id="bodyautre">

  <div id="banniereautre" class="banner2">
    <div class="diamond">
      <div></div>
    </div>
    <h1 class="text">Pièces</h1>
  </div>
  <?php if (isset($_SESSION['supression_piece_non_vide'])): ?>
    <h3 id="erreurco" class="basic-grey">La pièce séléctionnée n'est pas vide</h3><\br>
  <?php
    unset($_SESSION['supression_piece_non_vide']);
    endif;
  ?>
  <div id="objetsco">
      <div class="gauche">
        <a href="index.php?page=ajout_piece">
        <img src="vue/image/add.png" title="Cliquez pour agrandir" >
        <p> Ajouter une pièce </p>
      </a>
      </div>
      <div class="droite">
        <a href="index.php?page=modif_piece">    <!-- Modifier périphérique-->
        <img src="vue/image/settings.png" title="Cliquez pour agrandir" >
        <p> Modifier une pièce </p>
        </a>
      </div>
  </div>
  <div id="objetsco">
      <div class="centre">
        <a href="index.php?page=supprime_piece"> <!--Ajouter nouveau périphérique-->
        <img src="vue/image/remove.png" title="Cliquez pour agrandir" >
        <p> Supprimer une pièce </p>
      </a>
      </div>
  </div>


</body>
