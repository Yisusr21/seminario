<?php

class CategoriasModel {
    public function getAll(){
        $aResponse = [];
        $sql = "SELECT * FROM cliente ORDER BY id_cliente ASC";
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

    public function getById($xid_categoria){
        $aResponse = [];
        $sql = "SELECT * FROM cliente WHERE id_cliente = $xid_categoria";
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
        $sql = "INSERT INTO cliente(nombre)
                VALUES ('". $aDatos['nombre']."')";

        $objDB = new DataBase();
        
        if (!$objDB->getEstadoConexion()){
            $aResponse["estado"] = "ERROR";
            $aResponse["Mensaje"] = $objDB->getEstadoConexion();
            return $aResponse;
        }
        
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "El cliente se dio de alta correcamente";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close();
        return $aResponse;
        }
    public function update($aDatos){
        $aResponse = [];
        
        $sql = "UPDATE cliente SET cliente.nombre = '". $aDatos["nombre"] ."' 
        WHERE cliente.id_cliente =". $aDatos["id_cliente"];

        $objDB = new Database();

        if (!$objDB->getEstadoConexion()){
            $aResponse["estado"] = "error";
            $aResponse["mensaje"] = $objDB->getEstadoConexion();
            return $aResponse;
        }
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "El cliente se actualizó correctamente";
        $aResponse["datos"] = $objDB->execute($sql);
        
        $objDB->close();
        return $aResponse;


    }
}


?>
