<?php

    include("controller/db.php");

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $query = "SELECT * FROM usuarios WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1){
            
            $row = mysqli_fetch_array($result);
            $identificacion = $row['identificacion'];
            $tipoidentificacion = $row['tipoidentificacion'];
            $nombre = $row['nombre'];
            $telefono  = $row['telefono'];
            $correo = $row['correo'];
            $fechanacimiento = $row['fechanacimiento'];
            $genero = $row['genero']; 
            $direccion = $row['direccion']; 
        }

    }

    if(isset($_POST['guardar'])){
        
        $id = $_GET['id'];
        $identificacion = $_POST['identificacion'];
        $tipoidentificacion = $_POST['tipoidentificacion'];
        $nombre = $_POST['nombre'];
        $telefono  = $_POST['telefono'];
        $correo = $_POST['correo'];
        $fechanacimiento = $_POST['fechanacimiento'];
        $genero = $_POST['genero']; 
        $direccion = $_POST['direccion']; 

        $query = "UPDATE usuarios set identificacion = '$identificacion',tipoidentificacion = '$tipoidentificacion', nombre = '$nombre',
        telefono = '$telefono',correo= '$correo', fechanacimiento = '$fechanacimiento',
        genero = '$genero', direccion = '$direccion'  WHERE id= $id";

        mysqli_query($conn, $query);
        
        $_SESSION['message'] = 'Editado con exito';
        $_SESSION['message_type'] = 'success';
        header("location: index_lista_paciente.php");

    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/estilos_editar_paciente.css">
        <title>Editar - registrar pacientes - C.A.H.U.</title>
    </head>
    
    <body>

        <section class="menu">

            <section class="logo">

                <button class="inicio_logo"><a class="inicio_link" href="#">C.A.H.U.</a></button>

            </section>

            <section class="opciones_menu">

                <button class="boton_menu" id="primer_boton"><a class="menu_link" href="index_despues.php">CALENDARIO</a></button>
                <button class="boton_menu"><a class="menu_link" href="#">CITAS</a></button>
                <button class="boton_menu" id="boton_usuario_press"><a class="menu_link" href="index_registro_paciente.php">PACIENTES</a></button>
                <button class="boton_menu" id="ultimo_boton"><a class="menu_link" href="index_historial.php">HISTORIAL</a></button>
                
            </section>

            <section class="opciones_usuario">

                <button class="boton_usuario"><a class="usuario_link" href="#">Notificaciones</a></button>
                <button class="boton_usuario"><a class="usuario_link" href="index_usuario.php">Empleado</a></button>

            </section>

        </section>
        
        <form action="index_editar_paciente.php?id=<?php echo $_GET['id']; ?>" method="POST">

            <section class="container_full">

                    <!-- Columna uno -->
                    <section class="datos_uno">

                        <!-- Tipo de identificacion -->
                        <section class="datos_tipo">

                            <h3 class="enunciado_tipo">Tipo de identificacion</h3>

                            <select name="tipoidentificacion" class="respuesta_tipo" value="<?php echo $tipoidentificacion; ?>">
                                <option value="NIP">NIP</option>
                                <option value="NIT">NIT</option>
                                <option value="TI">TI</option>
                                <option value="PAP">PAP</option>
                            </select>

                        </section>

                        <!-- Identificacion del paciente -->
                        <section class="datos_identificacion_paciente">

                            <h3 class="enunciado_identificacion">Identificacion</h3>

                            <input type="text" name="identificacion" class="respuesta_identificacion" value="<?php echo $identificacion; ?>">

                        </section>

                        <!-- nombre del paciente -->
                        <section class="datos_nombre">

                            <h3 class="enunciado_nombre_paciente">Nombre completo</h3>

                            <input type="text" name="nombre" class="respuesta_nombre_paciente" value="<?php echo $nombre; ?>">

                        </section>

                        <!-- Fecha de nacimiento paciente -->
                        <section class="datos_fecha">

                            <h3 class="enunciado_fecha">Fecha nacimiento</h3>

                            <input type="date" name="fechanacimiento" class="respuesta_fecha" value="<?php echo $fechanacimiento; ?>">

                        </section>

                    </section>

                    <!-- Columna dos -->
                    <section class="datos_dos">

                        <!-- Numero de telefono -->
                        <section class="datos_telefono">

                            <h3 class="enunciado_telefono">Telefono celular</h3>

                            <input type="text" name="telefono" class="respuesta_telefono" value="<?php echo $telefono; ?>">

                        </section>

                        <!-- correo electronico empleado -->
                        <section class="datos_correo">

                            <h3 class="enunciado_correo">Correo electronico</h3>

                            <input type="email"  name="correo" class="respuesta_correo" value="<?php echo $correo; ?>">

                        </section>

                        <!-- Genero del paciente -->
                        <section class="datos_genero">

                            <h3 class="enunciado_genero">Genero</h3>

                            <select name="genero" class="respuesta_genero" value="<?php echo $genero; ?>">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>

                        </section>

                        <!-- Direccion del paciente -->
                        <section class="datos_direccion">

                            <h3 class="enunciado_direccion">Direccion</h3>

                            <input type="text" name="direccion" class="respuesta_direccion" value="<?php echo $direccion; ?>">

                        </section>

                    </section>
                    
                    <!-- Columna tres -->
                    <section class="datos_tres">

                        <!-- Numero de foto -->
                        <section class="datos_foto">
                            
                            <h3 class="enunciado_foto">Foto del paciente</h3>

                            <input type="file" name="imagen_paciente" id="file">

                            <?php

                                include("controller/db.php");

                                $sql = "SELECT imagen_paciente FROM usuarios";

                                $result = mysqli_query($conn, $sql);

                                $row = mysqli_fetch_assoc($result);

                            ?>

                            <img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen_paciente']); ?>" class="foto_empleado">

                            <input type="button" value="Subir" class="subir" onclick="document.getElementById('file').click()">

                            <button class="borrar"><a class="inicio_link" href="#">Borrar</a></button>

                        </section>

                    </section>

                    <section class="enviar">

                        <input type="submit" name="guardar" class="registrarse" value="EDITAR">

                        <button class="inicio"><a class="inicio_link" href="index_lista_paciente.php">REGRESAR</a></button>

                    </section>

            </section>
            
            <section class="container">
                
                <h1 class="nombre">EDITAR PACIENTE</h1>

            </section>

        </form>

    </body>

</html>