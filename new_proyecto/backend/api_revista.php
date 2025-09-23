<?php
include "autoload.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-Witdh, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$response =[];

if (strcmp($_SERVER["REQUEST_METHOD"], "POST")!= 0){
    $response["estado"] = "Error de solicitud";
    $response["mensaje"] = "Metodo soportado";
    echo json_encode($response);
    exit();
}

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$aUrl = explode("/",$url);

$metodo_a_ejecutar = $aUrl[sizeof($aUrl)-1];
$datos = file_get_contents("php://input");

$objModel = new RevistaModel();
$response = $objModel->{$metodo_a_ejecutar}($datos);
echo json_encode($response);

?>