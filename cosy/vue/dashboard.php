<body id="bodyautre">
  <div id="bannieredash" class="banner2">

    <h1 id="bienvenue" class="text">Voici votre installation, <?php echo $_SESSION['prenom']; ?> ♪</h1>
	</div>
  <?php
  ini_set('display_errors', 1); //pour afficher sur mamp quand il y'a des erreurs
  ?>
  <div id="contenu">
    <?php
    while($data = $piece_array->fetch())
    {
      $id_piece = $data['id_piece'];
      $droit_piece = $droit_array[$id_piece];
      if ($droit_piece['droit_d_utilisateur'] == 'primaire' || $droit_piece['droit_d_utilisateur'] == 'full' || $droit_piece['droit_d_utilisateur'] == 'view')
      {
        ?>
        <div id="bouton" class="but2" type="div"><a style="text-align:left" class="fleche1"></a><a><?php echo matchName($data['id_piece']); ?></a><a style="text-align:right" class="fleche2"></a>
        <div id="<?php echo matchName($data['id_piece']); ?> " style="display:block;" class="container">
          <ol class="objet_nom">
            <?php 	echo Recuperercapteurs($data['id_piece'], $droit_piece['droit_d_utilisateur']); ?>
          </ol>
          </div>
        </div>
        <?php
      }
    }
    ?>
 	</div>
	<?php  $piece_array->closeCursor(); ?>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script type="text/javascript" src="vue/dashboard.js" ></script>
  <script type="text/javascript" src="vue/supprimer.js" ></script>
</body>
