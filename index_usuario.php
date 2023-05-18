
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/estilos_user.css">
        <title>Usuario - C.A.H.U.</title>
    </head>

    <body>
        
        <section class="menu">

            <section class="logo">

                <button class="inicio"><a class="inicio_link" href="index_despues.php">C.A.H.U.</a></button>

            </section>

            <section class="opciones_menu">

                <button class="boton_menu" id="primer_boton"><a class="menu_link" href="index_despues.php">CALENDARIO</a></button>
                <button class="boton_menu"><a class="menu_link" href="#">CITAS</a></button>
                <button class="boton_menu"><a class="menu_link" href="index_registro_paciente.php">PACIENTES</a></button>
                <button class="boton_menu" id="ultimo_boton"><a class="menu_link" href="index_historial.php">HISTORIAL</a></button>
                
            </section>

            <section class="opciones_usuario">

                <button class="boton_usuario"><a class="usuario_link" href="#">Notificaciones</a></button>
                <button class="boton_usuario" id="boton_usuario_press"><a class="usuario_link" href="index_usuario.php">Empleado</a></button>

            </section>

        </section>

        <section class="container_full">

            <!-- Columna uno -->
            <section class="datos_uno">

                <!-- Tipo de empleado -->
                <section class="datos_tipo">
                
                    <h3 class="enunciado_tipo">Tipo de empleado</h3>

                    <input type="text" name="profesion" id="profesion" class="respuesta_tipo" disabled>

                </section>

                <!-- Nombre completo empleado -->
                <section class="datos_nombre">

                    <h3 class="enunciado_nombre">Nombre completo</h3>

                    <input type="text" name="name" id="name" class="respuesta_nombre" disabled>

                </section>

                <!-- apellido completo empleado -->
                <section class="datos_id">

                    <h3 class="enunciado_id">Identificacion</h3>

                    <input type="text" name="idUsuarioSalud" id="idUsuarioSalud" class="respuesta_id" disabled>

                </section>

            </section>

            <!-- Columna dos -->
            <section class="datos_dos">

                <!-- Numero de telefono -->
                <section class="datos_telefono">

                    <h3 class="enunciado_telefono">Telefono celular</h3>

                    <input type="text" name="telefono" id="telefono" class="respuesta_telefono" disabled>

                </section>

                    <!-- correo electronico empleado -->
                <section class="datos_correo">

                    <h3 class="enunciado_correo">Correo electronico</h3>

                    <input type="text" name="email" id="email" class="respuesta_correo" disabled>

                </section>

                <!-- Contraseña empleado -->
                <section class="datos_contraseña">

                    <h3 class="enunciado_contraseña">Contraseña</h3>

                    <input type="text" name="password" id="password" class="respuesta_contraseña" disabled>

                </section>

            </section>
            
            <!-- Columna tres -->
            <section class="datos_tres">

                <!-- Numero de foto -->
                <section class="datos_telefono">

                    <h3 class="enunciado_foto">Foto empleado</h3>

                    <input type="file" name="imagen_empleado" id="file">

                    <?php

                        include("controller/db.php");

                        $sql = "SELECT imagen_empleado FROM usuariomedico";

                        $result = mysqli_query($conn, $sql);

                        $row = mysqli_fetch_assoc($result);

                    ?>

                    <?php if ($row['imagen_empleado']) : ?>

                        <img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen_empleado']); ?>" class="foto_empleado">

                    <?php else : ?>

                        <img src="ruta_imagen_predeterminada.jpg" class="foto_empleado">

                        <!-- O mostrar un mensaje -->
                        <p>No hay imagen disponible</p>

                    <?php endif; ?>
                    
                    <input type="button" value="SUBIR" class="subir" onclick="document.getElementById('file').click()">

                    <button class="borrar"><a class="inicio_link" href="#">BORRAR</a></button>

                </section>

            </section>

            <section class="enviar">

                <input type="submit" name="btnRegistrar" class="registrarse" value="CERRAR SESION">

                <button class="inicio_regresar"><a class="inicio_link" href="index_despues.php">IR A CALENDARIO</a></button>

            </section>

        </section>
            
        <section class="container">
            
            <h1 class="nombre">OPCIONES DE EMPLEADO</h1>

        </section> 

    </body>

</html>