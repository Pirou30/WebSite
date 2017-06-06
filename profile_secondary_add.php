<body id="bodyautre">
  <div id="banniereautre" class="banner2">
    <div class="diamond">
      <div></div>
    </div>
    <h1 class="text">Ajout utilsateur secondaire</h1>
  </div>
  <?php
  if (!isset($_SESSION['id_utilisateur_1']))
  {
    include("vue/profile_menu.php");
  }
  ?>
  <form method="POST" action="index.php?page=profile_secondary_add_validation" class="basic-grey">
    <h1>
      Ajout d'un utilisateur secondaire
    </h1>
    <h3>Informations personnelles</h3>
    <p>
    <input id="nomm" type="text" name="nom" placeholder=" Nom"  required  title="Le nom doit contenir entre 2 et 25 caractères"/>
    <input id="prenomm" type="text" name="prenom" placeholder=" Prénom" required title="Le prénom doit contenir entre 2 et 25 caractères"/>
    <div id="eveM">
    <input id="mailm" type="email" name="email" placeholder="&#x1F4E7 E-mail" required title="E-mail du type : user@domain.com"/>
    <span style="display:none" id="mai">Disponible &#x2713</span>
    <span style="display:none" id="maiN">Indisponible &#x2715</span>
    </div>

   </p>
    <p> Date de naissance</p>
    <p>
      <input type="text" name="date_naissance" id="choix_date" placeholder="jj/mm/aaaa" required/>
    </p>
    <h3>Informations de connexion</h3>
    <p>
        <div id="eveL" >
      <input id="loginm" type="text" name="login" placeholder="Pseudo utilisé pour la connexion" size="25" required title="Le login doit contenir entre 3 et 25 caractères"/>
       <span style="display:none" id="log">Disponible &#x2713</span>
       <span style="display:none" id="logN">Indisponible &#x2715</span>

         </div>
    </p>
    <p>
<input id="mdpm" type="password" name="mdp" placeholder="Mot de passe" title="Minimum 8 caractères (uniquement des chiffres et des lettres); au moins 1 lettre et 1 chiffre" required/>
    </p>

    <p>
<input id="mdp2m" type="password" name="mdp_2" placeholder="Confirmer le mot de passe" required/>
    </p>
    <p><input type="checkbox" required /> J'ai lu et accepte les <a href="">Conditions générales d'utilisation</a> </p>
    <p>
      <input id="submitbutton" type="submit" value="Créer un compte" />
      <p id="erreurchamp">
      </p>
      </p>
  </form>

  <link rel="stylesheet" href="vue/jquerystyle/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="vue/datepicker-fr.js"></script>
  <script src="vue/securite_formulairetrue.js" type="text/javascript"></script>

</body>
