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
$objBD->set_charset("utf8");
//Select

$objBD -> real_query("SELECT * FROM cliente ORDER BY id_cliente DESC" );
$resultado = $objBD ->use_result();

echo "<div class ='Probamos'>Resultado_BD:<br> ";
while ($fila = $resultado ->fetch_assoc()){
    echo"cod: " . $fila["id_cliente"] . " - Nombre: " . $fila["nombre"] . "<br>";
}


echo "</div>";


if(isset($_POST['register'])){
    $numero = (string)$_POST['numero'];
    if(strlen($_POST['name']) >= 1 && strlen($numero) == 0){
        $nombre = trim($_POST['name']);
        $consulta = "INSERT INTO cliente(nombre) values ('$nombre')";
        $agg = mysqli_query($objBD,$consulta);
            if($agg){
                echo "<h3>Has agregado correctamente el nombre</h3>";
            }
            else{
                echo "<h3>Algo hiciste mal</h3>";
            }
        }
    elseif(strlen($_POST['name']) >= 1 && $_POST['numero'] >= 0){
        $nombre = trim($_POST['name']);
        $id = $_POST['numero'];
        $consulta = "UPDATE cliente SET nombre = '$nombre' where id_cliente ='$id'";
        $cambio = mysqli_query($objBD,$consulta);
            if($cambio){
                echo "<h3>Modificaste el cliente con el codigo '$id'</h3>";
            }
            else{
                echo "<h3>No se logro ningun cambio</h3>";
            }
        }
    elseif($_POST['numero'] >= 0){
            $id = $_POST['numero'];
            $consulta = "DELETE FROM Cliente WHERE id_cliente = '$id'";
            $cambio = mysqli_query($objBD,$consulta);
                if ($cambio){
                    echo "<h3> Has eliminado al cliente con id '$id'</h3>";
                    }
                else{
                    echo "<h3>Colocale un id causa</h3>";
                    }
        
            }
        
}



$objBD ->close();

?>