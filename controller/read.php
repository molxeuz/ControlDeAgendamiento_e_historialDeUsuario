<?php
require_once "./conexion.php";

class Consulta extends Conexion{
    public function __construct(){
        parent::__construct();
    }
//*********** Consulta usuarios **********//
public function usuariomedico($iddoc){
    $busqueda=$this->conexion_db->query("SELECT * FROM `usuariomedico` WHERE `idUsuarioSalud` = $iddoc");
    $resultado=$busqueda->fetch_all(MYSQLI_ASSOC);
    return $resultado;
}
}