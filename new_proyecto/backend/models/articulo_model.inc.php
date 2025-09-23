<?php
//modelo para tabla articulo

class ArticuloModel {
        public function getAll($xfilter = "") {
        $aFilter = json_decode($xfilter, true);
        $aResponse = [];
        $sql = "SELECT * FROM articulo";

        $objBD = new DataBase();
        
        if (!$objBD->getEstadoConexion()) {
            $aResponse["estado"] = "ERROR";
            $aResponse["mensaje"] = $objBD->getMensajeError();
            return $aResponse;
    }
        $aResponse["estado"]= "success";
        $aResponse["mensaje"]= "Articulos obtenidos correctamente";
        $aResponse["datos"] = $objBD->getQuery($sql);
        $objBD->close();
        return $aResponse;
        }

    //Get id
    public function getById($xDatos) {
        $aDatos = json_decode($xDatos, true);
        $aResponse = [];
        $id = $aDatos["id_articulo"];

        if (isset($id)){
            $sql = "call get_articulo({$id})";
        }
        else{
            $aResponse["estado"] = "ERROR";
            $aResponse["mensaje"] = "Falta el parametro id_articulo";
            return $aResponse;}
        
        $objBD = new database();
        if (!$objBD->getEstadoConexion()) {
            $aResponse["estado"] = "ERROR";
            $aResponse["mensaje"] = $objBD->getMensajeError();
            return $aResponse;
        }
        $aResponse["estado"]= "success";
        $aResponse["mensaje"]= "Articulo encontrado correctamente";
        $aResponse["datos"]= $objBD->getQuery($sql);
        $objBD->close();
        return $aResponse;  
    }
    //insert
    public function insert($xDatos) {
        $aDatos = json_decode($xDatos,true);
        $aResponse= [];
        $titulo_articulo = $aDatos["titulo_articulo"];
        $pagina_inicio = $aDatos["pagina_inicio"];
        $pagina_fin = $aDatos["pagina_fin"];
    
        if(isset($titulo_articulo) && isset($pagina_inicio) && isset($pagina_fin)){
        $sql = "call insert_articulo('{$titulo_articulo}', {$pagina_inicio}, {$pagina_fin})";
        }

        else{
            $aResponse["mensaje"] = "completa todos los campos por favor.";
        }

        $objDB = new DataBase();
        
        if (!$objDB->getEstadoConexion()) {
            $aResponse["estado"] = "ERROR";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }

        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "El articulo se insertó correctamente.";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close();
        return $aResponse;
    }

    //actualizar articulo
    public function update($xDatos) {
        $aDatos = json_decode($xDatos, true);
        $aResponse = [];
        $id_articulo = $aDatos["id_articulo"];
        $titulo_articulo = $aDatos["titulo_articulo"];
        $pagina_inicio = $aDatos["pagina_inicio"];
        $pagina_fin = $aDatos["pagina_fin"];
        
        if(isset($id_articulo)){
            $sql = "call update_articulo({$id_articulo},'{$titulo_articulo}', {$pagina_inicio}, {$pagina_fin})";
        }
        $objDB = new DataBase();

        if (!$objDB->getEstadoConexion()) {
            $aResponse["estado"] = "ERROR";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }
        $aResponse["estado"] = "success";
        $aResponse["mensaje"]= "Se actualizo el articulo correctamente";
        $aResponse["datos"]= $objDB->execute($sql);
        $objDB->close();
        return $aResponse;
    }
    
    //funcion delete
    public function delete($xDatos) {
        $aDatos = json_decode($xDatos, true);
        $aResponse = [];

        $id_articulo = intval($aDatos['id_articulo']); // 
        $sql = "DELETE FROM articulo WHERE id_articulo = $id_articulo";
        $objDB = new DataBase();

    if (!$objDB->getEstadoConexion()) {  // verificamos el estado de la conexion
            $aResponse["estado"] = "ERROR";
            $aResponse["mensaje"] = $objDB->getMensajeError();
            return $aResponse;
        }
    // si no hubo error:
        $aResponse["estado"] = "success";
        $aResponse["mensaje"] = "Se elimino el articulo correctamente";
        $aResponse["datos"] = $objDB->execute($sql);
        $objDB->close(); //cierra conexion
        return $aResponse;
    }
}
?>