<?php 
              
              require('conexionsql.php');
              date_default_timezone_set('America/Los_Angeles');

              
              $email = $_POST['user_email'];
              $nick = $_POST['user_nick'];
              $pass = $_POST['user_pass'];
              $repass = $_POST['user_repass'];
             
              $fechaActual = date('Y-m-d H:i:s');
              
          
              
              try {
                if($pass == $repass){
                   $consulta = "INSERT INTO usuarios (user_email, user_nick, user_pass, user_date) VALUES ('$email', '$nick', '$pass', '$fechaActual')";
                   $resultado = pg_query($conexion, $consulta);

                   echo "<script>";
                   echo "alert('Datos registrados');";
                   echo "</script>"; 

                   header("Location: login.php");
                   exit(); // Asegúrate de salir después de la redirección para evitar ejecución adicional del código  
                   }else{
                      echo "<script>";
                      echo "alert('Contraseñas no coinciden');";
                      echo "</script>"; 
                        }
                        
                if (!$resultado) {
                    throw new Exception("Error en la consulta: " . pg_last_error());
                }
            
                // Resto del código
            
            } catch (Exception $e) {
                // Manejar la excepción
                die("Excepción: " . $e->getMessage());
            
            } finally {
                // Cerrar la conexión
                pg_close($conexion);
            }
    
        
            ?>