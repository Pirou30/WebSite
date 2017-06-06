<body id="bodyautre">
  <div id="banniereautre" class="banner2">
    <div class="diamond">
      <div></div>
    </div>
    <h1 class="text">Modificaiton du profil</h1>
  </div>
  <?php
  if (!isset($_SESSION['id_utilisateur_1']))
  {
    //Display the side menu ONLY for PRIMARY users
    include("vue/profile_menu.php");
  }
  ?>
  <p>
    <form method="POST" action="index.php?page=profile_modification_verification" class="basic-grey profilo">
        <h3>
          Modification du profil de <?php echo $user_name?>
        </h3>
        (remplissez seulement les champs souhaités)
      <p>
        <div id="eveL" >
        <input id="loginm" type="text" name="login" placeholder="Nouveau login" onblur="verifPseudo(this)"/>
        <span style="display:none" id="log">Disponible &#x2713</span>
        <span style="display:none" id="logN">Indisponible &#x2715</span>
        </div>
      </p>
      <?php
      if ($user_type == primary)
      {
        ?>
      <input id="adresse" type="text" name="adresse" placeholder=" N° et libellé de la voie" title="Indiquez le numéro, le type et le nom de la voie"/>
        <?php
      }
       ?>
       <p>
  <input id="mdpm" type="password" name="mdp" placeholder="Mot de passe" title="Minimum 8 caractères (uniquement des chiffres et des lettres); au moins 1 lettre et 1 chiffre"/>
       </p>

       <p>
  <input id="mdp2m" type="password" name="mdp_2" placeholder="Confirmer le mot de passe"/>
       </p>
      <p>
        Veuillez confirmer en inscrivant votre ancien mot de passe ci-dessous:
      </p>
      <p>
        <input type="password" name="old_mdp" placeholder="mot de passe actuel" required/>
      </p>
      <p>
        <input type="checkbox" required /> Je certifie être le propriétaire de ce compte
      </p>
      <p>
        <input type="hidden" name="user_login" value="<?php echo $_POST['user_login'];?>">
        <input id="submitbutton" type="submit" value="Sauvegarder"/>
     </p>
     <p id="erreurchamp">
     </p>
    </form>
    <?php
    if (isset($_SESSION['id_utilisateur_1']))
    {
      //Create a back to profile button for secondary users, as they don't have a side menu
      ?>
      <form method="post" action="index.php?page=profile" class="basic-grey profilo">
        <input type="submit" value="Retour"/>
      </form>
      <?php
    }
    ?>
  </p>
  <link rel="stylesheet" href="vue/jquerystyle/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="vue/securite_formulairetrue.js" type="text/javascript"></script>
</body>
