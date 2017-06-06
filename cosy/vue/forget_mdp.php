<?php

if(!isset($_GET['id']) && !isset($_GET['keyref']))
{
?>

<body id="bodyautre">
  <div id="contenuco">
<div id="banniereautre" class="banner2">
  <div class="diamond">
    <div></div>
  </div>
  <h1 class="text"> Mot de passe oublié</h1>
</div>
<?php
if (isset($_SESSION['erreurmdp']))
{
echo $_SESSION['erreurmdp'];
unset($_SESSION['erreurmdp']);

}
?>

<form style="height:250px" method="post" class="basic-grey connecto" action="index.php?page=forgetC">
  <div id="banniereco">&nbsp;Réinitialiser son mot de passe&nbsp;</div>
  <p>
    &nbsp;
  </p>
  <p>
    &nbsp;
  </p>
  <p>
    <input type="email" name="email" required placeholder="E-mail"/>
  </br>
    <input style="margin-top:0" value="Envoyer" type="submit" class="submit"/>
  </p>
<br />
<p>
  &nbsp;
</p>
      <p><a href="index.php?page=inscription">Pas de compte ? Inscrivez-vous</a>  </p>

</form>
</div>
</body>

<?php

}

 ?>
