<?php

class CategoriasModel_Socio {
    public function getAll(){
        $aResponse = [];
        $sql = "SELECT * FROM socio ORDER BY id_socio ASC";
        $objDB = new Database();


        if (!$objDB->getEstadoConexion()){
            $aResponse["estado"] ="ERROR";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }

        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "";
        $aResponse["datos"] = $objDB->getQuery($sql);
        $objDB->close();

        return $aResponse;
    }

    public function getById($xid_socio){
        $aResponse = [];
        $sql = "SELECT * FROM socio WHERE id_cliente = $xid_socio";
        $objDB = new Database();

        if (!$objDB->getEstadoConexion()){
            $aResponse["estado"] = "ERROR";
            $aResponse["mensaje"] = $objDB->getEstadoConexion();
            return $aResponse;
        }

        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "";
        $aResponse["datos"] = $objDB->getQuery($sql);
        $objDB->close();
        
        return $aResponse;
    }

    public function insert($aDatos){
        $aResponse = [];
        $sql = "INSERT INTO socio(nombre)
                VALUES ('". $aDatos['nombre']."')";

        $objDB = new DataBase();
        
        if (!$objDB->getEstadoConexion()){
            $aResponse["estado"] = "ERROR";
            $aResponse["Mensaje"] = $objDB->getEstadoConexion();
            return $aResponse;
        }
        
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "El socio se dio de alta correcamente";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close();
        return $aResponse;
        }
    public function update($aDatos){
        $aResponse = [];
        
        $sql = "UPDATE socio SET socio.nombre = '". $aDatos["nombre"] ."' 
        WHERE socio.id_cliente =". $aDatos["id_cliente"];

        $objDB = new Database();

        if (!$objDB->getEstadoConexion()){
            $aResponse["estado"] = "error";
            $aResponse["mensaje"] = $objDB->getEstadoConexion();
            return $aResponse;
        }
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "El socio se actualizó correctamente";
        $aResponse["datos"] = $objDB->execute($sql);
        
        $objDB->close();
        return $aResponse;


    }
}


?>
