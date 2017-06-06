$(document).ready(function() {

    $('#button_piece').click(function(){
 var aAjouter = $('input[name=elementCheckList]').val();
   $('.piece').append("<div id=\"bouton\" type=\"div\" onclick=\"toggle_div(this,"+aAjouter+");\">"+aAjouter+
   "</div><div id="+aAjouter+" style=\"display:block;\"><div id=\"contenu\"><form action=\"#\"><div id=\"button_objet\" class=\"btn\">Ajouter un objet</div><select name=\"objet\" id=\"aj_objet\"><option value=\"Température\">Thermometre</option><option value=\"Spot\">Lumiere</option><option value=\"Présence\">Alarme</option><option value=\"Lave vaisselle\">Vaisselle</option><option value=\"Compteur électrique\">Electricité</option><option value=\"Compteur eau\">Compteur d'eau</option><option value=\"Hummide\">Capteur d'humidité</option></select></form></div></div>");

 });

 $('#button_objet').click(function(){
var  aObjet = $('#aj_objet').val();
if(aObjet=='Hummide'){
$('#contenu').prepend("</li><li id=\"border\" class=\"hover2\" ><div id=\"croix\">&nbsp;&nbsp;Humidité Salon <button type=\"button\"  class=\"but\" >&#x2715</button></div><a href=\"index.php?page=objet\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/b/b7/Goutte_d'eau.png\" title=\"Cliquez pour plus d'informations\" id=\"image2\"></a><h1>30%</h1></li><script type=\"text/javascript\" src=\"vue/supprimer.js\" ></script>");
}
else if (aObjet=='Température') {
  $('#contenu').prepend("<li id=\"border\" class=\"hover2\" ><div id=\"croix\">&nbsp;&nbsp;Température Salon <button type=\"button\" class=\"but\">&#x2715</button></div><a href=\"index.php?page=objet\"><img src=\"https://cdn2.iconfinder.com/data/icons/flat-icons-19/512/Thermometre.png\" title=\"Cliquez pour plus d'informations\" id=\"image2\"></a><h1>20°C</h1></li><script type=\"text/javascript\" src=\"vue/supprimer.js\" ></script>");
}

else if (aObjet=='Spot') {
  $('#contenu').prepend("<li id=\"border\" class=\"hover2\" ><div id=\"croix\">&nbsp;&nbsp;Spot Salon <button type=\"button\"  class=\"but\" >&#x2715</button></div><a href=\"index.php?page=objet\"><img src=\"http://www.myiconfinder.com/uploads/iconsets/5c45fea7601361971f06202d034760dc.png\" title=\"Cliquez pour plus d'informations\" id=\"image2\"></a><h1><button class=\"btn vert\" type=\"button\" onclick=\"\">ON</button><button  class=\"btn\" type=\"button\" onclick=\"\">OFF</button></h1></li><script type=\"text/javascript\" src=\"vue/supprimer.js\" ></script>");
}

else if (aObjet=='Présence') {
  $('#contenu').prepend("<li id=\"border\" class=\"hover2\" ><div id=\"croix\">&nbsp;&nbsp;Présence Salon<button type=\"button\"  class=\"but\">&#x2715</button></div><a href=\"index.php?page=objet\"><img src=\"http://www.free-icons-download.net/images/wireless-icon-46008.png\" title=\"Cliquez pour plus d'informations\" id=\"image2\"></a><h1>OK</h1></li><script type=\"text/javascript\" src=\"vue/supprimer.js\" ></script>");
}

else if (aObjet=='Lave vaisselle') {
  $('#contenu').prepend("<li id=\"border\" class=\"hover2\" ><div id=\"croix\">&nbsp;&nbsp;Lave vaisselle Salon<button type=\"button\"  class=\"but\">&#x2715</button></div><a href=\"index.php?page=objet\"><img src=\"https://d30y9cdsu7xlg0.cloudfront.net/png/121379-200.png\" title=\"Cliquez pour plus d'informations\" id=\"image2\"></a><h1><button class=\"btn vert\" type=\"button\" onclick=\"\">ON</button><button  class=\"btn\" type=\"button\" onclick=\"\">OFF</button></h1></li><script type=\"text/javascript\" src=\"vue/supprimer.js\" ></script>");
}

else if (aObjet=='Compteur électrique') {
  $('#contenu').prepend("<li id=\"border\" class=\"hover2\" ><div id=\"croix\">&nbsp;&nbsp;Compteur Electrique<button type=\"button\"  class=\"but\">&#x2715</button></div><a href=\"index.php?page=objet\"><img src=\"http://www.xn--icne-wqa.com/images/icones/8/2/pictograms-aem-0022-electric-general.png\" title=\"Cliquez pour plus d'informations\" id=\"image2\"></a>  <h1>Infos</h1></li><script type=\"text/javascript\" src=\"vue/supprimer.js\" ></script>");
}

else if (aObjet=='Compteur eau') {
  $('#contenu').prepend("<li id=\"border\" class=\"hover2\" ><div id=\"croix\">&nbsp;&nbsp;Compteur Eau<button type=\"button\"  class=\"but\">&#x2715</button></div><a href=\"index.php?page=objet\"><img src=\"http://www.beverlyhills.org/cbhfiles/storage/files/6378190101260953907/WaterMeterIcons22(2).png\" title=\"Cliquez pour plus d'informations\" id=\"image2\"></a>  <h1>Infos</h1></li><script type=\"text/javascript\" src=\"vue/supprimer.js\" ></script>");
}

});
return false;
});







/**/
