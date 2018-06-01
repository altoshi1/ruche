<?php

        
require_once("dbconfig.inc");
function connexionBDD() {


// connexion à la base
    try {

        $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE);
    } catch (Exception $ex) {
        die('<br /> Pb de connexion serveur BD : ' . $ex->getMessage());
    }
    return $bdd;
}



function obtenirValeur() {

    if (!isset($_GET['debut'])){
    	$debut = new DateTime();
	$debut->sub(new DateInterval('PT24H'));
        $to = $debut->format('Y/m/d');
        
    }
    
    
    $bdd = connexionBDD();
    $requete = $bdd->prepare('SELECT *  FROM `mesures` WHERE `ruches_idRuches` = :idRuche AND date > :dateDebut');
    $requete->bindParam(':idRuche', $_GET['id']); 
    $requete->bindParam(':dateDebut', $to);
    $requete->execute() or die(print_r($requete->errorInfo()));
    $temperature = array();
    $humidite = array();
    $pression = array();
    $poids = array();
    $eclairement = array();
    $date = array();
    $datecomp = array();


    while($ligne = $requete->fetch()){
        array_push($temperature, floatval($ligne['tempval']));
        array_push($humidite, floatval($ligne['humidval']));
        array_push($pression, floatval($ligne['pressionval']));
        array_push($poids, floatval($ligne['poidsval']));
        array_push($eclairement, floatval($ligne['eclairementval']));
        array_push($date, date($ligne['date'])); //rentre la date dans le tableau 
        array_push($datecomp, date($ligne['date'])); //inverse la date pour permettre la comparaison avec les datepicker.
    }

    $valeurs = array();
    $tooltip = array();


    $series = array();
    $tooltip['valueSuffix'] = " °C";
    $serie['name'] = "Température";
    $serie['type']  = "spline";
    $serie['tooltip'] = $tooltip;
    $serie['data']  = $temperature;
    array_push($series, $serie);

    $tooltip['valueSuffix'] = " %";
    $serie['name'] = "Humidité";
    $serie['type']  = "spline";
    $serie['tooltip'] = $tooltip;
    $serie['data']  = $humidite;
    array_push($series, $serie);

    $tooltip['valueSuffix'] = " hPa";
    $serie['name'] = "Pression";
    $serie['type']  = "spline";
    $serie['tooltip'] = $tooltip;
    $serie['data']  = $pression;
    array_push($series, $serie);

    $tooltip['valueSuffix'] = " lux";
    $serie['name'] = "Eclairement";
    $serie['type']  = "spline";
    $serie['tooltip'] = $tooltip;
    $serie['data']  = $eclairement;
    array_push($series, $serie);


    $tooltip['valueSuffix'] = " Kg";
    $serie['name'] = "Poids";
    $serie['type']  = "spline";
    $serie['tooltip'] = $tooltip;
    $serie['yAxis']=1;
    $serie['data']  = $poids;
    array_push($series, $serie);


    $valeurs['series'] = $series;
    
    $to1 = $debut->format('d M Y 00:00:00');
    
    $valeurs['pointStart'] = $to1;  //la date au format GMT)
    

    echo json_encode($valeurs);
}


header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
obtenirValeur(connexionBDD());

