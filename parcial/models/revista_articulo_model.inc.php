<?php
    //model
class RevistaArticuloModel {

    public function getAll($xDatos = "") {
        $aDatos = json_decode($xDatos,true);
        $aResponse = [];

        $sql = "SELECT ra.cod_revista, ra.numero, ra.id_articulo, r.titulo_revista,a.titulo_articulo 
        FROM revista_articulo as ra, revista as r, articulo as a 
        where ra.cod_revista = r.cod_revista and ra.numero = r.numero and ra.id_articulo = a.id_articulo";


        $objDB = new database();

        if(!$objDB->getEstadoConexion()) {
            $aResponse["estado"]= "ERROR";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }


        $aResponse["estado"]= "success";
        $aResponse["mensaje"] = "Los datos de obtuvieron correctamente";
        $aResponse["datos"] = $objDB->getQuery($sql);
        $objDB->close();

        return $aResponse;
    }

    public function get($xDatos = "") {
        $aDatos = json_decode($xDatos,true);
        $aResponse = [];

        //El array extraido del json lo convertimos en variables para manejerlo mas facil
        $cod_revista = $aDatos["cod_revista"]; // $aDatos["Valor a buscar en el array associativo"]
        $numero = $aDatos["numero"];
        $id_articulo = $aDatos["id_articulo"];


        if (isset($cod_revista) && isset($numero) && isset ($id_articulo)) {
            $sql = "SELECT ra.cod_revista, ra.numero, ra.id_articulo, r.titulo_revista,
                a.titulo_articulo FROM revista_articulo as ra, revista as r, articulo as a
                where r.cod_revista = {$cod_revista} and a.id_articulo = {$id_articulo} and r.numero = {$numero}";
        };

        $objDB = new DataBase();

        if(!$objDB->getEstadoConexion()) {
            $aResponse["estado"]= "ERROR";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }
        $aResponse["estado"]= "success";
        $aResponse["mensaje"] = "Los datos de obtuvieron correctamente";
        $aResponse["datos"] = $objDB->getQuery($sql);
        $objDB->close();

        return $aResponse;
    }
//cod_revista, numero, id_articulo
public function insert($xDatos){
    $aDatos = json_decode($xDatos, true); // el true signfiica que lo convertimos en un array asociativo y no en un objeto al codigo json.
    $aResponse = [];
    $cod_revista = $aDatos["cod_revista"];
    $numero = $aDatos["numero"];
    $id_articulo = $aDatos["id_articulo"];

    if (strcmp($cod_revista, "") && strcmp($numero, "") && strcmp($id_articulo, "") != 0){
        $sql = "call insert_revista_articulo({$cod_revista},{$numero},{$id_articulo})";
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
public function update($xDatos){
    $aDatos = json_decode($xDatos, true);
    $aResponse = [];
    $cod_revista = $aDatos["cod_revista"];
    $numero = $aDatos["numero"];
    $id_articulo = $aDatos["id_articulo"];

    if (strcmp($cod_revista, "") && strcmp($numero, "") && strcmp($id_articulo, "") != 0){
        $sql = "call update_revista_articulo({$cod_revista},{$numero},{$id_articulo} )";
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
public function delete($xDatos){
    $aDatos = json_decode($xDatos, true);
    $aResponse = [];
    $cod_revista = $aDatos["cod_revista"];
    $numero = $aDatos["numero"];
    $id_articulo = $aDatos["id_articulo"];

    if (strcmp($cod_revista, "") && strcmp($numero, "") && strcmp($id_articulo, "") != 0){
        $sql = "call update_revista_articulo({$cod_revista},{$numero},{$id_articulo} )";
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