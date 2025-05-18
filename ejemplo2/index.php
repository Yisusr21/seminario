<?php
include "config.php";
include "includes/class.inc.php";

$BD = new DateBase("localhost","root","","ejemplo1");

if(!$BD->getEstadoConexion()){
    echo $BD->getMensajeError();
    exit;
}

$aDatos = $BD->getQuery("SELECT * FROM cliente ORDER BY id_cliente ASC");
for ($i = 0; $i < sizeof($aDatos); $i++){
    echo "cod:" . $aDatos[$i]["id_cliente"] . "Nombre: " .$aDatos[$i]["nombre"]. "<BR>";
}


$BD->close()

?>
