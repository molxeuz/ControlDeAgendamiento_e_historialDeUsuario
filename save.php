<?php
include("controller/db.php");

if(isset($_POST['save'])){

    $identificacion = $_POST['identificacion'];
    $tipoidentificacion = $_POST['tipoidentificacion'];
    $nombre = $_POST['nombre'];
    $telefono  = $_POST['telefono'];
    $correo = $_POST['correo'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $genero = $_POST['genero']; 
    $direccion = $_POST['direccion']; 

    if (!empty($_FILES['imagen_paciente']['tmp_name'])) {
        $imagen_paciente = addslashes(file_get_contents($_FILES['imagen_paciente']['tmp_name']));
    } else {
        $imagen_paciente = NULL;
    }

    $query = "INSERT INTO usuarios (identificacion, tipoidentificacion, nombre, telefono,correo, fechanacimiento, genero, direccion, imagen_paciente) 
    VALUES ('$identificacion', '$tipoidentificacion', '$nombre', '$telefono', '$correo', '$fechanacimiento', '$genero', '$direccion', '$imagen_paciente')";

    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("query Failed");
    }

    $_SESSION['message'] = 'Paciente guardado correctamente!!';
    $_SESSION['message_type'] = 'success';

    header("location:index_registro_paciente.php");

  
}
?>