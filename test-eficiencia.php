<?php

require_once 'sql/mysql.class.php';
require_once 'harvestine.php';

//Ejemplo de Latitud y Longitud
//Es de Madrid Capital
$latitud = 40.4166909;
$longitud = -3.7003454;

//Conectarse a MySQL
$mysql = new My_Mysql;
$mysql->connect();

/**
 * 
 * Suponiendo que 1 Grado de Latitud o Longitud son 111Km
 * Utilizaremos esta constante que podemos variar...
 * Es decir:
 * 
 * 0.1 ~ Radio de 11 Kms
 * 0.2 ~ Radio de 22 Kms
 * 0.5 ~ Radio de 50 kms
 * 
 */
$constante = 0.2;

//Aplicamos la constante a las cordenadas
$lat_min = $latitud - $constante;
$lat_max = $latitud + $constante;
$lng_min = $longitud - $constante;
$lng_max = $longitud + $constante;

/**
 * Contruimos la Consulta, acotando la latitud y longitud
 * Según la constante
 */
$query = "SELECT * "
        . "FROM `municipios`"
        . "WHERE `latitud` >= {$lat_min} AND "
        . "`latitud` <= {$lat_max} AND "
        . "`longitud` >= {$lng_min} AND "
        . "`longitud` <= {$lng_max}";
        
//Run Query
$mysql->run($query);

//Show Result
echo "<ul>";
while($row = $mysql->result->fetch_object()){
    echo "<li>";
    echo "{$row->municipio} - ";
    echo harvestine($latitud, $longitud, $row->latitud, $row->longitud);
    echo "km </li>";
}
echo "</ul>";