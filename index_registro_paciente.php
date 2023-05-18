<?php

    include("controller/db.php");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/estilos_registro_paciente.css">
        <title>Registrar pacientes - C.A.H.U.</title>
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
        
        <form action="save.php" method="POST" enctype="multipart/form-data">

            <section class="container_full">

                    <!-- Columna uno -->
                    <section class="datos_uno">

                        <!-- Tipo de identificacion -->
                        <section class="datos_tipo">
                    
                            <input type="text" class="enunciado_tipo" value="Tipo de identificacion" disabled>
                            
                            <select name="tipoidentificacion" class="respuesta_tipo">
                                <option value="NIP">NIP</option>
                                <option value="NIT">NIT</option>
                                <option value="TI">TI</option>
                                <option value="PAP">PAP</option>
                            </select>

                        </section>

                        <!-- Identificacion del paciente -->
                        <section class="datos_identificacion_paciente">

                            <input type="text" class="enunciado_identificacion" value="Identificacion" disabled>

                            <input type="text" name="identificacion" class="respuesta_identificacion" placeholder="Ingresa la id" required>

                        </section>

                        <!-- nombre del paciente -->
                        <section class="datos_nombre">

                            <input type="text" class="enunciado_nombre_paciente" value="Nombre completo" disabled>

                            <input type="text" name="nombre" class="respuesta_nombre_paciente" placeholder="ingresa el nombre" required>

                        </section>

                        <!-- Fecha de nacimiento paciente -->
                        <section class="datos_fecha">

                            <input type="text" class="enunciado_fecha" value="Fecha nacimiento" disabled>

                            <input type="date" name="fechanacimiento" class="respuesta_fecha" required>

                        </section>

                    </section>

                    <!-- Columna dos -->
                    <section class="datos_dos">

                        <!-- Numero de telefono -->
                        <section class="datos_telefono">

                            <input type="text" class="enunciado_telefono" value="Telefono celular" disabled>

                            <input type="text" name="telefono" class="respuesta_telefono" placeholder="Ingresa el numero" required>

                        </section>

                        <!-- correo electronico empleado -->
                        <section class="datos_correo">

                            <input type="text" class="enunciado_correo" value="Correo electronico" disabled>

                            <input type="email"  name="correo" class="respuesta_correo" placeholder="Ingresa el correo" required>

                        </section>

                        <!-- Genero del paciente -->
                        <section class="datos_genero">

                            <input type="text" class="enunciado_genero" value="Genero" disabled>

                            <select name="genero" class="respuesta_genero">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>

                        </section>

                        <!-- Direccion del paciente -->
                        <section class="datos_direccion">

                            <input type="text" class="enunciado_direccion" value="Direccion" disabled>

                            <input type="text" name="direccion" class="respuesta_direccion" placeholder="Ingresa direccion" required>

                        </section>

                    </section>
                    
                    <!-- Columna tres -->
                    <section class="datos_tres">

                        <!-- Numero de foto -->
                        <section class="datos_foto">

                            <input type="text" class="enunciado_foto" value="Foto del paciente" disabled>

                            <div id="preview" class="foto_empleado"></div>

                            <input type="file" name="imagen_paciente" id="file">

                            <input type="button" value="Subir" class="subir" onclick="document.getElementById('file').click()">

                            <button class="borrar"><a class="inicio_link" href="#">Borrar</a></button>

                        </section>

                    </section>

                    <section class="enviar">

                        <input type="submit" name="save" class="registrarse" value="GUARDAR">

                        <button class="inicio"><a class="inicio_link" href="index_lista_paciente.php">VER TODOS</a></button>

                    </section>

            </section>
            
            <section class="container">
                
                <h1 class="nombre">REGISTRO DEL PACIENTE</h1>

            </section>

        </form>

        <script>

            document.getElementById('file').onchange=function(e){
                let reader = new FileReader();
                reader.readAsDataURL(e.target.files[0]);
                reader.onload = function() {
                    let preview = document.getElementById('preview');
                    imagen = document.createElement('img');
                    imagen.src = reader.result;
                    imagen.style.width = "200px";
                    preview.append(imagen);
                }
            }

        </script>

    </body>

</html>