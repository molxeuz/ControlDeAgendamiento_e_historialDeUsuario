<?php
 session_start();
 require_once ('verificar.php');

?>
<!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
        <link rel="stylesheet" href="CSS/estilos_login.css">
    </head>

    <body>

        <form action="index.php" method="POST" class="formulario">
        <?php
            
            $usuarios=new DevuelveU();

            $array_usuarios=$usuarios->GetUsuarios();
            if(isset($_POST['btnIngresar'])){
              if(empty($array_usuarios)){
                  echo"<font color='red'><center>Usuario o Contraseña incorrectos.</center></font>";
              }
          }

            foreach ($array_usuarios as $elemento){
              $cantidad=count($array_usuarios);
             
              if($cantidad == 1){
                $_SESSION['user']=$elemento['idUsuarioSalud'];
                $_SESSION['nombre']=$elemento['nombre'];
                $_SESSION['apellido']=$elemento['apellido'];
                $_SESSION['profesion']=$elemento['profesion'];
                $_SESSION['telefono']=$elemento['telefono'];
                $_SESSION['correo']=$elemento['correo'];
                $_SESSION['clave']=$elemento['clave'];
                $_SESSION['estado']=$elemento['estado'];

                if($elemento['estado']==1){
                  header ('location: index_despues.php');
                }else{
                  echo "<center><font color='red'>El usuario se encuentra inactivo</font></center>";
                }
              } 
            }  
            
      ?>

            <section class="container_full">

                    <section class="datos">
                         <!-- Tipo de empleado -->
                        <section class="datos_tipo">

                        <input type="text" class="enunciado_tipo" value="Tipo de empleado" disabled>

                        <select name="profesion" id="" class="respuesta_tipo">
                            <option value="doctor">Doctor</option>
                            <option value="asistente">Asistente</option>
                        </select>

                        <!-- Nombre de empleado -->
                        <section class="datos_nombre">

                            <input type="text" class="enunciado_nombre" value="id del empleado" disabled>

                            <input type="text" name="tpd" class="respuesta_nombre" placeholder="Ingresa la id">
    
                        </section>

                        <!-- contraseña empleado -->
                        <section class="datos_contraseña">

                            <input type="text" class="enunciado_contraseña" value="Contraseña" disabled>

                            <input type="password" name="pass" class="respuesta_contraseña" placeholder="Ingresa la contraseña">
    
                        </section>

                    </section>

                    <section class="enviar">

                        <img src="IMG/R.png" alt="#logo_quirovida" class="foto">

                        <button class="registrarse"><a class="registrarse_link" href="index_register.php">REGISTRARSE</a></button>
                        <button class="inicio" type="submit" name="btnIngresar">INICIAR SESION</button>
                    
                    </section>

            </section>
            
            <section class="container">
                
                <h1 class="nombre">INICIO DE SESION</h1>

            </section>

        </form>

    </body>

</html>