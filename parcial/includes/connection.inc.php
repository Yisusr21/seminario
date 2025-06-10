<?php

class database{
    private $objDB;
    private $conexionOK;
    private $errorMessage;

    public function getEstadoConexion(){
        return $this->conexionOK;
    }

    public function getMensajeError(){
        return $this->errorMessage;
    }


    function __construct(){
        $this->objDB = new mysqli(host, user, pass, database);
        if($this->objDB->connect_errno){
            $this->errorMessage = "Error de conexcion: 
            ({$this->objDB->connect_errno}) 
            {$this->objDB->connect_error}";
        }
        else{
            $this->conexionOK = true;
            $this->objDB->set_charset("utf8");
        }
    }

        public function getQuery($xsql){
        $this->objDB->real_query($xsql);
        $resultado = $this->objDB->use_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function execute($xsql){
        if (!$this->objDB->query($xsql)){
            return false;
        }
        else{
            return true;
        }
    }

    public function close(){
        $this->objDB->close();
    }

};
?>
