<body id="bodyautre">
  <div id="contenuco">
  <div id="banconnexion" class="banner2">
  

  </div>
  <?php

  if(isset($_SESSION['inscription']))
  {
      echo '<h3 id="inscreussi" class="basic-grey"> Inscription réussie !</h3>';
      unset($_SESSION['inscription']);
  }
  if (isset($_SESSION['erreur']))
  {
  echo '<h3 id="erreurco" class="basic-grey">Une erreur est survenue car : '.$_SESSION['erreur'];
  unset($_SESSION['erreur']);

  }
  ?>

<form method="POST" class="basic-grey connecto" action="index.php?page=verif_connexion">
  <div id="banniereCo">Entrez vos identifiants</div>
  <p>

    <input type="text" class=name name="login" placeholder="Identifiant" autofocus required/>

    <p>
      &nbsp;
    </p>
    
    <input type="password" class=mdp name="mdp" required placeholder="Mot de passe"/>
  </p>

  <p>
    <input class=connecter value="se connecter" type="submit"/>
  </p>


<br />

      <p><a href="index.php?page=forget_mdp">Mot de passe oublié ?</a>  </p>


</form>

</div>
</body>
