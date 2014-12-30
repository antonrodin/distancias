<?php

/* 
 * Anton Zekeriev Rodin
 * Check Haversine Formula
 * Basado en ESTO: http://www.taringa.net/posts/hazlo-tu-mismo/14270601/PHP-Calcular-distancia-entre-dos-coordenadas.html
 */

//Test Distances
// Madrid, Barcelona, Valencia
// Latitud, Longitud
$madrid = array(40.4166909, -3.7003454);
$barcelona = array(41.387917, 2.1699187);
$valencia = array(39.4702393, -0.3768049);
$moscu = array(55.750668, 37.632688);

/**
 * Formula para sacar distancia entre dos puntos dada la latitud y longitud de dos puntos.
 * Esta distancia tiene que estar dada en notación DECIMAL y no en SEXADECIMAL (Grados, minutos... etc)
 * @param type $latitud 1
 * @param type $longitud 1
 * @param type $latitud 2
 * @param type $longitud 2
 * @return type, Distancia en Kms, con 1 decimal de precisión
 */
function harvestine($lat1, $long1, $lat2, $long2){ 

    //Distancia en kilometros en 1 grado distancia.
    //Distancia en millas nauticas en 1 grado distancia: $mn = 60.098;
    //Distancia en millas en 1 grado distancia: 69.174;
    //Solo aplicable a la tierra, es decir es una constante que cambiaria en la luna, marte... etc.
    $km = 111.302;
    
    //1 Grado = 0.01745329 Radianes    
    $degtorad = 0.01745329;
    
    //1 Radian = 57.29577951 Grados
    $radtodeg = 57.29577951; 

    //La formula que calcula la distancia en grados en una esfera, llamada formula de Harvestine. Para mas informacion hay que mirar en Wikipedia
    //http://es.wikipedia.org/wiki/F%C3%B3rmula_del_Haversine
    $dlong = ($long1 - $long2); 
    $dvalue = (sin($lat1 * $degtorad) * sin($lat2 * $degtorad)) + (cos($lat1 * $degtorad) * cos($lat2 * $degtorad) * cos($dlong * $degtorad)); 
    $dd = acos($dvalue) * $radtodeg; 

    return round(($dd * $km), 2);
}

echo harvestine($madrid[0], $madrid[1], $barcelona[0], $barcelona[1]);
echo "<br>";
echo harvestine($madrid[0], $madrid[1], $moscu[0], $moscu[1]);