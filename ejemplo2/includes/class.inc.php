<?php

function __construct() {
    $this->BD = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if ($this-> BD ->connect_errno){
            $this ->errorMenssage = "Error de Conexión (" . $this ->BD -> connect_errno . "):" . $this ->BD -> connect_errno;
            $this -> conexionOK = false;
        }
        else{
            $this ->conexionOK = true;
            $this -> BD -> set_charset("UTF-8");
            $this -> errorMenssage = "Conexion exitosa";
        }
    
    }
?>