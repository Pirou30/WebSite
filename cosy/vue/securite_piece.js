// Initialisation des variables de vérification Ajax
var gPiece = false;

function verifblock() {
  if (gPiece) {
    dispo();
  } else {
    indispo();
  }
}

function dispo() {
  document.getElementById('submitbutton').disabled = '';
  document.getElementById('submitbutton').style.opacity = '1';
  document.getElementById('submitbutton').style.color = 'white';
  document.getElementById('submitbutton').style.cursor = 'pointer';
  document.getElementById('erreurchamp').innerHTML = '';
}

function indispo() {
  document.getElementById('submitbutton').disabled = 'disabled';
  document.getElementById('submitbutton').style.opacity = '0.5';
  document.getElementById('submitbutton').style.color = 'grey';
  document.getElementById('submitbutton').style.cursor = 'not-allowed';
  document.getElementById('erreurchamp').style.color = 'red';
  document.getElementById('erreurchamp').innerHTML = '</br>Le nom de la pièce peut contenir maximum 20 caractères, espaces compris';

}

$(document).ready(function(){
        // Verif piece
        document.getElementById('submitbutton').disabled = 'disabled';
        document.getElementById('submitbutton').style.cursor = 'not-allowed';
        $("input[name='piece']").blur(function(){
          if($("input[name='piece']").val()!==""){
              if ($("input[name='piece']").val().length==0 || $("input[name='piece']").val().length > 20) {
                gPiece = false;
                verifblock();
                document.getElementById('piecem').style.backgroundColor = "rgba(255, 187, 170, .4)";
              }

              else {
                gPiece = true;
                verifblock();
                document.getElementById('piecem').style.backgroundColor = "rgba(170, 221, 170, .4)";
              }
            };
            });


  });
