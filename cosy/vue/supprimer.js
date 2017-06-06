$(document).ready(function(){
supprimer();
menu_deroulant();

var elements = document.getElementsByClassName('onoff');

elementsLength = elements.length;
for (var i = 0 ; i < elementsLength ; i++) {
  if(elements[i].innerHTML=='ON')
  {elements[i].style.backgroundColor = "rgba(0, 255, 0, 0.7)";}
  else {
elements[i].style.backgroundColor = "rgba(255, 49, 67, 0.7)";

  }

}



$('button').on('click',function test() {

var ici = $(this);
$.post("controleur/EtatVerif.php",
{
  etat: $(this).text(),
  sn : $(this).val()
},
function(data,status){

  if (data == 'ON')
  {
    $(ici).text(data);
    $(ici).css("backgroundColor","rgba(0, 255, 0, 0.7)");
  }

  else
  {
    $(ici).text(data);
    $(ici).css("backgroundColor","rgba(255, 49, 67, 0.7)");
  }



});

});

});


  function supprimer(){


  $('.but').on('click',function() {
    var $h = $(this).parent("#croix").text();
    $h = $h.substr(0,$h.length-4);
  console.log($h);
    $(this).parents(".hover2").hide();
  //  $(this).parents(".objet_nom").prepend($h);


  });}


function menu_deroulant(){



  $('.but2').on('click',function() {

  $(this).next(".container").slideToggle('slow');

    $(this).find(">:nth-child(1)").toggleClass();
    $(this).find(">:nth-child(3)").toggleClass();



  });

}
