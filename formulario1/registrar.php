<?php

include ("con_db.php");

if(isset($_POST['register'])){
    if (strlen($_POST['name']) >= 1 && strlen($_POST['email'])>= 1){
        $nombre = trim($_POST['name']);
        $email = trim($_POST ['email']);
        $fechareg = date ('y-m-d');
        $consulta = "INSERT INTO formulario(email, nombre,fechareg) values ('$email','$nombre', '$fechareg')";
        $resultado = mysqli_query($conex,$consulta);
            if($resultado){
            echo"<h3>Te Has registrado correctamente</h3>";
            }
            else{
            echo"<h3>Ha ocurrido un error manito</h3>";
            }
    }

    else{
        echo"<h1>Completa los campos pa</h1>";
    }

    
}   
?>