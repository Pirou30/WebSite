<?php
    // Controleur pour gérer le formulaire de connexion des utilisateurs
//session_start();

require("modele/gestion_utilisateur.php");


$reponse = mdp($db,$_POST['login']);

if($reponse->rowcount()==0)
{  // L'utilisateur n'a pas été trouvé dans la base de données
    $_SESSION['erreur'] = "l'utilisateur est inconnu</h3>";
  header("Location: index.php?page=connexion");//Redirection vers la page d'erreur
  exit();//Permet l'arret du script
}
else
{ // utilisateur trouvé dans la base de données
  $ligne = $reponse->fetch();

  if(sha1($_POST['mdp'])!=$ligne['mot_de_passe'])
    { // Le mot de passe entré ne correspond pas à celui stocké dans la base de données
      $_SESSION['erreur'] = "le mot de passe est incorrect</h3>";
      //echo '<meta http-equiv="refresh" content="1; index.php?page=connexion" >';
      header("Location: index.php?page=connexion");//Redirection vers la page d'erreur
      exit();//Permet l'arret du script
    }

  else
  { // mot de passe correct, on affiche la page d'accueil
    $_SESSION["UserID"] = $ligne['id_utilisateur'];
    set_session_current_user($db,$_POST['login']);
    //get_rights($db);
    $droit = $_SESSION['type'];
    if ($droit == admin)
    {
      $cookie_name = "login";
      $cookie_value = $_POST['login'];
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

      $cookie_name = "mdp";
      $cookie_value = sha1($_POST['mdp']);
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
      echo '<meta http-equiv="refresh" content="1; index.php?page=conditions_admin"> ';
      exit();//Permet l'arret du script
    }
    elseif ($droit == secondaire)
    {

      $cookie_name = "login";
      $cookie_value = $_POST['login'];
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

      $cookie_name = "mdp";
      $cookie_value = sha1($_POST['mdp']);
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
      //echo '<meta http-equiv="refresh" content="1; index.php?page=dashboard&function=connecte" >';
      header("Location: index.php?page=dashboard&function=connecte");//Redirection vers le dashboard utilisateur secondaire
      exit();//Permet l'arret du script
    }
    elseif ($droit == primaire)
    {
      $cookie_name = "login";
      $cookie_value = $_POST['login'];
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

      $cookie_name = "mdp";
      $cookie_value = sha1($_POST['mdp']);
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

      echo '<meta http-equiv="refresh" content="1; index.php?page=dashboard&function=connecte" >';
      //header("Location: index.php?page=dashboard&function=connecte");//Redirection vers le dashboard utilisateur primaire
      exit();//Permet l'arret du script
    }
  }
}


?>
