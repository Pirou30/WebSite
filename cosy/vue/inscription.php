
<body id="bodyautre">
<div id="banniereautre" class="banner2">


</div>

<form method="POST" name="formulaire" action="index.php?page=verif_inscription" onsubmit="return verifForm(this)" class="inscription">
  <p style="font-style:italic"> Placez votre souris sur un champ pour savoir comment le remplir </p>
  <h3>Clé d'inscription</h3>
  <div id="eveC">
    <input type="text" name="cle" placeholder=" Numéro de série"  required title="Vous trouverez votre clé d'inscription dans votre produit DOMISEP"/>
    <span style="display:none" id="cl">Disponible </span>
    <span style="display:none" id="clN">Indisponible </span>
  </div>



      <h3>Informations personnelles</h3>
      <p>
      <input id="nomm" type="text" name="nom" placeholder=" Nom"  required  title="Le nom doit contenir entre 2 et 25 caractères"/>
      <input id="prenomm" type="text" name="prenom" placeholder=" Prénom" required title="Le prénom doit contenir entre 2 et 25 caractères"/>
      <div id="eveM">
      <input id="mailm" type="email" name="email" placeholder="&#x1F4E7 E-mail" required title="E-mail du type : user@domain.com"/>
      <span style="display:none" id="mai">Disponible </span>
      <span style="display:none" id="maiN">Indisponible </span>
      </div>

     </p>


   <p>
   <input id="telm" type="text" name="tel" onkeydown="if(event.keyCode==32) return false;" placeholder="&#128222 Téléphone" required title="Numéro de téléphone sans espace du type : 0102030405"/>

   </p>
   <p> Date de naissance</p>
     <p>
     <input type="text" name="date_naissance" id="choix_date" placeholder="jj/mm/aaaa" required/>
   </p>

   <p>
     <h3>Adresse</h3>

    <input id="adresse" type="text" name="type_voie" placeholder=" N° et libellé de la voie" required title="Indiquez le numéro, le type et le nom de la voie"/>
    <input id="postalm" type="text" name="code_postal" placeholder=" Code postal" required size="7" title="Indiquez votre code postal"/>
 <input id="villem" type="text" name="ville" placeholder=" Ville" required title="Indiquez le nom de votre ville"/>

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




    <p><input type="checkbox" required /> J'ai lu et accepte les <a href="index.php?page=conditions">Conditions Générales d'Utilisation</a> </p>

    <p>
   <input id="submitbutton" type="submit" value="Créer mon compte" />
   <p id="erreurchamp">
   </p>
   </p>




</form>
<link rel="stylesheet" href="vue/jquerystyle/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="vue/datepicker-fr.js"></script>

<script src="vue/securite_formulaire.js" type="text/javascript"></script>


</body>
