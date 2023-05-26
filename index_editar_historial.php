<?php

    include("controller/db.php");

    if(isset($_GET['id_historial'])){

        $id = $_GET['id_historial'];
        $query = "SELECT * FROM historial WHERE id_historial = $id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1){
            
            $row = mysqli_fetch_array($result);
            $identificacion_paciente = $row['identificacion_paciente'];
            $altura_paciente = $row['altura_paciente'];
            $peso_paciente = $row['peso_paciente'];
            $traumaticos = $row['traumaticos'];
            $patologicos = $row['patologicos'];
            $tratamiento_previo = $row['tratamiento_previo'];
            $motivo_consulta = $row['motivo_consulta'];
            $columna = $row['columna'];
            $pelvis = $row['pelvis'];
            $extremidades = $row['extremidades'];
            $zona_craneal = $row['zona_craneal'];
            $nombre_doctor = $row['nombre_doctor'];

        }

    }

    if(isset($_POST['editar_historial'])){

        $identificacion_paciente = $_POST['identificacion'];
        $altura_paciente = $_POST['altura'];
        $peso_paciente = $_POST['peso'];
        $traumaticos = $_POST['antecedentes_traumatico'];
        $patologicos = $_POST['antecedente_patologicos'];
        $tratamiento_previo = $_POST['tratamientos_previos'];
        $motivo_consulta = $_POST['motivo_consulta'];
        $columna = $_POST['columna'];
        $pelvis = $_POST['pelvis'];
        $extremidades = $_POST['extremidades'];
        $zona_craneal = $_POST['craneal'];
        $nombre_doctor = $_POST['doctor'];

        $query = "UPDATE historial set identificacion_paciente = '$identificacion_paciente',altura_paciente = '$altura_paciente', peso_paciente = '$peso_paciente',
        traumaticos = '$traumaticos',patologicos= '$patologicos', tratamiento_previo = '$tratamiento_previo',
        motivo_consulta = '$motivo_consulta', columna = '$columna', pelvis = '$pelvis', extremidades = '$extremidades', zona_craneal = '$zona_craneal', nombre_doctor = '$nombre_doctor' WHERE id_historial= $id";

        mysqli_query($conn, $query); // arreglar
        
        header("location: index_lista_historial.php");

    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/estilos_editar_historial.css">
        <title>Edicion - historial clinico - C.A.H.U.</title>
    </head>

    <body>
        
        <section class="menu">

            <section class="logo">

                <button class="inicio"><a class="inicio_link" href="#">C.A.H.U.</a></button>

            </section>

            <section class="opciones_menu">

                <button class="boton_menu" id="primer_boton"><a class="menu_link" href="index_despues.php">CALENDARIO</a></button>
                <button class="boton_menu"><a class="menu_link" href="#">CITAS</a></button>
                <button class="boton_menu"><a class="menu_link" href="index_registro_paciente.php">PACIENTES</a></button>
                <button class="boton_menu" id="ultimo_boton"><a class="menu_link" href="index_historial.php">HISTORIAL</a></button>
                
            </section>

            <section class="opciones_usuario">

                <button class="boton_usuario"><a class="usuario_link" href="#">Notificaciones</a></button>
                <button class="boton_usuario"><a class="usuario_link" href="index_usuario.php">Empleado</a></button>

            </section>

        </section>

        <form action="index_editar_historial.php?id_historial=<?php echo $_GET['id_historial']; ?>" method="POST">

            <section class="container_full">

                <!-- Columna uno -->
                <section class="datos_uno">

                    <!-- identificacion paciente -->
                    <section class="datos_tipo">

                        <input type="text" class="enunciado_identificacion" value="Id del paciente" disabled>
                        
                        <input type="text" name="identificacion" class="respuesta_identificacion" value="<?php echo $identificacion_paciente; ?>" required>

                    </section>

                </section>

                <!-- Columna dos -->
                <section class="datos_dos">

                    <!-- altura paciente -->
                    <section class="datos_tipo">

                        <input type="text" class="enunciado_altura" value="Altura actual" disabled>
                        
                        <input type="text" name="altura" class="respuesta_altura" value="<?php echo $altura_paciente; ?>" required>

                    </section>

                </section>
                
                <!-- Columna tres -->
                <section class="datos_tres">

                    <!-- peso paciente -->
                    <section class="datos_tipo">

                        <input type="text" class="enunciado_peso" value="Peso actual" disabled>
                        
                        <input type="text" name="peso" class="respuesta_peso" value="<?php echo $peso_paciente; ?>" required>

                    </section>

                </section>

                <!-- Columna cuatro -->
                <section class="datos_cuatro">

                    <!-- antecedente traumatico -->
                    <section class="datos_antecedentes_traumatico">

                        <h3 class="enunciado_antecedentes_traumatico">Antecedentes traumaticos</h3>

                        <input type="text" name="antecedentes_traumatico" id="antecedente_traumatico" class="respuesta_antecedente_traumatico" value="<?php echo $traumaticos; ?>" required>

                    </section>

                    <!-- antecedente_patologicos -->
                    <section class="datos_antecedente_patologicos">

                        <h3 class="enunciado_antecedente_patologicos">Antecedentes patológicos</h3>

                        <input type="text" name="antecedente_patologicos" id="antecedente_patologicos" class="respuesta_antecedente_patologicos" value="<?php echo $patologicos; ?>" required>

                    </section>

                    <!-- tratamientos previos -->
                    <section class="datos_tratamientos_previos">

                        <h3 class="enunciado_tratamientos_previos">Tratamientos previos</h3>

                        <input type="text" name="tratamientos_previos" id="tratamientos_previos" class="respuesta_tratamientos_previos" value="<?php echo $tratamiento_previo; ?>" required>

                    </section>

                </section>

                <!-- Columna cinco -->
                <section class="datos_cinco">

                    <!-- motivo consulta -->
                    <section class="datos_motivo_consulta">

                        <h3 class="enunciado_motivo_consulta">Motivo consulta</h3>

                        <input type="text" name="motivo_consulta" id="motivo_consulta" class="respuesta_motivo_consulta" value="<?php echo $motivo_consulta; ?>" required>

                    </section>

                    <!-- resultados -->
                    <section class="datos_resultados">

                        <h3 class="enunciado_resultados">Resultado de la exposicion fisica</h3>

                        <section class="respuesta_resultados">

                            <!-- columna -->
                            <section class="datos_columna">

                                <h3 class="enunciado_columna">Columna:</h3>

                                <input type="text" name="columna" id="columna" class="respuesta_columna" value="<?php echo $columna; ?>" required>

                            </section>

                            <!-- pelvis -->
                            <section class="datos_pelvis">

                                <h3 class="enunciado_pelvis">Pelvis:</h3>

                                <input type="text" name="pelvis" id="pelvis" class="respuesta_pelvis" value="<?php echo $pelvis; ?>" required>

                            </section>

                            <!-- extremidades -->
                            <section class="datos_extremidades">

                                <h3 class="enunciado_extremidades">Extremidades:</h3>

                                <input type="text" name="extremidades" id="extremidades" class="respuesta_extremidades" value="<?php echo $extremidades; ?>" required>

                            </section>

                            <!-- zona craneal -->
                            <section class="datos_craneal">

                                <h3 class="enunciado_craneal">Craneal:</h3>

                                <input type="text" name="craneal" id="craneal" class="respuesta_craneal" value="<?php echo $zona_craneal; ?>" required>

                            </section>

                        </section>

                    </section>

                </section>

                <!-- opciones de envio -->
                <section class="enviar">

                    <!-- doctor respondable -->
                    <section class="datos_doctor">

                        <input type="text" class="enunciado_doctor" value="Nombre doctor" disabled>
                        
                        <input type="text" name="doctor" class="respuesta_doctor" value="<?php echo $nombre_doctor; ?>" required>

                    </section>

                    <button class="inicio_regresar"><a class="inicio_link" href="index_lista_historial.php">REGRESAR</a></button>

                    <input type="submit" name="editar_historial" class="registrarse" value="EDITAR">

                </section>

            </section>
                
            <section class="container">
                
                <h1 class="nombre">EDITAR HISTORIAL CLINICO</h1>

            </section> 

        </form>

    </body>

</html>