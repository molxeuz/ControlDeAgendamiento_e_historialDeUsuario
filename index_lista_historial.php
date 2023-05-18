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
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a class="" href="index_editar_historial.php">EDITAR</a>, <a href="">BORRAR</a>, <a href="exportar_historial.php?id=<?php echo $row['id']?>">PDF</a></td>
                    </tr>
                </table>

            </section>

        </section>
            
        <section class="container">
            
            <h1 class="nombre">LISTA DE HISTORIALES CLINICOS</h1>

        </section> 

    </body>
    
</html>