<?php
include "autoload.php";

$ObjModel = new CategoriasModel_Socio();

$aDatos = [];

$aDatos["nombre"] = "De los Angeles Mendoza";

$aResponse = $ObjModel->insert($aDatos);

if(strcmp($aResponse["estado"],"error") == 0){
    echo "Error: " . $aResponse["mensaje"];
    exit;
}

echo $aResponse["mensaje"];

?>