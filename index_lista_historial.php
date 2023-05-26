<?php 

    include("controller/db.php"); 
    
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/estilos_historia_lista.css">
        <title>Lista - historial clinico - C.A.H.U.</title>
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

        <section class="container_full">

            <!-- Columna uno -->
            <section class="datos_uno">

                <table>
                    <tr>

                        <th>ID DEL PACIENTE</th>
                        <th>ALTURA PACIENTE</th>
                        <th>PESO PACIENTE</th>
                        <th>MOTIVO CONSULTA</th>
                        <th>NOMBRE DOCTOR</th>
                        <th>OPCIONES</th>

                    </tr>

                    <?php

                        $query = "SELECT * FROM historial";
                        $result = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result)) { 

                    ?>

                    <tr>

                        <td> <?php echo $row['identificacion_paciente'] ?> </td>
                        <td> <?php echo $row['altura_paciente'] ?> </td>
                        <td> <?php echo $row['peso_paciente'] ?> </td>
                        <td> <?php echo $row['motivo_consulta'] ?> </td>
                        <td> <?php echo $row['nombre_doctor'] ?> </td>
                        <td><a href="index_editar_historial.php?id_historial=<?php echo $row['id_historial']?>">EDITAR</a>, <a href="delete_historial.php?id_historial=<?php echo $row['id_historial']?>">BORRAR</a>, <a href="exportar_historial.php?id_historial=<?php echo $row['id_historial']?>">PDF</a></td>

                    </tr>

                    <?php } ?>

                </table>

            </section>

        </section>
            
        <section class="container">
            
            <h1 class="nombre">LISTA DE HISTORIALES CLINICOS</h1>

        </section> 

    </body>
    
</html>