<?php

/**
 * Tienes que crear una base de datos "municipios" y volcar ahí el "poblaciones-espana.sql" y tunear un poco la clase My_MySQL
 * Ambos archivos se encuentran en la carpeta sql del proyecto
 * Es una base de datos de municipios, provincias y comunidades autonomas... la puedes encontrar gratis po internet.
 */
require_once 'sql/mysql.class.php';
$mysql = new My_Mysql;
$mysql->connect();

$query = "SELECT * FROM `municipios` LIMIT 10";
$mysql->run($query);

while($row = $mysql->result->fetch_object()){
    echo $row->municipio;
}