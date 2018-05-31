<!----------------------------------------------------------------------------------
    @fichier  connexion.php							    							|
    @auteur   Algin TOSHI (Touchard Washington le Mans)								|
    @date     Avril 2018															|
    @version  v1.0 - First release													|
    @details  header /corps de toute les page du site					     		|
 																				    |
------------------------------------------------------------------------------------>

<?php 
require_once 'authentification/connexionBDD.php'; // Connexion à la bdd
if(session_status()== PHP_SESSION_NONE){
    
        session_start();
    } 
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
    <link href="/css_ruche.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="graphique.js" type="text/javascript"></script>
        <link rel="icon" type="image/png" href="https://icon-icons.com/icons2/881/PNG/512/Honey_icon-icons.com_68739.png" />
</head>

<body>

    <div class="bg">
        <div id="titre" class="container text-center">
        <h1>Ruche connectée <a href="#corpsPage"><img class="text-center iconFleche" src="/image/flecheBas.png" alt=""/></a> </h1>
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
                   <li ><a id="corpsPage" href="/index.php">Accueil</a></li>
                   <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ruche <span class="caret"></span></a>
                    <ul class="dropdown-menu" >
                    <?php

                    $sql = "SELECT * FROM `ruches`";
                    $stmt = $bdd->query($sql);
                    while ($ruche = $stmt->fetchObject()){
                     // Connexion à la bdd
					    echo '<li>';
					    echo '<a href="/choixRuche.php?id=' . $ruche->idRuches . '">Ruche '. $ruche->idRuches . '</a>';
                        echo "</li>";
                   }

                   ?>

                   
                    </ul>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    
                    <?php if(isset($_SESSION['auth'])): ?>
                    <li><a href="/apiculteur.php"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['auth']->login ?></a></li>
                        <li><a href="/authentification/deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="/connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>   
                    <?php endif; ?>											    
                </ul>
            </div>
            </div>
        </nav>
        <br>
                     <center><img class="miel" src="/image/honey.png" alt=""/></center>
<br/>
 <?php if(isset($_SESSION['flash'])): ?>     
     <div class="row">
        <div class="col-sm-offset-3 col-sm-6 alert alert-warning text-center numColor">  
            <ul><?php foreach($_SESSION['flash'] as $msg): ?> 
                <?= $msg; ?><br/>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
            <?php unset ($_SESSION['flash']); ?>
<?php endif; ?>

        
