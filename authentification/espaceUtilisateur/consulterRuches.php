<?php 
require_once 'functions.php';
securisation();
require '../../corpsPages/headerApiculteur.php'; 
require_once '../connexionBDD.php'; // Connexion à la bdd 
$user_id = $_SESSION['auth']->idapiculteurs;


 
        
        $sql = "SELECT * FROM `ruches` WHERE `apiculteurs_idapiculteurs` =  ". $user_id ;

        $stmt = $bdd->query($sql);


?>

<!-------------------------------------------------- MENU UTILISATEUR ---------------------------------------------------------->

<h2>Vous êtes actuellement Connecté</h2><br>
 
        <div class="col-sm-offset-1 col-sm-10">
        <ul class="nav nav-tabs">        
            <a name="boutonRuches" class="btn btn-default" href="consulterRuches.php">Vos ruches</a> 
            <a name="boutonCreer"class="btn btn-default" href="creerRuche.php">Créer une ruche</a> 
            <a name="boutonInfos" type="submit" class="btn btn-default" href="infosPerso.php">Informations personnelles</a> 
            <a name="boutonAdmin" type="submit" class="btn btn-default" href="administrateur.php">Administration</a> 
        </ul>
        </div>

<br><br>
 <!-------------------------------------------------- CONSULTER RUCHES ---------------------------------------------------------->
Ruches</br>
<center>
<?php
    echo '<div class="table-responsive"><table class="table table-striped table-condensed">'; // Début Tableau
				echo "<tr><th>Ruche N°</th><th>Ville</th><th>Description</th></tr>";  // 1ère ligne tableau
				$trouve=false;                                                        
                while ($ruche = $stmt->fetchObject()){

					echo "<tr>";
					echo "<td>" . $ruche->idRuches . "</td>";
                    echo "<td>" . $ruche->ville . "</td>";
                    
                    echo "<td>" . $ruche->descriptionRuche . "</td>";
                    echo "</tr>";
                    $trouve=true;

                }
                echo "</table></div>";
                if (!$trouve) echo "<p>Aucune ruche pour ".$_SESSION['nom']. " !</p>";
?>

</center>
  
<?php require '../../corpsPages/footer.php'; ?>





