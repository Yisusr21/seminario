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

// stored procedure
    public function getAll(){
    $aResponse = [];
    $sql = "call getall()";

    $objDB = new Database();

    if (!$objDB->getEstadoConexion()){
        $aResponse["estado"] = "error";
        $aResponse["mensaje"] = $objDB->getEstadoConexion();
        return $aResponse;
    }
    
    $aResponse["estado"] = "success";
    $aResponse["mensaje"] = "Los socios encontrados son los siguentes";
    $aResponse["datos"] = $objDB->getQuery($sql);

    $objDB->close();
    return $aResponse;
    }
        
    public function deletep($xdatos){
    $aDatos = json_decode($xdatos,true);
    $aResponse = [];
    if(strcmp($aDatos['id_socio'], "")!=0){
        $sql = "call delete_socio({$aDatos['id_socio']})";
    }
    else{
        $aResponse["mensaje"] = "Ingrese un valor no null por favor.";
    }
    $objDB = new Database();

    if (!$objDB->getEstadoConexion()){
        $aResponse["estado"] = "error";
        $aResponse["mensaje"] = $objDB->getEstadoConexion();
        return $aResponse;
    }
    
    $aResponse["estado"] = "success";
    $aResponse["mensaje"] = "El socio eliminado es {$aDatos['id_socio']}";
    $aResponse["datos"] = $objDB->execute($sql);

    $objDB->close();
    return $aResponse;
    }

    public function insertp($xdatos){
    $aDatos = json_decode($xdatos,true);
    $aResponse = [];
    if(strcmp($aDatos['nombre'], "") !=0){
        $sql = "call insert_clienteNuevo('{$aDatos['nombre']}')";
    }
    else{
        $aResponse["mensaje"] = "Ingrese un valor no null por favor.";
        return $aResponse;
    }
    
    $objDB = new Database();

    if (!$objDB->getEstadoConexion()){
        $aResponse["estado"] = "error";
        $aResponse["mensaje"] = $objDB->getEstadoConexion();
        return $aResponse;
    }
    
    $aResponse["estado"] = "success";
    $aResponse["mensaje"] = "El socio se ha agregado con exito";
    $aResponse["datos"] = $objDB->execute($sql);

    $objDB->close();
    return $aResponse;
    }
    public function updatep($xdatos){
    $aDatos = json_decode($xdatos,true);
    $aResponse = [];
    if(strcmp($aDatos['nombre'], "") && strcmp($aDatos["id_socio"], "") !=0){
        $sql = "call update_socio('{$aDatos['nombre']}', {$aDatos['id_socio']})";
    }
    else{
        $aResponse["mensaje"] = "Ingrese un valor no null por favor.";
        return $aResponse;
    }
    
    
    $objDB = new Database();

    if (!$objDB->getEstadoConexion()){
        $aResponse["estado"] = "error";
        $aResponse["mensaje"] = $objDB->getEstadoConexion();
        return $aResponse;
    }
    
    $aResponse["estado"] = "success";
    $aResponse["mensaje"] = "El socio ha sido actualizado correctamente";
    $aResponse["datos"] = $objDB->execute($sql);

    $objDB->close();
    return $aResponse;
    }
    

}

?>