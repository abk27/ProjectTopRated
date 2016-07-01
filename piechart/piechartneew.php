<?php
		include "C:\\wamp\www\SwotAnalysis\piechart\wrappers 2\php-wrapper\fusioncharts.php";
		
		$columnChart = new FusionCharts(
            "column2d", 
            "ex1" , 
            "600", 
            "400", 
            "chart-1", 
            "json", 
            '{  
               "chart":
               {  
                  "caption":"Harry\'s SuperMart",
                  "subCaption":"Top 5 stores in last month by revenue",
                  "numberPrefix":"$",
                  "theme":"ocean"
               },
               "data":
               [  
                  {  
                     "label":"Bakersfield Central",
                     "value":"880000"
                  },
                  {  
                     "label":"Garden Groove harbour",
                     "value":"730000"
                  },
                  {  
                     "label":"Los Angeles Topanga",
                     "value":"590000"
                  },
                  {  
                     "label":"Compton-Rancho Dom",
                     "value":"520000"
                  },
                  {  
                     "label":"Daly City Serramonte",
                     "value":"330000"
                  }
               ]
        }');
		
		echo "<div id='chart1'></div>";

		$columnChart->render();


?>