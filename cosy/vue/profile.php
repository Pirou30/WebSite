<body id="bodyautre">

  <?php
  if (!isset($_SESSION['id_utilisateur_1']))
  {

    include("vue/profile_menu.php");
  }
  ?>
  <p>
    <div id=utilisateur >
      <div>
        <h1>
          <?php

            if ($user_type == secondary)
            {
              ?>
              Profil de <?php echo ($_POST['prenom'])?>
              <?php
            }
            else {
              ?>
              Vos informations personnelles, <?php echo ($_POST['prenom'])?>
              <?php
            }
          ?>
        </h1>

      </div>
      <p>
        Prénom : <?php echo ($_POST['prenom'])?>
      </p>
      <p>
        Nom : <?php echo ($_POST['nom'])?>
      </p>
      <p>
        Email : <?php echo ($_POST['email'])?>
      </p>
      <p>
        Numéro de téléphone : <?php echo ($_POST['numero_de_telephone'])?>
      </p>
      <h4>
        Adresse du Domicile
      </h4>
      <p>
        <?php echo ($_POST['adresse'])?>
      </p>
      <h4>
        Date de naissance
      </h4>
      <p>
        <?php echo ($_POST['date_de_naissance'])?>
      </p>
      <h4>
        Date de création du profil
      </h4>
      <p>
          <?php echo ($_POST['date_d_ajout'])?>
      </p>
      <form  method="POST" action="index.php?page=profile_modification">
        
        <input type="hidden" name="user_type" value="<?php echo $user_type;?>">

        <input type="hidden" name="user_name" value="<?php echo $_POST['prenom'];?>">

        <input type="hidden" name="user_login" value="<?php echo $_POST['login'];?>">
        <input class=boutonmodifier type="submit" value="modifier"/>
      </form>
    </div>
  </p>
</body>
