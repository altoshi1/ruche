<!----------------------------------------------------------------------------------
    @fichier  apiculteur.php							    						|
    @auteur   Algin TOSHI (Touchard Washington le Mans)								|
    @date     Avril 2018															|
    @version  v1.0 - First release													|
    @details  Page de Menu lorsque l'on se connecte                                    |
 																				    |
------------------------------------------------------------------------------------>
<?php 
require_once 'authentification/espaceUtilisateur/functions.php';
securisation();
require 'corpsPages/header.php';   
?>

<!-------------------------------------------------- MENU UTILISATEUR ---------------------------------------------------------->

<h2>Vous êtes actuellement Connecté</h2><br>
 
        <div class="col-sm-offset-1 col-sm-10">
        <ul class="nav nav-tabs">        
            <a name="boutonRuches" class="btn btn-default" href="authentification/espaceUtilisateur/consulterRuches.php#corpsPage">Vos ruches</a> 
            <a name="boutonCreer"class="btn btn-default" href="authentification/espaceUtilisateur/creerRuche.php#corpsPage">Créer une ruche</a> 
            <a name="boutonInfos" type="submit" class="btn btn-default" href="authentification/espaceUtilisateur/infosPerso.php#corpsPage">Informations personnelles</a> 
           <?php if($_SESSION['auth']->droits == 0): ?>
                        <a name="boutonAdmin" type="submit" class="btn btn-default" href="authentification/espaceUtilisateur/administrateur.php">Administration</a> 
                    <?php else: ?>
                       
					   
                    <?php endif; ?>	
        </ul>
        </div>

<br><br>
 <!--------------------------------------------------  ---------------------------------------------------------->

 <h2> MENU </h2>
                 
  
<?php require 'corpsPages/footer.php'; ?>
