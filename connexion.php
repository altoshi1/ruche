<!----------------------------------------------------------------------------------
    @fichier  connexion.php							    							|
    @auteur   Algin TOSHI (Touchard Washington le Mans)								|
    @date     Avril 2018															|
    @version  v1.0 - First release													|
    @details  Page de connexion											     		|
 																				    |
------------------------------------------------------------------------------------>

<?php
$message = array();
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){ // si post = n'est pas vide lancer l'execution
 require_once 'authentification/connexionBDD.php';
 require_once 'authentification/espaceUtilisateur/functions.php';
 
    $req = $bdd->prepare('SELECT * FROM apiculteurs WHERE login = :username');
    $req->execute(['username' => $_POST['username']]);
    $user = $req-> fetch();
    if(isset($user->mdp)){
        if(password_verify($_POST['password'], $user->mdp)){
            session_start();
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['success'] = 'Bonjour ' . $_SESSION['auth']->prenom . ' !' . ' Vous êtes maintenant connecté.';
        
            header('Location: apiculteur.php');
            exit();
        
        }else{

        $message['erreurConnexion']= "Mot de passe ou identifiant inexistant.";

        }
   }
    else
    $message['erreurConnexion']= "Mot de passe ou identifiant inexistant.";

}


require 'corpsPages/header.php';
?>

   
                <h1>Connexion</h1><br>
        <?php if(!empty($message)): ?>
    <div class="row">
        <div class="col-md-offset-3 col-md-6 alert alert-warning text-center numColor">
            <ul>
                <?php foreach($message as $error): ?>
                <?= $error; ?><br/>
                <?php endforeach; ?>    
            </ul>
        </div>
    </div>    
<?php endif; ?>
     <center class="numColor">  </center><br><br>
     <form class="form-horizontal" action="" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-5" for="usr">Nom d'utilisateur :</label>
                <div class="col-sm-3">
                <input name="username" type="text" class="form-control" id="usr" placeholder="Entrez votre nom d'utilisateur" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="pwd">Mot de passe:</label>
                <div class="col-sm-3">
                    <input name="password" type="password" class="form-control" id="pwd" placeholder="Entrez votre mot de passe"required>
                    <a href="passePerdu.php" ><small>Mot de passe oublié ?</small></a>
                </div>
        </div>
<br>
        <div class="form-group">
                <div class="col-sm-offset-5 col-sm-3">
                <button name="bouton1"type="submit" class="btn btn-default">Se connecter</button>
            </div>
        </div>
    <br>
        <div class="col-sm-offset-7 col-sm-5">
                <div class="">
                <a class="btnDemandeInscription" href="inscription.php" >Demande d'inscription</a>
            </div>
            </div>
    </form> 
         
</div>
<?php require 'corpsPages/footer.php'; ?>
