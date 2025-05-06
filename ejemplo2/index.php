<?php
include "config.php";
include "includes/class.inc.php";

$BD = new DateBase();

if(!$BD->getEstadoConexion()){
    echo $BD->getMensajeError();
    exit;
}

?>
