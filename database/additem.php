<?php 
              
              require('conexionsql.php');
              date_default_timezone_set('America/Los_Angeles');

              
              $dato1 = $_POST['gasto'];
              $dato2 = $_POST['precio'];
              $dato3 = $_POST['fecha'];
              $dato4 = $_POST['descripcion'];
             
              $fechaActual = date('Y-m-d H:i:s');
              
          

              // Consulta INSERT
              $consulta = "INSERT INTO gastos (nombre_gasto, precio_gasto, fecha_gasto, descripcion_gasto, fecha_registro) VALUES ('$dato1', '$dato2', '$dato3','$dato4', '$fechaActual')";
      

              $resultado = pg_query($conexion, $consulta);

              if (!$resultado) {
                  die("Error en la consulta: " . pg_last_error());
              } else {
                echo "<script>";
                echo "console.log('Datos registrados');";
                echo "</script>"; 

                header("Location: prueba.php");
                exit(); // Asegúrate de salir después de la redirección para evitar ejecución adicional del código  
              } 

              // Cierra la conexión cuando hayas terminado
              pg_close($conexion);



    
    
            
            ?>