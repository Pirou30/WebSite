// Initialisation des variables de vérification Ajax

var gCle = false;
var gNom = true;
var gPrenom = true;
var gMail = true;
var gTel = true;
var gDate = true;
var gAdresse = true;
var gPostal = true;
var gVille = true;
var gLogin = true;
var gMdp = true;
var gMdp2 = true;

function verifblock() {
  if (gCle && gNom && gPrenom && gMail && gTel && gDate && gAdresse && gPostal && gVille && gLogin && gMdp && gMdp2) {
    dispo();
  } else {
    indispo();
  }
}

function surligne(champ, erreur)
{
   if(erreur)
      {champ.style.backgroundColor = "rgba(255, 187, 170, .4)";

    }
   else
      {champ.style.backgroundColor = "rgba(170, 221, 170, .4)";


    }
}

function verifPseudo(champ)
{
   if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifNum(champ)
{
    var valide = /^0[1-7]\d{8}$/;
    if(!valide.test(champ.value))
    {
       surligne(champ, true);
       return false;
    }
    else
    {
       surligne(champ, false);
       return true;
    }
}


function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifDate(champ)
{
  var regex = /\d{2}(\/|-)\d{2}(\/|-)\d{4}/;
  if(!regex.test(champ.value))
  {
     surligne(champ, true);
     return false;
  }
  else
  {
     surligne(champ, false);
     return true;
  }

}

function verifVille(champ)
{

   var regex = /^[a-zA-Z'-]+$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifType(champ)
{

   var regex = /[a-zA-Z0-9'-]+/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifCP(champ)
{

   var regex = /^[0-9]{5,5}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}


function verifMdp(champ1,champ2)
{


      if(champ1.value!=champ2.value || champ1.value==="" || champ2.value==="")
      {
          surligne(champ1,true);
          surligne(champ2,true);
          return false;
      }
      else
      {
        surligne(champ1,false);
        surligne(champ2,false);
        return true;
      }

}

function dispo() {
  document.getElementById('submitbutton').disabled = '';
  document.getElementById('submitbutton').style.opacity = '1';
  document.getElementById('submitbutton').style.color = 'white';
  document.getElementById('submitbutton').style.cursor = 'pointer';
  document.getElementById('submitbutton').value = 'Créer mon compte';
  document.getElementById('erreurchamp').innerHTML = '';
}

function indispo() {
  document.getElementById('submitbutton').disabled = 'disabled';
  document.getElementById('submitbutton').style.opacity = '0.5';
  document.getElementById('submitbutton').style.color = 'black';
  document.getElementById('submitbutton').style.cursor = 'not-allowed';
  document.getElementById('erreurchamp').innerHTML = '</br>Veuillez renseigner correctement tous les champs';

}

function verifForm(f)
{

   var nomOk = verifPseudo(f.nom);
   var prenomOk = verifPseudo(f.prenom);
   var telOk = verifNum(f.tel);
   var villeOk = verifVille(f.ville);
   var typeOk = verifType(f.type_voie);
   var code_postalOk = verifCP(f.code_postal);
   var loginOk = verifPseudo(f.login);
   var mdpOk = verifMdp(f.mdp,f.mdp_2);
   var mailOk = verifMail(f.email);
   var dateOk = verifDate(f.date_naissance);

   if(nomOk && prenomOk && telOk && typeOk && code_postalOk && villeOk && mdpOk && mailOk && gLogin && gMail && gCle && dateOk)
{

      return true;
    }
   else
   {
  alert("Veuillez remplir correctement tous les champs");
       return false;
    }

 }


$(document).ready(function(){
    $("input[name='login']").blur(function(){

if(  $("input[name='login']").val()!==""){

        $.post("controleur/Dverif.php",
        {
          login: $("input[name='login']").val()
        },
        function(data,status){

          if (data == 'Login disponible' && $("input[name='login']").val().length >= 3) {
            $("#logN").hide("#loglogN");
            $("#log").show("#log");
            $("#eveL").addClass("pos_relat");
            gLogin = true;
            verifblock();
            document.getElementById('loginm').style.backgroundColor = "rgba(170, 221, 170, .4)";
          }

          else {
            $("#log").hide("#log");
            $("#logN").show("log#logN");
            $("#eveL").addClass("pos_relat");

            gLogin = false;
            document.getElementById('loginm').style.backgroundColor = "rgba(255, 187, 170, .4)";
            verifblock();
          }
        });}
    });

    // Verif du nom

    $("input[name='nom']").blur(function(){

      if($("input[name='nom']").val()!==""){
          var regex = /^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-']{2,60}$/;
          if ($("input[name='nom']").val().length > 2 && regex.test($("input[name='nom']").val())) {
            gNom = true;
            verifblock();
            document.getElementById('nomm').style.backgroundColor = "rgba(170, 221, 170, .4)";
          }

          else {
            gNom = false;
            verifblock();
            document.getElementById('nomm').style.backgroundColor = "rgba(255, 187, 170, .4)";
          }
        }
        });

        // Verif du prénom

        $("input[name='prenom']").blur(function(){

          if($("input[name='prenom']").val()!==""){
              var regex = /^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]{2,60}$/;
              if ($("input[name='prenom']").val().length > 1 && regex.test($("input[name='prenom']").val())) {
                gPrenom = true;
                verifblock();
                document.getElementById('prenomm').style.backgroundColor = "rgba(170, 221, 170, .4)";
              }

              else {
                gPrenom = false;
                verifblock();
                document.getElementById('prenomm').style.backgroundColor = "rgba(255, 187, 170, .4)";
              }
            }
            });

            // Verif du téléphone

            $("input[name='tel']").blur(function(){

              if($("input[name='tel']").val()!==""){
                  var regex = /[0-9]/;
                  if ($("input[name='tel']").val().length == 10 && regex.test($("input[name='tel']").val())) {
                    gTel = true;
                    verifblock();
                    document.getElementById('telm').style.backgroundColor = "rgba(170, 221, 170, .4)";
                  }

                  else {
                    gTel = false;
                    verifblock();
                    document.getElementById('telm').style.backgroundColor = "rgba(255, 187, 170, .4)";
                  }
                }
                });

                // Verif de l'adresse

                $("input[name='type_voie']").blur(function(){

                  if($("input[name='type_voie']").val()!==""){
                      var regex = /^[A-Za-z0-9 _]*[A-Za-z0-9\-\'][A-Za-z0-9 _\-\'][a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-\-\']*$/;
                      if (regex.test($("input[name='type_voie']").val())) {
                        gAdresse = true;
                        verifblock();
                        document.getElementById('adresse').style.backgroundColor = "rgba(170, 221, 170, .4)";
                      }

                      else {
                        gAdresse = false;
                        verifblock();
                        document.getElementById('adresse').style.backgroundColor = "rgba(255, 187, 170, .4)";
                      }
                    }
                    });

                    // Verif du code postal

                    $("input[name='code_postal']").blur(function(){

                      if($("input[name='code_postal']").val()!==""){
                          var regex = /^[0-9]{5,5}$/;
                          if (regex.test($("input[name='code_postal']").val())) {
                            gPostal = true;
                            verifblock();
                            document.getElementById('postalm').style.backgroundColor = "rgba(170, 221, 170, .4)";
                          }

                          else {
                            gPostal = false;
                            verifblock();
                            document.getElementById('postalm').style.backgroundColor = "rgba(255, 187, 170, .4)";
                          }
                        }
                        });

        // Verif de la ville

        $("input[name='ville']").blur(function(){

          if($("input[name='ville']").val()!==""){
              var regex = /^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-']{2,60}$/;
              if (regex.test($("input[name='ville']").val())) {
                gVille = true;
                verifblock();
                document.getElementById('villem').style.backgroundColor = "rgba(170, 221, 170, .4)";
              }

              else {
                gVille = false;
                verifblock();
                document.getElementById('villem').style.backgroundColor = "rgba(255, 187, 170, .4)";
              }
            }
            });

        // Verif mot de passe

        $("input[name='mdp']").blur(function(){

          if($("input[name='mdp']").val()!==""){
              var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
              if (regex.test($("input[name='mdp']").val())) {
                gMdp = true;
                verifblock();
                document.getElementById('mdpm').style.backgroundColor = "rgba(170, 221, 170, .4)";
              }

              else {
                gMdp = false;
                verifblock();
                document.getElementById('mdpm').style.backgroundColor = "rgba(255, 187, 170, .4)";
              }
            }
            });

            // Verif mot de passe 2

            $("input[name='mdp_2']").blur(function(){

              if($("input[name='mdp_2']").val()!==""){
                  if ($("input[name='mdp_2']").val() == $("input[name='mdp']").val() && gMdp === true) {
                    gMdp2 = true;
                    verifblock();
                    document.getElementById('mdp2m').style.backgroundColor = "rgba(170, 221, 170, .4)";
                  }

                  else {
                    gMdp2 = false;
                    verifblock();
                    document.getElementById('mdp2m').style.backgroundColor = "rgba(255, 187, 170, .4)";
                  }
                }
                });

        // Verif de la date de naissance

        $("input[name='date_naissance']").change(function(){

          if($("input[name='date_naissance']").val()!==""){
              var regex = /\d{2}(\/|-)\d{2}(\/|-)\d{4}/;
              if (regex.test($("input[name='date_naissance']").val())) {
                gDate = true;
                verifblock();
                document.getElementById('choix_date').placeholder = "";
                document.getElementById('choix_date').style.backgroundColor = "rgba(170, 221, 170, .4)";
              }

              else {
                gDate = false;
                verifblock();
                document.getElementById('choix_date').placeholder = "";
                document.getElementById('choix_date').style.backgroundColor = "rgba(255, 187, 170, .4)";
              }
            }
            });



    //Declanchement de la fonction vétifiant si le mail est dans la bdd

    $("input[name='email']").blur(function(){

if(  $("input[name='email']").val()!==""){

        $.post("controleur/Dverif.php",
        {
          email: $("input[name='email']").val()
        },
        function(data,status){
          var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
          if (data == 'Email disponible' && regex.test($("input[name='email']").val())){
            $("#maiN").hide("#maiN");
            $("#mai").show("#mai");
            $("#eveM").addClass("pos_relat");
            gMail = true;
            verifblock();
            document.getElementById('mailm').style.backgroundColor = "rgba(170, 221, 170, .4)";
          }

          else {
            $("#mai").hide("#mai");
            $("#maiN").show("#maiN");
            $("#eveM").addClass("pos_relat");
            gMail = false;
            document.getElementById('mailm').style.backgroundColor = "rgba(255, 187, 170, .4)";
            verifblock();
          }



        });}
    });

    //Declanchement de la fonction vétifiant si la cle est dans la bdd

    $("input[name='cle']").blur(function(){

      if( $("input[name='cle']").val()!==""){

        $.post("controleur/Dverif.php",
        {
          cle: $("input[name='cle']").val()
        },
        function(data,status){

          if (data == 'Cle disponible')
          {
            $("#clN").hide("#clN");
            $("#cl").show("#cl");
            $("#eveC").addClass("pos_relat");

            gCle = true;
            verifblock();
          }

          else
          {
            $("#cl").hide("#cl");
            $("#clN").show("#clN");
            $("#eveC").addClass("pos_relat");

            gCle = false;
            verifblock();
          }



        });}
    });


  });


$(function() {
$.datepicker.formatDate( "dd,mm,yy" );
     $( "#choix_date" ).datepicker(
       {changeMonth: true,
      changeYear: true,
    yearRange: "-100:O"}
     );
 } );

 $(function() {
    $( document ).tooltip();
  } );
