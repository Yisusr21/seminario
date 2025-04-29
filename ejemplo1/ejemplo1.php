<?php 
$host = "localhost";
$usuario = "root";
$passowrd = "";
$base_de_datos = "ejemplo1";

// $objBD = new mysqli($host,$usuario,$passowrd,$base_de_datos);
// if ($objBD -> connect_errno){
//     echo "Hubo un intento de error en la base de datos: (". $objBD-> connect_errno .")" . $objBD -> connect_errno;
// }

// else {
//     echo "Conexcion satisfactoria papaaa " . $objBD ->host_info;
// }


$objBD = new mysqli($host,$usuario,$passowrd,$base_de_datos);
if ($objBD -> connect_errno){
    echo "Hubo un intento de error en la base de datos: (". $objBD-> connect_errno .")" . $objBD -> connect_errno;
    exit;
}

//Select

$objBD -> real_query("SELECT * FROM cliente ORDER BY id_cliente DESC" );
$resultado = $objBD ->use_result();

echo "Resultado:<br> ";
while ($fila = $resultado ->fetch_assoc()){
    echo"cod: " . $fila["id_cliente"] . " - Nombre: " . $fila["nombre"] . "<br>";
}

$objBD ->close();
?>