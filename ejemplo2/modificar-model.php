<?php
include "autoload.php";

$ObjModel = new CategoriasModel();

$aDatos = [];

$aDatos["id_cliente"] = 4;
$aDatos["nombre"] = "De los Angeles Mendoza";

$aResponse = $ObjModel->update($aDatos);

if(strcmp($aResponse["estado"],"error") == 0){
    echo "Error: " . $aResponse["mensaje"];
    exit;
}

echo $aResponse["mensaje"];

?>

