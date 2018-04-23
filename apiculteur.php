<?php
//---------------------------------------------------------------------
// Page protégée pour l'apiculteur
// 
//---------------------------------------------------------------------
include "authentification/authcheck.php" ;
   // Vérification des droits pour cette page uniquement les apiculteurs droit=1
   if ($_SESSION['droits']<>'1') { header("Location: index.php");};
   
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ruche Connectée</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css_ruche.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/png" href="https://icon-icons.com/icons2/881/PNG/512/Honey_icon-icons.com_68739.png" />
</head>

<body>

    <div class="bg">
        <div id="titre" class="container text-center">
        <h1>Ruche connectée <a href="#corpsPage"><img class="text-center iconFleche" src="image/flecheBas.png" alt=""/></a> </h1>
        </div>
    </div>
   
    
<div class="container-fluid text-center">    
<div class="row content">
<div class="col-sm-1 sidenav"></div>

<div class="col-sm-10 tab1" >
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
            </div>
                
            <div class="collapse navbar-collapse" id="myNavbar">
                
                <ul class="nav navbar-nav">
                   <li ><a id="corpsPage" href="index.php">Accueil</a></li>
                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ruche <span class="caret"></span></a>
                    <ul class="dropdown-menu" >
                    <li><a href="choixRuche.php">Ruche 1</a></li>
                    <li><a href="choixRuche.php">Ruche 2</a></li>
                    <li><a href="choixRuche.php">Ruche 3</a></li>
                    </ul>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="authentification/deconnexion.php"><span class="glyphicon glyphicon-log-in"></span> Déconnexion</a></li>
                 
                </ul>
            </div>
            </div>
        </nav>
        <br>
                     <center><img class="miel" src="image/honey.png" alt=""/></center>

        <h1>Vous êtes actuellement Connecté</h1><br>

        <div class="col-sm-offset-1 col-sm-10">
        <ul class="nav nav-tabs">        
            <button data-toggle="tab" name="boutonRuches" type="submit" class="btn btn-default" href="#home">Vos ruches</button></li>
            <button data-toggle="tab" name="boutonCreer" type="submit" class="btn btn-default" href="#menu1">Créer une ruche</button></li>
            <button data-toggle="tab" name="boutonInfos" type="submit" class="btn btn-default" href="#menu2">Informations personnelles</button></li>
            <button data-toggle="tab" name="boutonAdmin" type="submit" class="btn btn-default" href="#menu3">Administration</button></li>
        </ul>
        </div>

<br><br>
 <div class="tab-content">
<div id="home" class="tab-pane fade in active">
        <h3>Ruches</h3>     <br>
        <div class="contenu text-left">        
            <!--RUCHES -->


              
                 Ruche 1
                 Ruche 2
                  <br>
              </div>       


            <!--RUCHES -->  
    </div>
     
<div id="menu1" class="tab-pane fade">
        <h3>Création d'une nouvelle ruche</h3>      <br>
        <div class="contenu text-left"> 

            <!--CREER -->


            
               <button> Créer un Nouvelle ruche </button>
                <br>
            </div>       


            <!--CREER -->
    </div>
     
     
<div id="menu2" class="tab-pane fade">
        <h3>Informations personnelles</h3><br>
        <div class="contenu text-left"> 
            <!--INFOS -->

    Nom : <br>
    Prénom : <br>
    Adresse e-mail : <br>
                
                    <?php echo var_dump($_SESSION); ?>
                    <br>
                </div>       


            <!--INFOS -->
     </div> 
    
<div id="menu3" class="tab-pane fade">
        <h3>Administration</h3><br>
        <div class="contenu text-left"> 

            <!--ADMINISTRATION -->


           
              Créer un compte 
               <br>
           </div>       


           <!--ADMINISTRATION --> 

    </div>
  </div>
</div>
    <div class="col-sm-1 sidenav"></div>
</div>
</div>


    
                <footer>
                                <div class="container text-center">
                                <h4>Ruche connectée 2018 Toshi</h4>
                                </div>
                </footer>


</body>
</html>


