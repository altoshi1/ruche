<?php


if(!isset($_POST['mdp']))
{
  header("Location: ../connexion.php");
  exit();
}
if(!isset($_POST['login']))
{
  header("Location: ../connexion.php");
  exit();
}

if($_POST['login']==NULL)
{
  header("Location: ../connexion.php?&erreur=Requiert un identifiant et un mot de passe.");
  exit();
}




require_once('definitions.inc.php');

$sql = sprintf("SELECT * FROM apiculteurs WHERE apiculteurs.login='%s'", $_POST['login']);

// connexion � la base
try {

    $bdd = new PDO('mysql:host=' . SERVEUR . ';dbname=' . BASE, UTILISATEUR,PASSE);
} catch (Exception $ex) {
   die('<br /> Pb de connexion serveur BD : ' . $ex->getMessage());
}

// ex�cution de la requ�te  

    $Reponse = $bdd->query($sql); 

        
        

        $ligne_rep = $Reponse->fetch();
        $Reponse->closeCursor();


// v�rification des identifiants login et mdp par rapport � ceux enregistr�s dans la base
if (!($_POST['login']==$ligne_rep['login'] && $_POST['mdp']==$ligne_rep['mdp'])){
  header("Location: ../connexion.php?&erreur=Incorrectes! V�rifiez vos identifiant et mot de passe.");
  
  exit();
}


// A partir de cette ligne l'utilisateur est authentifi�
// donc nouvelle session
session_start();

// �criture des variables de session pour cet utilisateur

        $_SESSION['last_access']=time();
        $_SESSION['ipaddr']=$_SERVER['REMOTE_ADDR'];
        $_SESSION['ID_user'] = $ligne_rep['idapiculteurs'];
		$_SESSION['login'] = $ligne_rep['login'];
        $_SESSION['nom'] = $ligne_rep['nom'];
		$_SESSION['email'] = $ligne_rep['email'];
		$_SESSION['droits'] = $ligne_rep['droits'];
		


// enregistrement de la date et heure de son passage dans le champ date_connexion de la table utilisateur
        $idapiculteurs  = $ligne_rep['idapiculteurs'];
        $sql = "UPDATE `apiculteurs` SET `date_connexion` = CURRENT_TIMESTAMP  WHERE `apiculteurs`.`idapiculteurs` =$idapiculteurs LIMIT 1" ;
        $Reponse = $bdd->query($sql);


// s�lection de la page de menu en fonction des droits accord�s

switch ($ligne_rep['droits']) {
    case 0:  // Utilisateur r�voqu� sans droit
         header("Location: ../index.php?&erreur=r�voqu�! ");
         break;
    case 1:  // Administrateur tous les droits (webmestre)
         header("Location: ../apiculteur.php");
         break;
    
    default:
         header("Location: ../index.php?erreur=droits inconnu! ");
    }

?>
