<?php

class socio{

    public function get($xfilter = ""){
    $aFilter = json_decode($xfilter, true);
    $aResponse = [];
    $sql = "SELECT * FROM socio ";

    if(strcmp($aFilter["filtro"], "")!=0){
        $sql .= "WHERE " . $aFilter ["filtro"]." ";
    }
    $sql .= "ORDER BY id_socio ASC";
    $objDB = new Database();

    if (!$objDB->getEstadoConexion()){
        $aResponse["estado"] = "error";
        $aResponse["mensaje"] = $objDB->getEstadoConexion();
        return $aResponse;
    }
    
    $aResponse["estado"] = "success";
    $aResponse["mensaje"] = "El socio que se ha encontrado es el siguiente";
    $aResponse["datos"] = $objDB->getQuery($sql);

    $objDB->close();
    return $aResponse;
    }

    public function insert($xdatos= ""){
        $aDatos = json_decode($xdatos, true);
        $aResponse = [];
        $sql = "INSERT INTO socio(nombre) values('{$aDatos["nombre"]}')";

    $objDB = new Database();

    if (!$objDB->getEstadoConexion()){
        $aResponse["estado"] = "error";
        $aResponse["mensaje"] = $objDB->getEstadoConexion();
        return $aResponse;
    }

    $aResponse["estado"] = "success";
    $aResponse["mensaje"] = "El socio se dio de alta correctamente";
    $aResponse["datos"] = $objDB->execute($sql);

    $objDB ->close();
    return $aResponse;
    }

    public function update($xupdate =""){
        $aDatos = json_decode($xupdate, true);
        $aResponse = [];
        $sql = "UPDATE socio set socio.nombre = ";

        if(strcmp($aDatos["nombre"],"")!=0 && strcmp($aDatos["numero"],"") !=0 ){
            
            $sql.= "'{$aDatos["nombre"]}' WHERE cliente.id_cliente = {$aDatos["numero"]} ";
        }

        else{
            $aResponse["mensaje"] = "Complete todos los campos por favor";
            return $aResponse;
        }

        $objDB = new Database();

        if (!$objDB->getEstadoConexion()){
            $aResponse["estado"] = "error";
            $aResponse["mensaje"] = $objDB->getEstadoConexion();
            return $aResponse;
        }

        $aResponse["estado"]= "success";
        $aResponse["mensaje"]= "socio numero id: {$aDatos["numero"]} actualizado correctamente";
        $aResponse["datos"] = $objDB->execute($sql);

        $objDB -> close();
        return $aResponse;
    }

}

?>