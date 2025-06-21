<?php
// Modelo para la tabla revista

class RevistaModel {
    public function get_r($xfiltro="") { //metodo get
        $aFilter = json_decode($xfiltro, true); //convertir json en array 
        $aResponse = [];
        $sql = "select * from revista"; //Si no se coloca ningun string en el json. La variable toma este valro
        $filtro = $aFilter["filtro"] ?? ""; // El "??" Significa que si el valor es null se usa ""
        $numero = $aFilter["numero"] ?? "";

        // Esta condicion nos verifica si el array json no esta vacio. Si es true agrega a la variable $sql
        if (strcmp($filtro, "") != 0){
        $sql = "call get_revista ({$filtro})";
        }  
        elseif(strcmp($numero,"")!=0){
        $sql = "select * from revista where numero = {$numero}"; //Elseif Si la primera condicion no se cumple pasa a siguiente

        }
        elseif(strcmp($filtro,"") ==0 && strcmp($numero, "") == 0){
        $sql = "select * from revista";
        }
        else{
            $aResponse["Mensaje"] = "Por favor complete los campos";
        }
        
        $objDB = new DataBase();

        if (!$objDB->getEstadoConexion()) {
            $aResponse["estado"] = "ERROR";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }
    
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "";
        $aResponse["datos"] = $objDB->getQuery($sql);
    
        $objDB->close();
    
        return $aResponse;
}
    // insertar nueva revista
    public function insert_r($xDatos) {
        $aDatos = json_decode($xDatos, true);
        $numero = $aDatos['numero'];
        $titulo = $aDatos['titulo'];
        $fecha_publicacion = $aDatos['fecha_publicacion'];

        $aResponse = [];

        if(strcmp($numero,"") != 0){
            $sql = "CALL insert_revista('{$numero}' ,'{$titulo}' , '{$fecha_publicacion}')";
        }
        else{
            $aResponse ["Mensaje"] = "Completa todos los campos para ingresar una revista";
        }

        //llamar al procedimiento
        
        $objDB = new DataBase();

        // Verificar si la conexión a la base de datos fue exitosa
    if (!$objDB->getEstadoConexion()) {  // es un método de la clase DataBase.
        $aResponse["estado"] = "ERROR";
        $aResponse["mensaje"] = $objDB->getMensajeError();
        return $aResponse;
    }
        // si no hubo error:
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "La revista se agrego correctamente";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close(); //cierra conexion
        return $aResponse;
}
public function delete_r($xDatos) {
        $aDatos = json_decode($xDatos, true);
        $aResponse = [];
        $cod_revista = $aDatos['cod_revista'];

        if(strcmp($cod_revista,"") != 0){
            $sql = "call delete_revista({$cod_revista})";
        }
        else{
            $aResponse ["Mensaje"] = "Completa todos los campos para ingresar una revista";
        }

        //llamar al procedimiento       
        $objDB = new DataBase();

        // Verificar si la conexión a la base de datos fue exitosa
    if (!$objDB->getEstadoConexion()) {  // es un método de la clase DataBase.
        $aResponse["estado"] = "ERROR";
        $aResponse["mensaje"] = $objDB->getMensajeError();
        return $aResponse;
    }
        // si no hubo error:
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "Se elimino correctamente la revista";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close(); //cierra conexion
        return $aResponse;
}

public function update_r($xDatos) {
        $aDatos = json_decode($xDatos, true);
        $aResponse = [];

        $cod_revista = $aDatos['cod_revista'];
        $numero = $aDatos['numero'];
        $titulo = $aDatos['new_titulo'];
        $fecha_publicacion = $aDatos['fecha_publicacion'];


        if(strcmp($cod_revista,"") != 0){
            $sql = "CALL update_revista('{$cod_revista}','{$numero}','{$titulo}','{$fecha_publicacion}')";
        }
        else{
            $aResponse ["Mensaje"] = "Completa todos los campos para ingresar una revista";
        }

        //llama a la base de datos      
        $objDB = new DataBase();

        // Verificar si la conexión a la base de datos fue exitosa
    if (!$objDB->getEstadoConexion()) {  // es un método de la clase DataBase.
        $aResponse["estado"] = "ERROR";
        $aResponse["mensaje"] = $objDB->getMensajeError();
        return $aResponse;
    }
        // si no hubo error:
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "La revista de codigo {$cod_revista} ha sido actualizada";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close(); //cierra conexion
        return $aResponse;
}
//cod_revista, numero, id_articulo
public function insert_ra($xDatos){
    $aDatos = json_decode($xDatos, true);
    $aResponse = [];
    $cod_revista = $aDatos["cod_revista"];
    $numero = $aDatos["numero"];
    $id_articulo = $aDatos["id_articulo"];

    if (strcmp($cod_revista, "") && strcmp($numero, "") && strcmp($id_articulo, "") != 0){
        $sql = "insert into revista_articulo(cod_revista, numero, id_articulo)
        values ({$cod_revista}, {$numero}, {$id_articulo})";
    }

    else {
        $aResponse["Mensaje"] = "Ingresa todos los valores para agregar el articulo en la revista";
    }

    $objDB = new database();

    if (!$objDB->getEstadoConexion()){
        $aResponse["estado"] = "ERROR";
        $aResponse["mensaje"] = $objDB->getMensajeError();
    }
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "Has insertado un nuevo articulo en la revista numero {$numero}";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close(); //cierra conexion
        return $aResponse;
}
public function update_ra($xDatos){
    $aDatos = json_decode($xDatos, true);
    $aResponse = [];
    $cod_revista = $aDatos["cod_revista"];
    $numero = $aDatos["numero"];
    $id_articulo = $aDatos["id_articulo"];

    if (strcmp($cod_revista, "") && strcmp($numero, "") && strcmp($id_articulo, "") != 0){
        $sql = "update revista_articulo revista_articulo.id_articulo = {$id_articulo}
        where cod_revista = {$cod_revista} and numero = {$numero}";
    }

    else {
        $aResponse["Mensaje"] = "Ingresa todos los valores para agregar el articulo en la revista";
    }

    $objDB = new database();

    if (!$objDB->getEstadoConexion()){
        $aResponse["estado"] = "ERROR";
        $aResponse["mensaje"] = $objDB->getMensajeError();
    }
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "Has insertado un nuevo articulo en la revista numero {$numero}";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close(); //cierra conexion
        return $aResponse;
}


}