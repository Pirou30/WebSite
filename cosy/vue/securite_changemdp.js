// Initialisation des variables de vérification Ajax
var gMdp = false;
var gMdp2 = true;

function verifblock() {
  if (gMdp && gMdp2) {
    dispo();
  } else {
    indispo();
  }
}

function dispo() {
  document.getElementById('submitbutton').disabled = '';
  document.getElementById('submitbutton').style.opacity = '1';
  document.getElementById('submitbutton').style.color = '#447FB3';
  document.getElementById('submitbutton').style.cursor = 'pointer';
  document.getElementById('erreurchamp').innerHTML = '';
}

function indispo() {
  document.getElementById('submitbutton').disabled = 'disabled';
  document.getElementById('submitbutton').style.opacity = '0.5';
  document.getElementById('submitbutton').style.color = 'grey';
  document.getElementById('submitbutton').style.cursor = 'not-allowed';
  document.getElementById('erreurchamp').style.color = 'red';
  document.getElementById('erreurchamp').innerHTML = '</br>Veuillez renseigner correctement tous les champs';

}

$(document).ready(function(){
  document.getElementById('submitbutton').disabled = 'disabled';
  document.getElementById('submitbutton').style.cursor = 'not-allowed';
  document.getElementById('erreurchamp').innerHTML = '</br>Renseignez tous les champs pour pouvoir valider';
        // Verif mot de passe

        $("input[name='password1']").blur(function(){

          if($("input[name='password1']").val()!==""){
              var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
              if (regex.test($("input[name='password1']").val())) {
                gMdp = true;
                verifblock();
                document.getElementById('mdpm').style.backgroundColor = "rgba(170, 221, 170, .4)";
              }

              else {
                gMdp = false;
                verifblock();
                document.getElementById('mdpm').style.backgroundColor = "rgba(255, 187, 170, .4)";
              }
            };
            });

            // Verif mot de passe 2

            $("input[name='password2']").blur(function(){

              if($("input[name='password2']").val()!==""){
                  if ($("input[name='password2']").val() == $("input[name='password1']").val() && gMdp == true) {
                    gMdp2 = true;
                    verifblock();
                    document.getElementById('mdp2m').style.backgroundColor = "rgba(170, 221, 170, .4)";
                  }

                  else {
                    gMdp2 = false;
                    verifblock();
                    document.getElementById('mdp2m').style.backgroundColor = "rgba(255, 187, 170, .4)";
                  }
                };
                });


  });
