<html lang="fr">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <!--Ces lignes permettent de rediriger un utilisateur si il desactive le JS-->
      <noscript>
        <meta http-equiv="refresh" content="1;vue/activer_JS.html" />
      </noscript>

      <link rel="stylesheet" type="text/css" href="vue/style.css" />
      <title>
          <?= $onglet;?>
      </title>
  </head>
  <div id="blur"></div>
  <?php
  //définition du menu en fonction du mode de connection
  if($menu == "connecte")
  {
    include('menu_connecte.php');
  }
  elseif($menu == "deconnecte")
  {
    include('menu_deconnecte.php');
  }
  ?>
  <div id="marge"></div>
