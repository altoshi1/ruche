$(function ()
{

    var chart;
    var couleurs = ["#FF0000", "#FFFF00", "#40FF00", "#00FFFF", "#0000FF", "FF00FF", "000000"];
    var options = {};


    options.chart = {
        renderTo: 'graphique',
        height: 500,
        marginTop: 70,
        marginLeft: 100,
        marginRight: 100,
        backgroundColor: '#F9F9F9',
        type:'spline',
        zoomType: 'xy'
    };

    options.credits = {
        enabled: true,
        text: '© SNIR Touchard LE MANS',
        href: 'http://github.com/Kevin-Chevalier/Projet-Ruche'
    };

    options.colors = couleurs;
    options.title = {
        text: "Mesures de la ruche",
        margin: 10
    };

    //options.tooltip = {
    //    formatter: function() {
    //        return "Date : " + this.x + " Température : " + this.y + " °C" ;
    //    }
    //};
    
    options.tooltip = {
			shared: true,
			borderColor: '#4b85b7',
			backgroundColor: '#edf1c8',
			dateTimeLabelFormats:{second:"%A %e %B à %Hh%M"}
    };

    options.yAxis = [
        { //Primary Axis
            gridLineWidth: 1,
				labels: {
					format: '{value}',
					style: {
						
					}
				},
				title: {
					text: 'Temperature',
					style: {
						
					}
				}
},
{ // Secondary yAxis
				gridLineWidth: 0,
				title: {
					text: 'Humidité',
					style: {
						
					},
				},	
				
				labels: {
					format: '{value}',
					style: {
						
					}
				},
				opposite: true

},
    ];

    options.xAxis = {
        type: 'datetime',
			startOnTick: false,
            labels: {
                overflow: 'justify',
                format: '{value:%A %e %B %H:%M}'
            },
        crosshair: true

        
    };


    options.plotOptions = {
        spline: {
                lineWidth: 2,   // épaisseur de la ligne
		states: {
                    hover: {
                        lineWidth: 2  // épaisseur de la ligne quand la souris est au dessus
                    }
                },
                marker: {
                    enabled: false   // disable the point marker.
                },
                pointInterval: 600000 // pointInterval définit l'intervalle des valeurs sur x (600s soit 10 min)
        }
        ,
        series: {
            
        }
    };        

    options.series = [];
    
 idRuche = $(".numColor").text();
 console.log("ruche id : " + idRuche);
     
    
$.getJSON('obtenirValeurs.php?id='+idRuche, function(valeurs) {
    console.log(valeurs);
    options.series = valeurs.series;
    console.log(Date.parse(valeurs.pointStart));
    options.plotOptions.series.pointStart =  Date.parse(valeurs.pointStart);
    chart = new Highcharts.Chart(options);  
});

Highcharts.setOptions({
        lang: {
            months: ["Janvier "," Février "," Mars "," Avril "," Mai "," Juin "," Juillet "," Août ","Septembre "," Octobre "," Novembre "," Décembre"],
            weekdays: ["Dimanche "," Lundi "," Mardi "," Mercredi "," Jeudi "," Venderdi "," Samedi"],
			shortMonths: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil','Août', 'Sept', 'Oct', 'Nov', 'Déc'],
            decimalPoint: ',',
            resetZoom: 'Reset zoom',
            resetZoomTitle: 'Reset zoom à 1:1',
			downloadPNG: "Télécharger au format PNG image",
            downloadJPEG: "Télécharger au format JPEG image",
            downloadPDF: "Télécharger au format PDF document",
            downloadSVG: "Télécharger au format SVG vector image",
            exportButtonTitle: "Exporter image ou document",
            printChart: "Imprimer le graphique",
			noData: "Aucune donnée à afficher",			
            loading: "Chargement..."			
            }
		
});

});