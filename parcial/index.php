<?php
include "autoload.php";

$objBD = new database();

if(!$objBD->getEstadoConexion()){
    echo $objBD ->getMensajeError();
    exit;
}
else{
    echo "Estamos dentro de la base de datos";
}


?>