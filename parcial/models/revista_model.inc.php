<?php
// Modelo para la tabla revista

class RevistaModel {
    public function get($xfilter="") { //metodo get
        $aFilter = json_decode($xfilter, true); //convertir json en array 
        $aResponse = [];
        // Si viene algo en el filtro, lo agregamos al SQL
        if (strcmp($aFilter["filtro"], "") != 0)
        $sql = "call get_revista ({$aFilter["filtro"]})";
        
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
/*
    // obtener una revista por su codigo id
    public function getById($xDatos) {
        $aDatos = json_decode($xDatos, true);
        $aResponse= [];
        //$sql = ----------------------
        $objDB = new DataBase();
    
        if (!$objDB->getEstadoConexion()) {
            $aResponse["estado"] = "ERROR";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }

        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "";
        //$aResponse["datos"] = $objDB->execute($sql);
        $objDB->close();
        return $aResponse;
    }  
    // insertar nueva revista
    public function insert($xDatos) {
        $aDatos = json_decode($xDatos, true);
        $numero = $aDatos['numero'];
        $titulo = $aDatos['titulo'];
        $fecha_publicacion = $aDatos['fecha_publicacion'];

        $aResponse = [];

        //llamar al procedimiento
        $sql = "CALL insert_revista('$numero' ,'$titulo' , '$fecha_publicacion')";
        $objDB = new DataBase();

        // Verificar si la conexión a la base de datos fue exitosa
    if (!$objDB->getEstadoConexion()) {  // es un método de la clase DataBase.
        $aResponse["estado"] = "ERROR";
        $aResponse["mensaje"] = $objDB->getMensajeError();
        return $aResponse;
    }
    $objDB->execute($sql);
        // si no hubo error:
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "El cliente se dio de alta satisfactoriamente";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close(); //cierra conexion
        return $aResponse;
}
*/
}