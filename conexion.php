<?php

require_once('config.php');

class Conexion{
    
    protected $conexion_db;

    public function __construct(){
    
        $this->conexion_db=new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME); 
        
        if($this->conexion_db->connect_errno){
            echo "Conexion Falló";
        }
       
    }    

  public function sanitize($var){
  $return = mysqli_real_escape_string($this->conexion_db, $var);
  return $return;
}
    //Funcion para poner Null en campos vacios
    public function set_vacio($verificar){
     if(empty($verificar)){
        $null = "NULL";
       
     }else{
         $null = $verificar;
     }
        return $null;  
    }
    
    //Función para poner  NULL al volver campos vacios
    public function read_vacio($verificar){
     if($verificar == "NULL"){
        $null = " ";
       
     }else{
         $null = $verificar;
     }
        return $null;  
    }
    
}

?>