<?php 
require_once 'functions.php';
securisation();
require '../../corpsPages/headerApiculteur.php'; 
require_once '../connexionBDD.php'; // Connexion à la bdd 
$user_id = $_SESSION['auth']->idapiculteurs;


 
        
        $sql = "SELECT * FROM `ruches` WHERE `apiculteurs_idapiculteurs` =  ". $user_id ;

        $stmt = $bdd->query($sql);

        if(isset ($_GET['id'])){
             $sql2 = "SELECT * FROM `ruches` WHERE `idRuches` =  ". $_GET['id'] ;
             $stmt2 = $bdd->query($sql2);
             $ruche2 = $stmt2->fetchObject();
        }

?>

<!-------------------------------------------------- MENU UTILISATEUR ---------------------------------------------------------->

<h2>Vous êtes actuellement Connecté</h2><br>
 
        <div class="col-sm-offset-1 col-sm-10">
         <ul class="nav nav-tabs">        
            <a name="boutonRuches" class="btn btn-default" href="consulterRuches.php">Vos ruches</a> 
            <a name="boutonCreer"class="btn btn-default" href="creerRuche.php">Créer une ruche</a> 
            <a name="boutonInfos" type="submit" class="btn btn-default" href="infosPerso.php">Informations personnelles</a> 
			     <?php if($_SESSION['auth']->droits == 0): ?>
                        <a name="boutonAdmin" type="submit" class="btn btn-default" href="administrateur.php">Administration</a> 
                    <?php else: ?>
                      
					   
                    <?php endif; ?>	
           
        </ul>
        </div>

<br><br>
 <!-------------------------------------------------- CONSULTER RUCHES ---------------------------------------------------------->
<center><h3><small>Vos ruches</small></h3></center></br>

<?php
	echo '<div class="row">';
    echo '<div class="col-md-offset-2 col-md-8 text-left"><table class="table table-striped table-condensed">'; // Début Tableau
				echo "<tr><th>N°</th><th>Ville</th><th>Description</th></tr>";  // 1ère ligne tableau
				$trouve=false;                                                        
                while ($ruche = $stmt->fetchObject()){

					echo "<tr>";
						echo "<td>" ;
							
								echo '<a href="consulterRuches.php?id=' . $ruche->idRuches . '">Ruche '. $ruche->idRuches . '</a>';
							
						echo "</td>";
						
						echo "<td>" . $ruche->ville . "</td>";
						echo "<td>" . $ruche->descriptionRuche . "</td>";
                    echo "</tr>";
                    $trouve=true;

                }
                echo "</table></div></div>";
                if (!$trouve) echo "<p>Aucune ruche pour ".$_SESSION['nom']. " !</p>";
				if (isset($_GET['id'])){

				echo "<h1>Ruche [<a class=\"numColor\">" . $_GET['id'] . "</a>]</h1>";
                }else{
echo "<h1>Ruche</h1>";
}
?>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script> 


<script type="text/javascript">
   
		// quelques variables globales  
  		var map,geocoder,marker;  
		var adresse	; 
		var previsions=5	;
		var latlng	;
		
		$(function()	
		{
	 		geocoder = new google.maps.Geocoder() ;   // un décodeur d’adresse
	  	       
	               	adresse     = $('#adresse').val()   ;              
	                geocoder.geocode({'address':adresse},Analyse);// décodage de l’adresse               
	  	    
			
			$(".dropdown-menu li").click(function()  //menu prevision nb jours
			{
				 previsions = $(this).text()	; 		// gets innerHTML of clicked li	
				// alert(previsions);
				 $.ajax({						
					url: "http://api.openweathermap.org/data/2.5/forecast/daily?lat="+latlng.lat()+"&lon="+latlng.lng()+"&cnt="+previsions+"&appid=d6c92200ff55c7154e0c59694a542a84",	
		            type: 'GET',
		            dataType:"JSON",	// si JSON, alors $.parseJSON(data) n'est pas utile
		            success: function(data) {     displayJsonData(data);      },
		            error: function(jqXHR, textStatus, error) {	 alert( "error 2: " + jqXHR.responseText);      }
		          });		   
			});
		});        

		

        function Analyse(results, status) 
        {
		
             /* Si l'adresse a pu être géolocalisée */
             if (status == google.maps.GeocoderStatus.OK) 
             {
			 	 	latlng = results[0].geometry.location;
                   /* Récupération de sa latitude et de sa longitude */
                   
                   var myOptions = 
                   {
                         zoom : 12,
                         center : results[0].geometry.location,
                         mapTypeId : google.maps.MapTypeId.ROADMAP
                   };
             		/* Affichage de la carte centrée sur cette position géographique */
                   map = new google.maps.Map($('#mappy')[0],myOptions);
				   
				   // Création d’un marker et positionnement sur la carte  
                   marker = new google.maps.Marker({  
                      position: latlng	,  
                      map: map , // 
                     
                    });
					  
					google.maps.event.addListener(function(event) // place un marker quand on clique sur la zone
					{
						
						$.ajax({						
							url: "http://api.openweathermap.org/data/2.5/forecast/daily?lat="+latlng.lat()+"&lon="+latlng.lng()+"&cnt="+$("#jours option:selected").text()+"&appid=d6c92200ff55c7154e0c59694a542a84",	
				         
				            type: 'GET',
				            dataType:"JSON",	
							
				            function(data) 
							{
				          
				              displayJsonData(data);
				            }
				            
				          });				
					});
             }
             else 
                alert("Le géocodage n\'a pu être effectué car: " + status);
        }


          function displayJsonData(objetJSON)
		  {
		  		
				
				CONTENU	=	"<table class='table table-striped table-condensed '>"	;
				CONTENU	+=	"<thead> <tr>      <th>Température</th>   <th>Pression </th>  <th>Humidité</th> <th>Temps (précipitation)</th>  <th> Date </th></tr>  </thead>"	;
				
				for(i=0	;	i<objetJSON.list.length	;	i++)
				{
						CONTENU+="<tr >"	;
					
					  	CONTENU+="<td>"+  Math.round(eval(objetJSON.list[i].temp.day-273))+ " °C</td>"	;

					  	CONTENU+="<td>"+ objetJSON.list[i].pressure+ " hPa</td>"	;
					  	CONTENU+="<td>"+ objetJSON.list[i].humidity+ " %</td>"	;
						
					  	CONTENU+="<td>"+ objetJSON.list[i].weather[0].main+ "</td>"	;
					  
						
						CONTENU+="<td>"+ new Date(objetJSON.list[i].dt*1000).toString()+ "</td>"	;
						
						CONTENU += "</tr>"	;
				}
				
				CONTENU += "</table>"	;			
				$('#meteo').html(CONTENU);	
						
        }   
		
		
		   
        </script>

<br/>


<div class="contenu text-left"> 
    
    <form class="form-horizontal" action=""  method="POST">
    <br/> <h4 class="text-center little">Données météo à l'éxterieur de la ruche.</h4>   <br/> 
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
          
           <center> <label for="ville">Localisation</label> </center>
            <input type="text" class="form-control" id="adresse" name="ville" value="<?php if(isset ($ruche2)) echo $ruche2->ville; else echo "Le Mans"; ?>"   >
           
        </div>   </div>
		<br>
		
		
		
    <div class="row">
	        	 <div class="col-md-offset-2 col-md-8 text-center">   
			  			<div id="mappy" style="height: 100px"></div>
				</div>
				</div><br>	
				
	<div class="row">
			
			<div class="col-sm-offset-4 col-sm-5">
		 
							<div class="dropdown"><label>Prévision : </label>
								<button class="btn btn-default dropdown-toggle col-sm-offset-1" type="button" data-toggle="dropdown">Nombre de jours <span class="caret"></span></button>
								  	<ul class="dropdown-menu" id="jours">
								    	<li><a href="#jours">2</a></li>
								    	<li><a href="#jours">4</a></li>
								    	<li><a href="#jours">5</a></li>
								    	<li><a href="#jours">6</a></li>
								    	<li><a href="#jours">7</a></li>
								    	<li><a href="#jours">8</a></li>
								    	<li><a href="#jours">9</a></li>
								    	<li><a href="#jours">10</a></li>
								    	<li><a href="#jours">11</a></li>
								    	<li><a href="#jours">12</a></li>
								    	<li><a href="#jours">13</a></li>
								    	<li><a href="#jours">14</a></li>
								  	</ul> 
							</div> 
						</div>
		
        
    </div><br>
	<div class="row">
	        	 <div class="col-md-offset-2 col-md-8 text-center">  
			  			<div id="meteo" style="height: 500px; overflow:scoll" ></div>
				</div>
                        </div>	
 <br>
           <br><br>
<br/> <h4 class="text-center little">Données à l'intérieur de la ruche.</h4> 
            
<div class="contenu text-left">
<div id="graphique" style="padding: 5px;"></div>

                <div id="date">
                    <input type="text" name="debut" placeholder="Date de début" id="dateDeDebut"/>
                    <input type="text" name="fin" placeholder="Date de fin" id="dateDeFin"/>
                </div>

            
<div class="localisation"></div>
         
</div>
	 
	 

<br>
   
</form> 
</div>

<?php require '../../corpsPages/footer.php'; ?>





