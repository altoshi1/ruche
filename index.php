<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ruche Conectée</title>
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
                    <li><a href="#">Ruche 1</a></li>
                    <li><a href="#">Ruche 2</a></li>
                    <li><a href="#">Ruche 3</a></li>
                    </ul>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                 
                </ul>
            </div>
            </div>
        </nav>
    <br>
    
        
             <center><img class="miel" src="image/honey.png" alt=""/></center>
            <h1>Présentation du système</h1>
            <br><br>
    <div class="contenu text-left"> 
            
            <h4>La ruche connectée est un outil de suivi en temps réel de colonies d’abeilles.
                Elle consiste à équiper la ruche d’abeilles en y ajoutant des capteurs pour permettre 
                d’obtenir différentes informations tel que la température intérieure, l’humidité le poids et le comptage des abeilles.
                Le système est architecturée autour de deux systèmes :
                <br>Un système à côté de la ruche composée d’une raspberry pi avec ses capteurs, sa caméra et son alimentation autonome.
                <br>Un système serveur Web, base de données sous linux debian avec un modem GSM . Ce système est nommé Data Aggregator<br>
            </h4><br>
            <center> <img src="image/synoptique.png" alt=""/></center>
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


