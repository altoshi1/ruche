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
        <link rel="icon" type="image/png" href="//icon-icons.com/icons2/881/PNG/512/Honey_icon-icons.com_68739.png" />

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
                    <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                 
                </ul>
            </div>
            </div>
        </nav>
        <br>
                     <center><img class="miel" src="image/honey.png" alt=""/></center>

        <h1>Inscription
        <small> <br/><br/>Merci de renseigner vos informations </small></h1>
        <br>
      
        
<div class="contenu text-left"> 
    
<form class="form-horizontal" action="./authentification/postInscription.php" method="POST">
    <br/>
    <div class="row">
        <div class="col-md-offset-3 col-md-3">
            <div class="form-group">
            <label for="Nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
            </div>
        </div>
        
        <div class="col-md-offset-1 col-md-3">
            <div class="form-group">
            <label for="Prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-3 col-md-7">
            <div class="form-group">
            <label for="Email">Adresse e-mail</label>
            <input type="mail" class="form-control" id="email" name="email" placeholder="Entrez votre adresse e-mail" required>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-offset-3 col-md-3">
            <div class="form-group">
            <label for="user">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="Nom d'utilisateur" required>
            </div>
        </div>

        <div class="col-md-offset-1 col-md-3">
            <div class="form-group">
            <label for="Password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-offset-3 col-md-3">
            <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-earphone"></span>
            <input type="text" class="form-control" name="telephone" placeholder="Téléphone" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-3">
            <button name="boutonInscription" type="submit" class="btn btn-default">Envoyer mes informations</button>
        </div>
    </div>
</form> 
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
