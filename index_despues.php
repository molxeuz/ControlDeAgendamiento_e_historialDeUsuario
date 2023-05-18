<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/estilos_after.css">
        <title>Quirovida - opciones</title>
    </head>
    <body>
        <section class="menu">

            <section class="logo">

                <button class="inicio"><a class="inicio_link" href="#">C.A.H.U.</a></button>

            </section>

            <section class="opciones_menu">

                <button class="boton_menu" id="primer_boton"><a class="menu_link" href="#">CALENDARIO</a></button>
                <button class="boton_menu"><a class="menu_link" href="#">CITAS</a></button>
                <button class="boton_menu"><a class="menu_link" href="index_registro_paciente.php">PACIENTES</a></button>
                <button class="boton_menu" id="ultimo_boton"><a class="menu_link" href="index_historial.php">HISTORIAL</a></button>
                
            </section>

            <section class="opciones_usuario">

                <button class="boton_usuario"><a class="usuario_link" href="#">Notificaciones</a></button>
                <button class="boton_usuario"><a class="usuario_link" href="index_usuario.php">Empleado</a></button>

            </section>

        </section>

    </body>

    <style>
        #primer_boton{
            border-radius: 10px 0px 0px 10px;
        }

        #ultimo_boton{
            border-radius: 0px 10px 10px 0px;
        }
    </style>

</html>