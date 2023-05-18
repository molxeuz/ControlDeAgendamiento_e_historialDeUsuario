<?php 
class Crea extends Conexion {
    public function __construct(){
        parent::__construct();
    }
//************ Creacion de doctor************ */
public function create_usuario($idsuario,$nombre,$apellido,$profesion,$telefono,$correo,$estado,$clave){ 
    $sql="INSERT INTO `usuariomedico` (`idUsuarioSalud`, `nombre`, `apellido`, `profesion`, `telefono`, `correo`, `estado`, `clave`) VALUES ('$idsuario', '$nombre', '$apellido', '$profesion', '$telefono', '$correo', '$estado', '$clave');";
    #echo $sql;
    $res = $this->conexion_db->query($sql);
        if($res){
          return true;
        }else{
        return false;
            }   
        }


}
?>