<?php

include "autoload.php";
include "header.php";

$Objmodel = new CategoriasModel();

$aDatos = [];

$aDatos["nombre"] = "Rafael Jimenez";

$aResponse = $Objmodel->insert($aDatos);

if(strcmp($aResponse["estado"],"error") == 0){
    echo "Error: " . $aResponse["mensaje"];
    exit;
}

echo $aResponse["mensaje"];


?>