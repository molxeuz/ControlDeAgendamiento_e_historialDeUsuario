<?php

    require('controller/db.php');

    if(isset($_POST['btnRegistrar'])){

        $conexion=mysqli_connect("localhost","root","","quirovida") or die ("Error en la conexion");

        $idusuario = $_POST['idUsuarioSalud'];
        $nombre = $_POST['name'];
        $profesion = $_POST['profesion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['email'];
        $password = $_POST['password'];
        
        if (!empty($_FILES['imagen_empleado']['tmp_name'])) {
            $imagen_empleado = addslashes(file_get_contents($_FILES['imagen_empleado']['tmp_name']));
        } else {
            $imagen_empleado = NULL;
        }

        $sql = "INSERT INTO `usuariomedico` (`idUsuarioSalud`, `nombre`, `profesion`, `telefono`, `correo`, `estado`, `clave`, `imagen_empleado`) VALUES ('$idusuario', '$nombre', '$profesion', '$telefono', '$correo', '1', '$password', '$imagen_empleado');";


        $registro = mysqli_query($conn,$sql);

        echo "<script>window.location='index.php';</script>";

    }

?>

<!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>REGISTER</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        <link rel="stylesheet" href="CSS/estilos_register.css">
    </head>

    <body>

        <form action="index_register.php" method="POST" enctype="multipart/form-data">

            <section class="container_full">

                    <!-- Columna uno -->
                    <section class="datos_uno">

                        <!-- Tipo de empleado -->
                        <section class="datos_tipo">
                       
                            <input type="text" class="enunciado_tipo" value="Tipo de empleado" disabled>
                            
                            <select name="profesion" class="respuesta_tipo">
                                <option value="Doctor">Doctor</option>
                                <option value="Asistente">Asistente</option>
                            </select>

                       </section>

                        <!-- Nombre completo empleado -->
                        <section class="datos_nombre">

                            <input type="text" name="name" class="enunciado_nombre" value="Nombre completo" disabled>

                            <input type="text" name="name" class="respuesta_nombre" placeholder="Ingresa el nombre" required>

                        </section>

                        <!-- identificacion empleado -->
                        <section class="datos_nombre">

                            <input type="text" name="idUsuarioSalud" class="enunciado_nombre" value="identificacion" disabled>

                            <input type="text" name="idUsuarioSalud" class="respuesta_nombre" placeholder="Ingresa el id" required>

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

                            <input type="text" name="email" class="enunciado_correo" value="Correo electronico" disabled>

                            <input type="email"  name="email" class="respuesta_correo" placeholder="Ingresa el correo" required>

                        </section>

                        <!-- Contraseña empleado -->
                        <section class="datos_contraseña">

                            <input type="text" class="enunciado_contraseña" value="Contraseña" disabled>

                            <input type="password" name="password" class="respuesta_contraseña" placeholder="Ingresa la contraseña" required>

                        </section>

                    </section>
                    
                    <!-- Columna tres -->
                    <section class="datos_tres">

                        <!-- Foto empleado -->
                        <section class="datos_telefono">

                            <input type="text" class="enunciado_foto" value="Foto empleado" disabled>

                            <div id="preview" class="foto_empleado"></div>

                            <input type="file" name="imagen_empleado" id="file">

                            <input type="button" value="Subir" class="subir" onclick="document.getElementById('file').click()">

                            <button class="borrar"><a class="inicio_link" href="#">Borrar</a></button>

                        </section>

                    </section>

                    <section class="enviar">

                        <input type="submit" name="btnRegistrar" class="registrarse" value="GUARDAR">

                        <button class="inicio"><a class="inicio_link" href="index.php">REGRESAR</a></button>

                    </section>

            </section>
            
            <section class="container">
                
                <h1 class="nombre">REGISTRO DEL EMPLEADO</h1>

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