<body id="bodyautre">
  <div id="contenu">
  <div id="banniereautre" class="banner2">
    <div class="diamond">
      <div></div>
    </div>
    <h1 class="text">Ajout d'une pi&#232;ce</h1>
  </div>
<input value="&#12296; Retour" class="boutonretour" require type="submit" onclick="history.go(-1)">
<form method="POST" class="basic-grey ajouto modifo" action="index.php?page=verif_ajout_piece">

<h3>Ajouter une pi&#200;ce</h3>


<input id="piecem" type="text" name="piece" placeholder="Nom de la pièce">






<input id="submitbutton" type="submit" name="AJOUTER" value="AJOUTER"/>

<p id="erreurchamp">
  Le nom de la pièce peut contenir maximum 23 caractères, espaces compris
</p>
</form>
</div>
<link rel="stylesheet" href="vue/jquerystyle/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="vue/securite_piece.js" type="text/javascript"></script>
</body>
