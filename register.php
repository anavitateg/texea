<?php

require("conexionsql.php");
require("assets/js/funciones.php");


?>
<!DOCTYPE html>

<head>
   <link rel="stylesheet" href="assets/style/register.css">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
   <title>Registro - TEXEA</title>

</head>

<body>
   <main id="main">


      <div id="bg">
         <img id="imagenbglogin" src="assets/img/bglogin.png">
      </div>

      <aside id="aside">


         <div id="boxes">

            <?php

            if (isset($_POST['submit'])) {

               date_default_timezone_set('America/Los_Angeles');


               $email = $_POST['user_email'];
               $nick = $_POST['user_nick'];
               $pass = $_POST['user_pass'];

               $pass_hash= password_hash($pass, PASSWORD_DEFAULT);
   
               $repass = $_POST['user_repass'];
               $fechaActual = date('Y-m-d H:i:s');

               $email_validado = injectionCode($email, "register.php", "email");
               $nick_validado = injectionCode($nick, "register.php", "nick");
               $pass_validado = injectionCode($pass, "register.php", "pass");
               $repass_validado = injectionCode($repass, "register.php", "repass");

               if (($email_validado == 0) and ($pass_validado == 0) and ($repass_validado == 0) and ($nick_validado == 0)) {

                  if ($pass == $repass) {
                     $clavesiguales = 0;
                  } else {
                     $clavesiguales = 1;
                  }

                  $existe_usu = 0;
                  $consulta = "SELECT count(id_user) FROM usuarios WHERE user_email = '" . $email . "'";
                  $resultado = pg_query($conexion, $consulta);

                  while ($fila = pg_fetch_array($resultado)) {
                     $existe_usu = $fila[0];;
                  }


                  if (($clavesiguales == 0) and ($existe_usu == 0)) {

                     $consulta = "INSERT INTO usuarios (user_email, user_nick, user_pass, user_date) VALUES ('$email', '$nick', '$pass_hash', '$fechaActual')";
                     $resultado = pg_query($conexion, $consulta);

                     header("Location: login.php");
                  } else {
                     echo "<div id='boxerror'>
                                    <img id='error_icon' src='assets/img/error.png'>
                                   <span id='texto_error_1'>Ha ocurrido un error</span>
                                   </div>";
                  }
               }
            }

            ?>
            <!-- Box error
    ================================================== 
     <div id="boxerror">
     <img id="error_icon" src="assets/img/error.png">
    <span id="texto_error_1">Ha ocurrido un error</span>
    </div>
    -->

            <div id="box1">

               <span id="texto_login_1">Crear una cuenta</span>

            </div>

            <div id="box2">

               <img id="imagengoogle" src="assets/img/google.png">
               <button id="google_login">Registrarse con google</button>

            </div>

            <div id="box3">
               <div id="aside_line_1"></div>
               <div id="aside_circle_1"></div>
               <div id="aside_line_2"></div>
            </div>

            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" accept-charset='utf-8' role="form">
               <div id="box4">

                  <span id="texto_input_1">Correo</span>
                  <input id="input_text_1" type="text" placeholder="user@mail.com" name="user_email"></input>

               </div>

               <div id="box5">

                  <span id="texto_input_2">Usuario</span>
                  <input id="input_text_2" type="text" placeholder="Nick" name="user_nick"></input>

               </div>

               <div id="box6">

                  <span id="texto_input_3">Contraseña</span>
                  <input id="input_text_3" type="password" placeholder="Contraseña" name="user_pass"></input>

               </div>

               <div id="box7">

                  <span id="texto_input_4">Repetir contraseña</span>
                  <input id="input_text_4" type="password" placeholder="Repetir Contraseña" name="user_repass"></input>

               </div>

               <div id="box8">

                  <button id="botonlogin" name="submit">Registrarse</button>
               </div>

            </form>

            <div id="box9">
               <span id="textoa1">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></span>
            </div>


            <div id="box10">
               <a href="index.php">
                  <img id="foo_img" src="assets/img/logo.png">
                  <span id="textologo">TEXEA</span></a>
            </div>



         </div>


      </aside>




   </main>




</body>

</html>