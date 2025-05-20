<?php
include "autoload.php";
include "header.php";

$BD = new DataBase();
$aDatos =[];
$ObjModel = new CategoriasModel();

if(!$BD->getEstadoConexion()){
    echo $BD->getMensajeError();
    exit;
}

$aDatos = $BD->getQuery("SELECT * FROM cliente ORDER BY id_cliente ASC");
for ($i = 0; $i < sizeof($aDatos); $i++){
    echo "cod: {$aDatos[$i]["id_cliente"]} - Nombre: {$aDatos[$i]["nombre"]} <BR>";
}


// $aResponse = $ObjModel->getAll();

// if (strcmp($aResponse["estado"],"ERROR") == 0){
//     echo "Error: " .$aResponse["mensaje"];
//     exit;
// }

// $aDatos = $aResponse["datos"];

// for ($i = 0; $i < sizeof($aDatos); $i++){
//     echo "cod: " . $aDatos[$i]["id_cliente"]
//     . "- Nombre: " . $aDatos[$i]["nombre"]. "<BR>";
// }




$BD->close()

?>
