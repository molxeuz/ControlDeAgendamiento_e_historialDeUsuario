<?php 

    include("controller/db.php"); 
    
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/estilos_lista_paciente.css">
        <title>Lista - registrar pacientes - C.A.H.U.</title>
    </head>

    <body>
        
        <section class="menu">

            <section class="logo">

                <button class="inicio"><a class="inicio_link" href="#">C.A.H.U.</a></button>

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

        <section class="container_full">

            <!-- Columna uno -->
            <section class="datos_uno">

                <table>

                    <tr>

                        <th>#</th>
                        <th>IDENTIFICACION</th>
                        <th>NOMBRE</th>
                        <th>TELEFONO</th>
                        <th>FECHA REGISTRO</th>
                        <th>OPCIONES</th>

                    </tr>

                    <?php

                    $query = "SELECT * FROM usuarios";
                    $result = mysqli_query($conn, $query);
    
                    while($row = mysqli_fetch_array($result)) { 
                    
                    ?>

                    <tr>

                        <td> <?php echo $row['id'] ?> </td>
                        <td> <?php echo $row['identificacion'] ?> </td>
                        <td> <?php echo $row['nombre'] ?> </td>
                        <td> <?php echo $row['telefono'] ?> </td>
                        <td> <?php echo $row['created_at'] ?> </td>
                        <td><a href="index_editar_paciente.php?id=<?php echo $row['id']?>">EDITAR</a>, <a href="delete.php?id=<?php echo $row['id']?>">BORRAR</a>, <a href="exportar_paciente.php?id=<?php echo $row['id']?>">PDF</a></td>

                    </tr>

                    <?php } ?>

                </table>

            </section>

        </section>
            
        <section class="container">
            
            <h1 class="nombre">LISTA DE PACIENTES</h1>

        </section>
        
    </body>

</html>