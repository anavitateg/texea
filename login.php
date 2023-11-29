<?php

require("conexionsql.php");
require("assets/js/funciones.php");


?>


<!DOCTYPE html>

<head>
   <link rel="stylesheet" href="assets/style/login.css">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
   <title>Login - TEXEA</title>
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
               $pass = $_POST['user_pass'];

               $email_validado = injectionCode($email, "login.php", "email");
               $pass_validado = injectionCode($pass, "login.php", "pass");


               if (($email_validado == 0) and ($pass_validado == 0)) {


                  $existe_usu = 0;
                  $consulta = "SELECT count(id_user) FROM usuarios WHERE user_email = '$email'";
                  $resultado = pg_query($conexion, $consulta);
                 
                
                  while ($fila = pg_fetch_array($resultado)) {
                     $existe_usu = $fila[0];
                     
                     $consulta2 = "SELECT user_pass FROM usuarios WHERE user_email = '$email'";
                     $resultado2 = pg_query($conexion, $consulta2);

                     while ($fila2 = pg_fetch_assoc($resultado2)) {
                        $pass_bd = $fila2['user_pass'];
                     
                     }
                  
                  }
                  if (($existe_usu > 0 && password_verify($pass, $pass_bd) )) {

                     header("Location: dashboard.php");
                   
          
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

               <span id="texto_login_1">Iniciar sesión</span>

            </div>

            <div id="box2">

               <img id="imagengoogle" src="assets/img/google.png">
               <button id="google_login">Iniciar sesión con google</button>

            </div>

            <div id="box3">
               <div id="aside_line_1"></div>
               <div id="aside_circle_1"></div>
               <div id="aside_line_2"></div>
            </div>


            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" accept-charset='utf-8' role="form">
               <div id="box4">

                  <span id="texto_input_1">Correo</span>
                  <input id="input_text_1" type="text" placeholder="Usuario" name="user_email"></input>

               </div>

               <div id="box5">

                  <span id="texto_input_2">Contraseña</span>
                  <input id="input_text_2" type="password" placeholder="Contraseña" name="user_pass"></input>

               </div>

               <div id="box6">

                  <button id="botonlogin" name="submit">Iniciar sesión</button>
               </div>
            </form>

            <div id="box7">
               <span id="textoa1">¿No tienes cuenta? <a href="register.php">Click aquí</a></span>
            </div>

            <footer id="box8">

               <a href="index.php"><img src="assets/img/logo.png" id="foo_img">
                  <h1>TEXEA</h1>
               </a>

            </footer>


         </div>


      </aside>




   </main>




</body>

</html>