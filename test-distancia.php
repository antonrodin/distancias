<?php

require_once 'harvestine.php';

// Test Distances
// Madrid, Barcelona, Valencia
// Latitud, Longitud
$madrid = array(40.4166909, -3.7003454);
$barcelona = array(41.387917, 2.1699187);
$valencia = array(39.4702393, -0.3768049);
$moscu = array(55.750668, 37.632688);


echo harvestine($madrid[0], $madrid[1], $barcelona[0], $barcelona[1]);
echo "<br>";
echo harvestine($madrid[0], $madrid[1], $moscu[0], $moscu[1]);