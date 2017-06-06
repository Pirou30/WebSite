
<?php


require('modele/gestion_utilisateur.php');

// On teste nos variables
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['ville']) && isset($_POST['type_voie']) && isset($_POST['code_postal'])
 && isset($_POST['date_naissance']) && isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['mdp_2']) && isset($_POST['email']) && isset($_POST['cle']))
{

    $vTel = '#^0[1-7]\d{8}$#';
    $vVille='#[a-zA-Z\'-]+#';
    $vType_voie='#[a-zA-Z0-9\'-]+#';
    $vCode_postal='#^[0-9]{5,5}$#';
    $vemail='#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';




    if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 25
    || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 25
    || preg_match($vTel,$_POST['tel'])==false
    || preg_match($vVille,$_POST['ville'])==false
    || preg_match($vType_voie,$_POST['type_voie'])==false
    || preg_match($vCode_postal,$_POST['code_postal'])==false
    || preg_match($vemail,$_POST['email'])==false
    || $_POST['mdp']!=$_POST['mdp_2'])


    {  echo 'Erreur dans le formulaire';}
  else {



          $reponse = recup_all_login($db);
          $i=0;
          while ($donnees = $reponse->fetch())
          {
          	if($donnees['login'] == $_POST['login'])
            {
              $i=1;
            }
           }

          $reponse->closeCursor();

          if($i==0)
          {
              inscription_utilisateur($db);
              $modif_a_faire = "activation = 'false'";
              modif_cle($_POST['cle'], $db);
              $login_user = $_POST['login'];
              $cle = $_POST['cle'];
              ajout_premier_capteur($db,$login_user, $cle);
              $_SESSION['inscription']=true;
            echo '<meta http-equiv="refresh" content="1; index.php?page=connexion" >';
            //header("Location: index.php?page=connexion&function=connecte");//Redirection vers la page de connexion
          }
          else
           {
            echo '<br/>Erreur : Le login choisi n\'est pas disponible.';
          }
    }

}

else
{
  echo '<br/>Erreur : Les variables du formulaire ne sont pas déclarées.';
}




?>
