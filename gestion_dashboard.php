<?php


function recup_piece()
{//récupère la piece en fonction de l'utilisateur
$db = $_SERVER['name'];
$id_user = $_SESSION['UserID'];
$room = $db->prepare('SELECT posseder.id_piece FROM posseder INNER JOIN piece ON posseder.id_piece=piece .id_piece WHERE  posseder.id_utilisateur=:id'); //ajouter le reste de la table
$room->execute(array(':id'=>$id_user));

return $room;

}

//Fonction qui sélectionne le nom de la pièce
function matchName ($id_piece){
$db = $_SERVER['name'];
$name = $db->prepare('SELECT localisation_dans_la_maison FROM piece WHERE id_piece=:id');
$name->execute(array(':id'=>$id_piece));
$response = $name->fetch();
return $response['localisation_dans_la_maison'];
$name->closeCursor();
}


//recupere la catégorie de l'objet
function matchCategorie ($id_objet){
$db = $_SERVER['name'];
$name =	$db->prepare('SELECT nom FROM categorie WHERE id_categorie = (SELECT id_categorie FROM objet_connecte WHERE id_objet =:id1)');
$name->execute(array(':id1'=>$id_objet));
$response=$name->fetch();
return $response['nom'];
$name->closeCursor();
}

//récupere les objets d'une pièce précise à partir de l'id de la piece
function Recuperercapteurs($id_piece,$droit_piece){
 $db = $_SERVER['name'];
 $recup = $db->prepare('SELECT  id_objet FROM objet_connecte WHERE id_piece=:id');
 $recup->execute(array(':id'=>$id_piece));
 while($data = $recup->fetch()){
 getData($data['id_objet'],$id_piece,$droit_piece);
 }
 $recup->closeCursor();
}

//récupere les données de l'objet de la pièce a partir de l'id de l'objet et de l'id de la piece
function getData($id_objet,$id_piece,$droit_piece){
 $db = $_SERVER['name'];
 getSerialNumber($id_objet);
 if ($droit_piece == 'primaire' || $droit_piece == 'full')
 {
   echo '<li id="border" class="hover2" >
   <div id="croix">
   &nbsp;&nbsp;'.matchCategorie($id_objet).' - '.$GLOBALS['SerialNumber'].' <button class="but" type="button">&#x2715</button>
   </div>
   <a href="index.php?page=etat_objet">'.matchImg($id_objet).'</a>
   <h1>'.getEtatEquipement($id_objet).'</h1>
   </li>';
 }
 else
 {
   echo '<li id="border" class="hover2" >
   <div id="croix">
   &nbsp;&nbsp;'.matchCategorie($id_objet).' - '.$GLOBALS['SerialNumber'].' <button class="but" type="button">&#x2715</button>
   </div>
   <a href="index.php?page=etat_objet">'.matchImg($id_objet).'</a>
   </li>';
 }

}


//Recupere la valeur du capteur
function getValueEquipment($id_capteur_actionneur){
$db = $_SERVER['name']; //modele permettant de se connecter à la db
$data = $db->prepare('SELECT value FROM objet_connecte WHERE id_objet = :id1 ORDER BY id_piece DESC ');
$data->execute(array(':id1'=>$id_capteur_actionneur));
while($value = $data->fetch()){
return $value['value'];
}
return "HS";
$data->closeCursor();
}

function getEtatEquipement($id_capteur_actionneur){
$db = $_SERVER['name']; //modele permettant de se connecter à la db
$data = $db->prepare('SELECT etat_de_fonctionnement As etat,categorie.nom,numero_de_serie,sauvegarde_des_valeurs.valeur FROM objet_connecte INNER JOIN categorie ON objet_connecte.id_categorie = categorie.id_categorie LEFT JOIN sauvegarde_des_valeurs ON sauvegarde_des_valeurs.id_objet = objet_connecte.id_objet  WHERE objet_connecte.id_objet = :id1 ');
$data->execute(array(':id1'=>$id_capteur_actionneur));
while($value = $data->fetch()){

switch ($value['nom']) {
	case 'Thermomètre':
			return $value['valeur'];
			break;
	case 'Capteur humidité':
			return $value['valeur'];
			break;
	case 'Compteur eau':
			return $value['valeur'];
			break;
	case 'Compteur électricité':
			return $value['valeur'];
			break;
  case 'Lumière':
			return '<h1><button class="onoff" value="'.$value['numero_de_serie'].'">'.$value['etat'].'</button></h1>';
      break;
	case 'Capteur présence':
	return '<h1><button class="onoff" value="'.$value['numero_de_serie'].'">'.$value['etat'].'</button></h1>';
      break;
	case 'Lave-Vaisselle':
	return '<h1><button class="onoff" value="'.$value['numero_de_serie'].'">'.$value['etat'].'</button></h1>';
      break;
}
}
return "<h1>HS</h1>";
}

//Fonction pour savoir quelle image affiché en fonction de la catégorie de l'objet
function matchImg ($id_objet){
$db = $_SERVER['name'];
$req = $db->prepare('SELECT id_categorie FROM objet_connecte WHERE id_objet = :id1 ORDER BY id_piece DESC');
$req->execute(array(':id1'=>$id_objet));
$data=$req->fetch();
//1: température
if ((int)$data['id_categorie']==1){
return '<img src="https://puu.sh/w8DrK/430a11f4a4.png" title="Cliquez pour plus d\'informations" id="image2">';
}
//2: spots
if ((int)$data['id_categorie']==2){
return '<img src="https://puu.sh/w8Dz9/8339ee2de8.png" title="Cliquez pour plus d\'informations" id="image2">';
}
//3: capteur humidité
if ((int)$data['id_categorie']==3){
return '<img src="https://puu.sh/w8E1S/9e27f40da2.png" title="Cliquez pour plus d\'informations" id="image2">';
}
//4: capteur présence
if ((int)$data['id_categorie']==4){
return '<img src="https://puu.sh/w8DDP/7b6ceda94b.png" title="Cliquez pour plus d\'informations" id="image2">';
}
//5: lave-vaisselle
if ((int)$data['id_categorie']==5){
return '<img src="https://puu.sh/w8DKJ/79043467e8.png" title="Cliquez pour plus d\'informations" id="image2">';
}
//6: compteur eau
if ((int)$data['id_categorie']==6){
return '<img src="https://puu.sh/w8DrK/430a11f4a4.png" title="Cliquez pour plus d\'informations" id="image2">';
}
//7: compteur électricité
if ((int)$data['id_categorie']==7){
return '<img src="https://puu.sh/w8DV9/aa6b4d246c.png" title="Cliquez pour plus d\'informations" id="image2">';
}
//$data->closeCursor();
}

function getSerialNumber($id_capteur_actionneur){
$db = $_SERVER['name'];
$data = $db->prepare('SELECT numero_de_serie FROM objet_connecte WHERE id_objet = :id1 ORDER BY id_piece DESC ');
$data->execute(array(':id1'=>$id_capteur_actionneur));
while($value = $data->fetch()){
$GLOBALS['SerialNumber'] = $value['numero_de_serie'];
}
$data->closeCursor();
}








 ?>
